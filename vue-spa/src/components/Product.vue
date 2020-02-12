<template>
    <div class="col-md-3">
        <div class="card-deck">
            <div class="card">
                <img :src="image" :alt="name" class="card-img-top">
                <div class="card-body">
                    <h4 class="card-title">{{ name }}</h4>
                    <div class="card-text">{{ price | dollars }}</div>
                    <div class="row justify-content-center">
                        <button class="btn btn-primary" @click="addToCart(id)">Add to cart</button>
                    </div>
                </div>
            </div>
        </div>
    </div><!--col-md-3-->
</template>

<script>
    import {dollars} from '@/filters.js';

    export default {
        name: 'product',
        props: ['id', 'name', 'image', 'price'],
        filters: {
            dollars,
        },
        methods: {
            addToCart(id) {
                this.$store.dispatch('addToCart', id);
            },
        },
    };
</script>