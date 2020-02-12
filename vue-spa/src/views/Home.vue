<template>
    <div id="app" class="container">
        <h1>Brian's Tabletop Games</h1>
        <ShoppingCart/>
        <div class="row">
            <Product
                    v-for="product in products"
                    :key="product.id"
                    :id="product.id"
                    :name="product.name"
                    :image="product.image"
                    :price="product.price"/>
        </div><!--row-->
    </div>
</template>

<script>
    // @ is an alias to /src
    import Product from '@/components/Product.vue';
    import ShoppingCart from '@/components/ShoppingCart.vue';

    export default {
        name: 'app',
        computed: {
            products() {
                return this.$store.getters.products;
            },
        },
        components: {
            Product,
            ShoppingCart,
        },
    }
</script>
