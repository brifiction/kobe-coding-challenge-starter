<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Order;
use App\OrderDetail;
use App\Shipment;
use GuzzleHttp\Client;

class OrderController extends Controller
{
    protected $api_token;
    protected $client;
    protected $loggedUser;

    /**
     * Create a new controller instance.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {

        // $this->middleware('auth');

        // get token and add to headers
        $this->api_token = $request->header('api-token');

        $this->client = new Client([
            'verify' => false,
            'headers' => [
                'Accept' => 'application/json',
                'api_token' => $this->api_token
            ]
        ]);

        $theUser = $this->client->get(config('api.endpoint.user') . 'api/' . $this->api_token);
        $this->loggedUser = json_decode($theUser->getBody());
        if ($this->loggedUser->message == 'API key is invalid.' || $this->loggedUser->message == 'Login is required.') {
            die($this->loggedUser->message);
        }
    }

    /**
     * Show all Orders
     *
     * @param $request Request
     * @url /order
     * @return \Illuminate\Http\JsonResponse
     *
     */
    public function index(Request $request)
    {
        if ($this->loggedUser->message->role != 'administrator') {
            $response['success'] = false;
            $response['message'] = 'Hey you! This is a restricted area.';

            return response()->json($response);
        }

        $order = Order::all();

        if (count($order) > 0) {
            $response['success'] = true;
            $response['message'] = 'This is the complete list of orders.';

            return response()->json([
                'success' => $response['success'],
                'message' => $response['message'],
                'data' => $order,
            ]);

            // return response()->json($response);
        } else {
            $response['success'] = false;
            $response['message'] = 'There are no orders found. Bummer.';

            return response()->json($response);

        }
    }

    /**
     * Show Order details
     *
     * @param $id
     * @url /order/{$id}
     * @return \Illuminate\Http\JsonResponse
     *
     */
    public function detail($id)
    {
        if ($this->loggedUser->message->role != 'administrator') {
            $response['success'] = false;
            $response['message'] = 'Hey you! This is a restricted area.';

            return response()->json($response);
        }

        $order = Order::find($id);

        $orderDetail = OrderDetail::where('order_id', $id)->get();

        try {
            $order->details = !$orderDetail->isEmpty() ? $orderDetail : array('Let`s get started, shop till you drop!');
        } catch (\Exception $e) {
            $order->details = null;
        }

        if (count($orderDetail) > 0) {
            $response['success'] = true;
            $response['message'] = 'This is the order details for order #' . $id . '.';

            return response()->json([
                'success' => $response['success'],
                'message' => $response['message'],
                'data' => $order,
            ]);

            // return response()->json($response);
        } else {
            $response['success'] = false;
            $response['message'] = 'There are no orders found. Bummer.';

            return response()->json($response);
        }
    }


    /**
     * Show Detail Order
     *
     * @param $request Request
     * @url /track
     * @return \Illuminate\Http\JsonResponse
     */
    public function trackOrder(Request $request)
    {
        if ($request->has('order_no')) {
            $order = Order::where('order_no', $request->input('order_no'))->first();

            if ($order) {
                $orderDetail = OrderDetail::where('order_id', $order->id)->get();
                $order->details = !$orderDetail->isEmpty() ? $orderDetail : array('Let`s get started, shop till you drop!');

                if (count($orderDetail) > 0) {
                    $response['success'] = true;
                    $response['message'] = 'Tracking the order for order #' . $order->id . '.';

                    return response()->json([
                        'success' => $response['success'],
                        'message' => $response['message'],
                        'data' => $order,
                    ]);

                    // return response()->json($response);
                } else {
                    $response['success'] = false;
                    $response['message'] = 'There are no orders found. Shucks.';

                    return response()->json($response);
                }
            }
        } else {
            $response['success'] = false;
            $response['message'] = 'There are no orders found. Shucks.';

            return response()->json($response);
        }
    }

    /**
     * Checkout Cart
     *
     * @param $request Request
     * @url /order/checkout/
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkout(Request $request)
    {
        try {
            //init DB Transaction to rollback the failure while inserting to database
            DB::beginTransaction();

            $theCart = $this->client->get(config('api.endpoint.cart') . 'get-cart-json');
            $cart = json_decode($theCart->getBody());
            if (!empty($cart) && $request->has('shipping_name')) {
                $order = new Order;
                $order->fill([
                    'order_no' => date('ymd') . time(),
                    'coupon_id' => $cart->coupon_id,
                    'coupon_code_name' => $cart->coupon_code_name,
                    'coupon_discount' => $cart->coupon_discount,
                    'customer_id' => $cart->customer_id,
                    'customer_name' => $cart->customer_name,
                    'customer_email' => $cart->customer_email,
                    'total_amount' => $cart->total_amount,
                    'shipment_fee' => $cart->shipment_fee,
                    'grand_total' => $cart->grand_total,
                    'shipping_name' => $request->input('shipping_name'),
                    'shipping_phone' => $request->input('shipping_phone'),
                    'shipping_email' => $request->input('shipping_email'),
                    'shipping_address' => $request->input('shipping_address'),
                ]);

                if ($order->save()) {

                    //reduce coupon qty if the customer uses coupon
                    if (!empty($cart->coupon_id)) {
                        $theCoupon = $this->client->get(config('api.endpoint.coupon') . $cart->coupon_code_name);
                        $coupon = json_decode($theCoupon->getBody());
                        $newCouponQty = $coupon->qty - 1;
                        $updateCouponQty = $this->client->get(config('api.endpoint.coupon') . 'update-qty/' . $cart->coupon_id . '/' . $newCouponQty);
                        $statusUpdateCoupon = json_decode($updateCouponQty->getBody());
                        if (!$statusUpdateCoupon->success) {
                            DB::rollBack();
                            $response['success'] = false;
                            $response['message'] = 'Could not update coupon quantity.';

                            return response()->json($response);
                        }
                    }

                    foreach ($cart->items as $key => $value) {
                        $theProduct = $this->client->get(config('api.endpoint.product') . $value->product_id);
                        $product = json_decode($theProduct->getBody());

                        //reduce product inventory
                        $newInventory = $product->inventory - $value->qty;
                        $updateInventoryProduct = $this->client->get(config('api.endpoint.product') . 'update-inventory/' . $value->product_id . '/' . $newInventory);
                        $statusUpdateProduct = json_decode($updateInventoryProduct->getBody());

                        if (!$statusUpdateProduct->success) {
                            DB::rollBack();
                            $response['success'] = false;
                            $response['message'] = 'Could not update product inventory.';

                            return response()->json($response);
                        }

                        $cartDetail = new OrderDetail;
                        $cartDetail->fill([
                            'order_id' => $order->id,
                            'product_id' => $product->id,
                            'product_name' => $product->name,
                            'product_price' => $product->price,
                            'product_weight' => $product->weight,
                            'qty' => $value->qty,
                            'subtotal' => $product->price * $value->qty,
                        ]);
                        if (!$cartDetail->save()) {
                            DB::rollBack();
                            $response['success'] = false;
                            $response['message'] = 'Could not save to database, hence no changes made.';

                            return response()->json($response);
                        }
                    }

                    //truncate cart and cart detail
                    $theCartTruncate = $this->client->get(config('api.endpoint.cart') . 'truncate');
                    $cartTruncate = json_decode($theCartTruncate->getBody());

                    if ($cartTruncate->success) {
                        DB::commit();
                        $response['success'] = true;
                        $response['message'] = 'Order checkout is successful, nice.';
                    } else {
                        DB::rollBack();
                        $response['success'] = false;
                        $response['message'] = 'Could not save to database, hence no changes made.';
                    }
                } else {
                    DB::rollBack();
                    $response['success'] = false;
                    $response['message'] = 'Could not save to database, hence no changes made.';
                }
            } else {
                $response['success'] = false;
                $response['message'] = 'Shipping details is required.';
            }

            return response()->json($response);
        } catch (\Exception $e) {
            DB::rollBack();
            $response['success'] = false;
            $response['message'] = 'Could not save to database, hence no changes made.';

            return response()->json($response);
        }
    }

    /**
     * Payment Confirmation
     *
     * @param $request Request
     * @url /order/payment-confirm/
     * @return mixed
     */
    public function paymentConfirm(Request $request)
    {
        if ($request->has('order_no')) {
            $order = Order::where('order_no', $request->input('order_no'))->first();

            if ($order) {
                $order->paid_grand_total = $request->input('paid_amount');
                $order->paid_date = $request->input('paid_date');
                $order->payment_proof = $request->input('payment_proof');
                $order->status = 'payment_confirmed';

                if ($order->save()) {
                    $response['success'] = false;
                    $response['message'] = 'Payment confirmed. Thank you for your payment.';

                    return response()->json($response);
                } else {
                    $response['success'] = false;
                    $response['message'] = 'Could not save to database, hence no changes made.';

                    return response()->json($response);
                }
            }
        } else {
            $response['success'] = false;
            $response['message'] = 'Please note that all fields are required.';

            return response()->json($response);
        }
    }

    /**
     * Validate Order
     *
     * @param $request Request
     * @url /order/validate/
     * @return \Illuminate\Http\JsonResponse
     */
    public function validateOrder(Request $request)
    {
        if ($this->loggedUser->message->role != 'administrator') {
            $response['success'] = false;
            $response['message'] = 'Hey you! This is a restricted area.';

            return response()->json($response);
        }

        if ($request->has('order_no')) {
            $order = Order::where('order_no', $request->input('order_no'))->first();
            if (!$order) {
                $response['success'] = false;
                $response['message'] = 'Could not find order #' . $request->input('order_no');

                return response()->json($response);
            }
            if ($order->paid_grand_total == $order->grand_total && !empty($order->paid_date) && !empty($order->payment_proof)) {
                $order->status = 'processed';

                if ($order->save()) {
                    $response['success'] = true;
                    $response['message'] = 'The order is valid. Next, please provide the shipping id immediately.';

                    return response()->json($response);
                } else {
                    $response['success'] = false;
                    $response['message'] = 'Could not save to database, hence no changes made.';

                    return response()->json($response);
                }
            } else {
                $order->status = 'rejected';

                if ($order->save()) {
                    $response['success'] = false;
                    $response['message'] = 'The order is invalid. You did not provide the shipping id.';

                    return response()->json($response);
                } else {
                    $response['success'] = false;
                    $response['message'] = 'Could not save to database, hence no changes made.';

                    return response()->json($response);
                }
            }

        } else {
            $response['success'] = false;
            $response['message'] = 'Please note that all fields are required.';

            return response()->json($response);
        }
    }

    /**
     * Shipping The Order
     *
     * @param $request Request
     * @url /order/shipment/
     * @return \Illuminate\Http\JsonResponse
     */
    public function shipmentOrder(Request $request)
    {
        if ($this->loggedUser->message->role != 'administrator') {
            $response['success'] = false;
            $response['message'] = 'Hey you! This is a restricted area.';

            return response()->json($response);
        }

        if ($request->has('order_no')) {
            $order = Order::where('order_no', $request->input('order_no'))->first();
            if (!$order) {
                $response['success'] = false;
                $response['message'] = 'Could not find order #' . $request->input('order_no');

                return response()->json($response);
            }
            $order->shipping_ID = $request->input('shipping_ID');
            $order->status = 'shipped';

            if ($order->save()) {
                $shipment = new Shipment;
                $shipment->order_no = $order->order_no;
                $shipment->shipping_ID = $order->shipping_ID;

                if ($shipment->save()) {
                    $response['success'] = true;
                    $response['message'] = 'The shipping id has been provided. Order has commenced shipping.';

                    return response()->json($response);
                }
            } else {
                $response['success'] = false;
                $response['message'] = 'Could not save to database, hence no changes made.';

                return response()->json($response);
            }
        } else {
            $response['success'] = false;
            $response['message'] = 'Please note that all fields are required.';

            return response()->json($response);
        }
    }

    /**
     * Track Shipping ID
     *
     * @param $request Request
     * @url /track-shipment
     * @return \Illuminate\Http\JsonResponse
     */
    public function trackShipment(Request $request)
    {
        if ($request->has('order_no')) {
            $shipment = Shipment::where('order_no', $request->input('order_no'))->first();

            if ($shipment) {
                $response['success'] = true;
                $response['message'] = $shipment;

                return response()->json($response);
            } else {
                $response['success'] = false;
                $response['message'] = 'The shipping id provided is invalid. Uh-oh.';

                return response()->json($response);

            }
        } else {
            $response['success'] = false;
            $response['message'] = 'There are no orders found. Shucks.';

            return response()->json($response);
        }
    }
}
