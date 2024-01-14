<template>
    <div>
        <h1>Liste des produits</h1>
        <ul>
            <li v-for="product in products" :key="product.id">{{ product.name }}
                <ul>
                    <li>{{ product.price }} €</li>
                    <li>{{ product.description }}</li>
                    <!-- voir pour recuperer directement le string de platform -->
                    <li>{{ product.platform.name }}</li>
                </ul>
            </li>
        </ul>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    data() {
        return {
            products: [],
        };
    },
    mounted() {
        this.fetchProducts();
    },
    methods: {
        async fetchProducts() {
            try {
                const response = await axios.get("https://localhost:8001/api/products");
                this.products = response.data['hydra:member']
            } catch (error) {
                console.log(error);
            }
        },
    }
}
</script>

<style>

</style>