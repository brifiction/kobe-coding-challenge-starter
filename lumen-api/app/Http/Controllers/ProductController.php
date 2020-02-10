<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use GuzzleHttp\Client;

class ProductController extends Controller
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

        // get token
        $this->api_token = $request->header('api_token');

        // add api_token to the headers.
        $this->client = new Client([
            'verify' => false,
            'headers' => [
                'Accept' => 'application/json',
                'api_token' => $this->api_token
            ]
        ]);

        // deny the heathen user
        $theUser = $this->client->get(config('api.url') . config('api.endpoint.user') . 'api/' . $this->api_token);
        $this->loggedUser = json_decode($theUser->getBody());
        if ($this->loggedUser->message == 'API key is invalid.' || $this->loggedUser->message == 'Login is required.') {
            die($this->loggedUser->message);
        }
    }

    /**
     * Show all Products
     *
     * @param $request Request
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     */
    public function index(Request $request)
    {
        $products = Product::where('sold', '0')->get();

        if (count($products) > 0) {
            $response['success'] = true;
            $response['message'] = $products;

            return response($response);
        } else {
            $response['success'] = false;
            $response['message'] = 'There are no products found. Bummer.';

            return response($response);

        }
    }

    /**
     * Insert new product
     *
     * @param $request Request
     * @url /product
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     */
    public function create(Request $request)
    {
        $product = new Product;

        $product->fill([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'inventory' => $request->input('inventory'),
            'price' => $request->input('price'),
        ]);

        if ($product->save()) {
            $response['success'] = true;
            $response['message'] = 'Product successfully added. Hooray!';

            return response($response);
        } else {
            $response['success'] = false;
            $response['message'] = 'Error unknown, perhaps could not add the product.';

            return response($response);

        }
    }

    /**
     * Get product, find by ID
     *
     * @param $request Request, $id
     * @param $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     * @url /product/{id}
     */
    public function getProduct(Request $request, $id)
    {
        $product = Product::find($id);

        if ($product) {
            // $response['success'] = true;
            // $response['message'] = $product;

            // return response($response);
            return response()->json(
                $product
            );
        } else {
            $response['success'] = false;
            $response['message'] = 'Product could not be found, probably doesn\'t exist. We must consult with the Jedi Council.';

            return response($response);

        }
    }

    /**
     * Update product
     *
     * @param $request Request, $id
     * @param $id
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     * @url /product/update/{id}
     */
    public function update(Request $request, $id)
    {
        if ($request->has('name')) {
            $product = Product::find($id);
            $product->name = $request->input('name');
            $product->description = $request->input('description');
            $product->inventory = $request->input('inventory');
            $product->price = $request->input('price');

            if ($product->save()) {
                $response['success'] = true;
                $response['message'] = 'Product successfully updated.';

                return response($response);
            } else {
                $response['success'] = false;
                $response['message'] = 'Error unknown, perhaps could not add product. Very mystery, much puzzle, such wow.';

                return response($response);
            }

        } else {
            $response['success'] = false;
            $response['message'] = 'There are no changes made. How bout\' that.';

            return response($response);
        }
    }

    /**
     * Update product
     *
     * @param $product_id , $new_stock
     * @param $new_inventory
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     * @url /product/update-stock/{product_id}/{new_stock}
     */
    public function updateStock($product_id, $new_inventory)
    {
        $product = Product::find($product_id);
        $product->stock = $new_inventory;

        if ($product->save()) {
            $response['success'] = true;
            $response['message'] = 'Product successfully updated.';

            return response($response);
        } else {
            $response['success'] = false;
            $response['message'] = 'Error unknown, perhaps could not update the product. Very mystery, much puzzle, such wow.';

            return response($response);
        }
    }

    /**
     * Delete product
     *
     * @param $request Request, $id
     * @param $id
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     * @url /product/delete/{id}
     */
    public function delete(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            $response['success'] = false;
            $response['message'] = 'Product could not be found. Sneaky fella, hiding from meeting its maker.';

            return response($response);
        }

        if ($product->delete($id)) {
            $response['success'] = true;
            $response['message'] = 'Product successfully removed. Adios, amigo.';

            return response($response);
        } else {
            $response['success'] = false;
            $response['message'] = 'Error unknown, perhaps could not remove the product. Very mystery, much puzzle, such wow.';

            return response($response);
        }
    }
}
