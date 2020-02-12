<template>
    <div id="app" class="container my-5">
        <h1>Brian's Tabletop Games</h1>
        <div class="row">
          <Product
                  v-for="item in products"
                  :key="item.id"
                  :invId="item.id"
                  :name="item.name"
                  :image="item.image"
                  :price="item.price" />
        </div><!--row-->
    </div>
</template>

<script>
    // @ is an alias to /src
    import Product from '@/components/Product.vue'

    export default {
        name: 'app',
        components: {
          Product
        },
        data() {
            return {
                products: [
                    {id: 1, name: 'Tabletop Game #1', image: '//placehold.it/200', price: 999 },
                    {id: 2, name: 'Tabletop Game #2', image: '//placehold.it/200', price: 1499},
                    {id: 3, name: 'Tabletop Game #3', image: '//placehold.it/200', price: 499},
                    {id: 4, name: 'Tabletop Game #4', image: '//placehold.it/200', price: 2990},
                ],
            };
        },
    }
</script>
