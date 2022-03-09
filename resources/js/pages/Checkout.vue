<template>
    <main>
        <ul>
            <li v-for="product in cart['plates']" :key="`${product.id}`">
                {{ product.name }}
                <div class="div">
                    <span>
                        <strong>Quantity:</strong>{{ product.quantity }}</span
                    >
                    <button @click="addToCart(product)">Aggiungi</button>
                    <button @click="removeFromCart(product)">Rimuovi</button>
                </div>
            </li>
        </ul>
        4217651111111119
        <form action="">
            <label for="name">Nome</label>
            <input type="text" name="name" id="name" />
            <label for="surname">Cognome</label>
            <input type="text" name="surname" id="surname" />
            <label for="email">Email</label>
            <input type="email" name="email" id="email" v-model="userEmail" />
            <Payment
                ref="paymentRef"
                :authorization="token"
                v-if="!loading"
                @onSuccess="onSuccess"
                @onError="onError"
            />
            <!-- <button @click="beforeBuy">Paga</button> -->
            <button @click.prevent="beforeBuy">Paga</button>
        </form>
    </main>
</template>

<script>
import axios from "axios";
import Payment from "../components/Payment.vue";
export default {
    components: { Payment },
    data() {
        return {
            cart: {},
            token: "",
            loading: true,
            timeToValidate: false,
            userEmail: null,
            form: {
                token: "",
                amount: "",
            },
        };
    },
    async created() {
        this.getCart();
        const response = await axios.get("http://127.0.0.1:8000/api/get_token");
        this.token = response.data.token;
        this.loading = false;
    },
    // prettier-ignore
    methods: {
        getCart() {
            if (JSON.parse(localStorage.getItem("cart")) !== null) {
                this.cart = JSON.parse(localStorage.getItem("cart"));
                this.form = {...this.cart};
            }
        },
        addToCart(product) {
            if ( JSON.parse(localStorage.getItem("cart") !== null) && Object.keys(JSON.parse(localStorage.getItem("cart"))).length > 0 ) {
                const cart = JSON.parse(localStorage.getItem("cart"));
                const exist = cart["plates"].find((element) => element.id === product.id);
                if (exist) exist.quantity++;
                localStorage.setItem("cart", JSON.stringify(cart));
            }
            this.getCart()
        },
        removeFromCart(product) {
            if ( JSON.parse(localStorage.getItem("cart") !== null) && Object.keys(JSON.parse(localStorage.getItem("cart"))).length > 0 ) {
                const cart = JSON.parse(localStorage.getItem("cart"));
                const exist = cart["plates"].find((element) => element.id === product.id);
                if (exist) {
                    exist.quantity--;
                    if (exist.quantity <= 0) {
                        const index = cart["plates"].indexOf(exist);
                        cart["plates"].splice(index, 1)
                    }

                    localStorage.setItem("cart", JSON.stringify(cart));
                }
            this.getCart()
            }
        },
        async buy() {
            const cart = JSON.stringify(JSON.parse(localStorage.getItem("cart")));
            const config = { headers: { "Content-Type": "application/json", Accept: "application/json", }, };
            const resp = await axios.post('http://127.0.0.1:8000/api/cart_validation', cart, config);
            this.form.amount = resp.data.amount;
            this.timeToValidate = resp.data.valid;
            
            if (this.timeToValidate) {
                let response = await axios.post('http://127.0.0.1:8000/api/make_payment', {...this.form});
                const message = response.data.message;

                const resp = await axios.post('http://127.0.0.1:8000/api/store', cart, config);
                const mex = response.data.message;

                const data = JSON.stringify({id: this.$route.params.id, email: this.userEmail});
                const r = await axios.post('http://127.0.0.1:8000/api/send_email', data, config);
                // alert(message);
                console.log(r.data);
            }
        },
        onSuccess(nonce) {
            this.form.token = nonce;
            this.buy();
        },
        onError(error) {},
        beforeBuy() {
            this.$refs.paymentRef.$refs.buttonRef.click();
        },
    },
};
</script>

<style lang="scss" scoped>
ul {
    padding-top: 96px;
}
</style>
