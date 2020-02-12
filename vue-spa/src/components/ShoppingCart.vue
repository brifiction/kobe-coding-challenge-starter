<template>
    <div class="row my-2 justify-content-center">
        <div class="col-md-12">
            <b-button v-b-modal.shopping-cart>Shopping Cart <b-icon-bucket></b-icon-bucket> ({{ qtyInCart }})</b-button>

            <b-modal id="shopping-cart" title="My Shopping Cart" hide-footer>
                <template v-slot:modal-title>
                    Shopping Cart ({{ qtyInCart }})
                </template>
                <div class="d-block text-center">
                    <table class="table table-borderless">
                        <tbody>
                        <tr v-for="(product, index) in cart">
                            <td>{{ product.name }}</td>
                            <td>{{ product.price | dollars }}</td>
                            <td>
                                <button class="btn btn-sm btn-danger" @click="removeFromCart(index)">&times;</button>
                            </td>
                        </tr>
                        <tr v-if="emptyCart">
                            <td colspan="3">You have no items in your cart</td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td>{{ total | dollars }}</td>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </b-modal>
        </div>
    </div>
</template>
<script>
    import { dollars } from '@/filters.js';

    export default {
        name: 'shoppingCart',
        computed: {
            inCart() { return this.$store.getters.inCart; },
            cart() {
                return this.$store.getters.inCart.map((cartItem) => {
                    return this.$store.getters.products.find((productItem) => {
                        return cartItem === productItem.id;
                    });
                });
            },
            qtyInCart() {
                return this.$store.getters.inCartCount;
            },
            total() {
                return this.cart.reduce((acc, cur) => acc + cur.price, 0);
            },
            emptyCart() {
                return this.$store.getters.inCartCount === 0 | this.$store.getters.inCartCount < 0;
            },
        },
        filters: {
            dollars,
        },
        methods: {
            removeFromCart(index) {
                this.$store.dispatch('removeFromCart', index);
            },
        },
    };
</script>