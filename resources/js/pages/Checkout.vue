<template>
    <main>
        <ul>
            <li v-for="product in cart['plates']" :key="`${product.id}`">
                {{ product.name }}
                <div class="div">
                    <span>
                        <strong>Quantity:</strong>{{ product.quantity }}</span
                    >
                    <button>Aggiungi</button>
                    <button>Rimuovi</button>
                </div>
            </li>
        </ul>

        <button @click="buy">Paga</button>
    </main>
</template>

<script>
import axios from "axios";
export default {
    data() {
        return {
            cart: {},
        };
    },
    created() {
        this.getCart();
    },
    methods: {
        getCart() {
            if (JSON.parse(localStorage.getItem("cart")) !== null) {
                this.cart = JSON.parse(localStorage.getItem("cart"));
            }
        },
        buy() {
            console.log("grazie per i tuoi acquisti");
            // setTimeout(() => {
            //     // this.$router.push(`/`);
            //     localStorage.setItem("cart", JSON.stringify({}));
            // }, 3000);
            this.sendCartData();
        },
        // prettier-ignore
        sendCartData() {
            const cart = JSON.stringify(JSON.parse(localStorage.getItem("cart")));
            const config = { headers: { "Content-Type": "application/json", Accept: "application/json", }, };
            axios.post('http://127.0.0.1:8000/api/checkout', cart, config).then(response => console.log(response.data)).catch(error => console.log(error));
        },
    },
};
</script>

<style lang="scss" scoped>
ul {
    padding-top: 96px;
}
</style>
