<template>
    <main>
        <!-- <ul>
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
        </ul> -->
        <!-- 4217651111111119 -->
        <!-- <form action="">
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
            <button @click.prevent="beforeBuy">Paga</button>
        </form> -->
        <div class="custom-logo">
            <img src="../images/deliveboo-nl.svg" alt="deliveboo-logo" />
        </div>

        <div class="custom-checkout">
            <div class="custom-loader" v-if="loading">
                <div class="custom-loader-spinner"></div>
            </div>
            <form class="custom-form" v-else>
                <div class="custom-form-labels">
                    <div class="custom-form-labels-wrapper">
                        <h1>Checkout</h1>
                        <div class="custom-form">
                            <div class="custom-form-group">
                                <h3 class="custom-form-group-title">
                                    Informazioni Personali
                                </h3>
                                <!-- prettier-ignore -->
                                <div class="custom-form-group-row" style="--grid-in-row: 2;">
                                    <label class="custom-form-group-row-label" for="name">
                                        <h3 class="custom-form-group-row-label-title">Nome <strong>*</strong></h3>
                                        <input type="text" name="name" id="name" placeholder="Nome" v-model="requiredInfo.name" ref="name" autocomplete="off" required @input="validateName">
                                        <span class="custom-form-group-row-label-error" ref="nameError"></span>
                                    </label>
                                    <label class="custom-form-group-row-label" for="surname">
                                        <h3 class="custom-form-group-row-label-title">Cognome <strong>*</strong></h3>
                                        <input type="text" name="surname" id="surname" placeholder="Cognome" v-model="requiredInfo.surname" ref="surname" autocomplete="off" required @input="validateSurname">
                                        <span class="custom-form-group-row-label-error" ref="surnameError"></span>
                                    </label>
                                </div>
                                <!-- prettier-ignore -->
                                <div class="custom-form-group-row" style="--grid-in-row: 1;">
                                    <label class="custom-form-group-row-label" for="address">
                                        <h3 class="custom-form-group-row-label-title">Indirizzo <strong>*</strong></h3>
                                        <input type="text" name="address" id="address" placeholder="Indirizzo" v-model="requiredInfo.address" ref="address" autocomplete="off" required @input="validateAddress">
                                        <span class="custom-form-group-row-label-error" ref="addressError"></span>
                                    </label>
                                </div>
                                <!-- prettier-ignore -->
                                <div class="custom-form-group-row" style="--grid-in-row: 1;">
                                    <label class="custom-form-group-row-label" for="email">
                                        <h3 class="custom-form-group-row-label-title">Email <strong>*</strong></h3>
                                        <input type="email" name="email" id="email" placeholder="Email" v-model="requiredInfo.email" ref="email" required @input="validateEmail">
                                        <span class="custom-form-group-row-label-error" ref="emailError"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="custom-form-group">
                                <h3 class="custom-form-group-title">
                                    Informazioni di Pagamento
                                </h3>
                                <!-- prettier-ignore -->
                                <div class="custom-form-group-braintree" style="--grid-in-row: 1;">
                                    <div class="custom-form-group-braintree">
                                        <Payment ref="paymentRef" :authorization="token" v-if="!loading" @onSuccess="onSuccess" @onError="onError" @onLoad="onLoad" />
                                        <!-- <div class="custom-form-group-braintree-title"><strong>*</strong> Questi campi sono obbligatori</div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="custom-form-basket">
                    <div class="custom-form-basket-wrapper">
                        <h1>Sommario</h1>
                        <!-- prettier-ignore -->
                        <div class="custom-form-basket-wrapper-group">
                            <div class="custom-form-basket-wrapper-group-text">
                                <div class="custom-form-basket-wrapper-group-text-title">Totale Parziale</div>
                                <div class="custom-form-basket-wrapper-group-text-label">{{form.amount.toLocaleString('it-IT', { style: 'currency', currency: 'EUR' })}}</div>
                            </div>
                            <div class="custom-form-basket-wrapper-group-text">
                                <div class="custom-form-basket-wrapper-group-text-title">Spedizione</div>
                                <div class="custom-form-basket-wrapper-group-text-label">{{"0,00 €"}}</div>
                            </div>
                        </div>
                        <div class="custom-form-basket-wrapper-group">
                            <!-- prettier-ignore -->
                            <div class="custom-form-group-row" style="--grid-in-row: 1;">
                                <label class="custom-form-group-row-label" for="promo">
                                    <h3 class="custom-form-group-row-label-title">Hai un codice promo?</h3>
                                    <input type="text" name="promo" id="promo" placeholder="Codice Promo">
                                    <span class="custom-form-group-row-label-error"></span>
                                </label>
                            </div>
                        </div>
                        <!-- prettier-ignore -->
                        <div class="custom-form-basket-wrapper-group">
                            <div class="custom-form-basket-wrapper-group-text">
                                <div class="custom-form-basket-wrapper-group-text-title">Totale</div>
                                <div class="custom-form-basket-wrapper-group-text-label">{{form.amount.toLocaleString('it-IT', { style: 'currency', currency: 'EUR' })}}</div>
                            </div>
                        </div>
                        <div class="custom-form-basket-wrapper-group">
                            <!-- prettier-ignore -->
                            <div class="custom-form-group-row" style="--grid-in-row: 1;">
                                <div class="custom-form-basket-wrapper-group-text">
                                    <div class="custom-form-basket-wrapper-group-text-button">
                                        <button @click.prevent="beforeBuy" :disabled="!activateButton">Acquista</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="custom-loader" v-if="!activateButton">
            <div class="custom-loader-spinner"></div>
        </div>

        <!-- prettier-ignore -->
        <div class="custom-popup" v-if="paymentDone">
            <div class="custom-popup-wrapper">
                <div class="custom-popup-wrapper-message">
                    <div class="custom-popup-wrapper-message-icon">
                        <span class="success"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg></span>
                        <span class="hidden error"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg></span>
                    </div>
                    <div class="custom-popup-wrapper-message-text">Grazie per aver acquistato su deliveboo. Riceverai un email con la conferma del tuo ordine.</div>
                    <div class="custom-popup-wrapper-message-button">
                        <button @click.prevent="goToHome"><span>Torna alla home</span></button>
                    </div>
                </div>
            </div>
        </div>
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
            activateButton: false,
            paymentDone: false,
            form: {
                token: "",
                amount: "",
            },
            requiredInfo: {
                name: "",
                surname: "",
                email: "",
                address: "",
            },
        };
    },
    async created() {
        this.getCart();
        this.getAmount();
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
        async getAmount() {
            if ( JSON.parse(localStorage.getItem("cart") !== null) && Object.keys(JSON.parse(localStorage.getItem("cart"))).length > 0 ) {
                const cart = JSON.stringify(JSON.parse(localStorage.getItem("cart")));
                const config = { headers: { "Content-Type": "application/json", Accept: "application/json", }, };
                const resp = await axios.post('http://127.0.0.1:8000/api/cart_validation', cart, config);
                this.form.amount = resp.data.amount;
            }
        },
        async buy() {
            this.activateButton = false;
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

                const data = JSON.stringify({id: this.$route.params.id, email: this.requiredInfo.email});
                const r = await axios.post('http://127.0.0.1:8000/api/send_email', data, config);
                this.activateButton = true;
                this.paymentDone = true;
                this.requiredInfo = { email : '', name: '', surname: '', address: '' };
            }
        },
        beforeBuy() {
            this.$refs.paymentRef.$refs.buttonRef.click();
            this.validateForm()
        },
        validateName() {
            if (this.requiredInfo.name .match(/[a-zA-Z]+/g) === null) {
                this.$refs.name.style.borderColor = "#ca2a2a";
                this.$refs.nameError.innerHTML = "Questo campo è richiesto";
            } else {
                this.$refs.name.style.borderColor = "#ebebeb";
                this.$refs.nameError.innerHTML = "";
            }
        },
        validateSurname() {
            if (this.requiredInfo.name .match(/[a-zA-Z]+/g) === null) {
                this.$refs.surname.style.borderColor = "#ca2a2a";
                this.$refs.surnameError.innerHTML = "Questo campo è richiesto";
            } else {
                this.$refs.surname.style.borderColor = "#ebebeb";
                this.$refs.surnameError.innerHTML = "";
            }
        },
        validateAddress() {
            if (this.requiredInfo.name .match(/[a-zA-Z]+/g) === null) {
                this.$refs.address.style.borderColor = "#ca2a2a";
                this.$refs.addressError.innerHTML = "Questo campo è richiesto";
            } else {
                this.$refs.address.style.borderColor = "#ebebeb";
                this.$refs.addressError.innerHTML = "";
            }
        },
        validateEmail() {
            if ((this.requiredInfo.email.match(/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}/g)) === null) {
                this.$refs.email.style.borderColor = "#ca2a2a";
                this.$refs.emailError.innerHTML = "Questo email non è valida";
            } else {
                this.$refs.email.style.borderColor = "#ebebeb";
                this.$refs.emailError.innerHTML = "";
            }
        },
        validateForm() {
            if (this.requiredInfo.name === "") {
                this.$refs.name.style.borderColor = "#ca2a2a";
                this.$refs.nameError.innerHTML = "Questo campo è richiesto";
            } else {
                this.$refs.name.style.borderColor = "#ebebeb";
                this.$refs.nameError.innerHTML = "";
            }

            if (this.requiredInfo.surname === "") {
                this.$refs.surname.style.borderColor = "#ca2a2a";
                this.$refs.surnameError.innerHTML = "Questo campo è richiesto";
            } else {
                this.$refs.surname.style.borderColor = "#ebebeb";
                this.$refs.surnameError.innerHTML = "";
            }

            if (this.requiredInfo.address === "") {
                this.$refs.address.style.borderColor = "#ca2a2a";
                this.$refs.addressError.innerHTML = "Questo campo è richiesto";
            } else {
                this.$refs.address.style.borderColor = "#ebebeb";
                this.$refs.addressError.innerHTML = "";
            }

            if (this.requiredInfo.email === "") {
                this.$refs.email.style.borderColor = "#ca2a2a";
                this.$refs.emailError.innerHTML = "Questo campo è richiesto";
            } else {
                this.$refs.email.style.borderColor = "#ebebeb";
                this.$refs.emailError.innerHTML = "";
            }
        },
        onSuccess(nonce) {
            this.form.token = nonce;
            this.buy();
        },
        goToHome() {
            localStorage.clear();
            this.paymentDone = false;
            this.loading= true;
            this.timeToValidate= false,
            this.activateButton= false,
            this.$router.push({name: 'home'});
        },
        onError(error) {},
        onLoad(status) {
            this.activateButton = status;
        },
    },
};
</script>

<style lang="scss" scoped>
main {
    width: 100%;
    height: 100vh;
    display: flex;
    overflow: hidden;
    position: relative;
    align-items: center;
    justify-content: center;

    .custom-logo {
        top: 32px;
        left: 32px;
        width: 96px;
        position: absolute;

        img {
            width: 100%;
            object-fit: fill;
        }
    }

    .custom-popup {
        width: 100%;
        height: 100%;
        z-index: 200;
        display: flex;
        position: fixed;
        align-items: center;
        justify-content: center;
        background-color: rgba(0, 0, 0, 0.1);

        &-wrapper {
            width: 100%;
            z-index: 250;
            display: flex;
            padding: 1rem;
            max-width: 420px;
            overflow: hidden;
            user-select: none;
            border-radius: 4px;
            position: relative;
            flex-direction: column;
            background-color: #ffffff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.16);

            &-message {
                display: flex;
                align-items: center;
                flex-direction: column;

                &-icon {
                    width: 32px;
                    height: 32px;
                    display: flex;
                    flex-shrink: 0;
                    border-radius: 2px;
                    margin-bottom: 1rem;
                    align-items: center;
                    justify-content: center;

                    span {
                        width: 100%;
                        height: 100%;
                        display: flex;
                    }

                    span.hidden {
                        display: none;
                    }
                    span.success {
                        color: #159f5c;
                    }
                    span.error {
                        color: #159f5c;
                    }
                }

                &-text {
                    color: #282828;
                    font-size: 1rem;
                    text-align: center;
                    line-height: 1.5rem;
                    margin-bottom: 1rem;
                }

                &-button {
                    width: 100%;
                    display: flex;
                    align-items: center;
                    justify-content: center;

                    button {
                        border: 0;
                        outline: 0;
                        width: 100%;
                        padding: 0.5rem;
                        font-size: 1rem;
                        color: #ffffff;
                        appearance: none;
                        font-weight: 500;
                        line-height: 1.5rem;
                        border-radius: 2px;
                        background-color: #fb8500;
                    }
                }
            }
        }
    }

    .custom-loader {
        width: 100%;
        height: 100%;
        z-index: 200;
        display: flex;
        position: fixed;
        align-items: center;
        justify-content: center;
        // background-color: rgba(0, 0, 0, 0.1);

        &-spinner {
            width: 32px;
            height: 32px;
            z-index: 200;
            flex-shrink: 0;
            position: relative;
            border-radius: 999999px;
            border: 3px solid #ffc685;
            border-right-color: #fb8500;
            animation: spinner 400ms linear infinite;

            @keyframes spinner {
                to {
                    transform: rotate(1turn);
                }
            }
        }
    }

    .custom-checkout {
        width: 100%;
        height: 100%;
        display: flex;
        max-width: 1200px;
        align-items: center;
        justify-content: center;

        .custom-form {
            width: 100%;
            display: grid;
            position: relative;
            grid-auto-flow: column;
            grid-template-columns: 60% 1fr;

            &-labels,
            &-basket {
                display: block;
                padding: 32px 0;

                &-wrapper {
                    width: 100%;
                    height: 100%;
                    padding: 0 32px;

                    h1 {
                        font-size: 24px;
                        color: #282828;
                        font-weight: 700;
                        line-height: 32px;
                    }

                    .custom-form {
                        display: flex;
                        flex-direction: column;

                        &-group {
                            // margin-top: 1rem;

                            &-title {
                                font-size: 18px;
                                color: #282828;
                                font-weight: 500;
                                line-height: 32px;
                            }

                            &-braintree {
                                display: flex;
                                flex-direction: column;

                                &-title {
                                    width: 100%;
                                    display: flex;
                                    font-weight: 400;
                                    color: #545454;
                                    font-size: 0.75rem;
                                    line-height: 1.125rem;
                                    justify-content: flex-end;
                                }
                            }

                            &-row {
                                --grid-in-row: 2;

                                gap: 24px;
                                width: 100%;
                                display: grid;
                                grid-auto-flow: row;
                                height: fit-content;
                                grid-template-columns: repeat(
                                    var(--grid-in-row),
                                    minmax(0, 1fr)
                                );

                                &-label {
                                    width: 100%;
                                    display: flex;
                                    flex-direction: column;

                                    &-title {
                                        font-weight: 500;
                                        color: #545454;
                                        font-size: 0.875rem;
                                        line-height: 1.125rem;
                                    }

                                    input {
                                        padding: 8px;
                                        outline: none;
                                        font-size: 1rem;
                                        border-radius: 0;
                                        line-height: 1.5rem;
                                        border: 2px solid #ebebeb;
                                        background-color: #ffffff;

                                        &::placeholder {
                                            color: #c4c4c4;
                                        }

                                        &:focus-within {
                                            border: 2px solid #fb8500;
                                        }

                                        // &:valid {
                                        //     border: 2px solid #ca2a2a;
                                        // }
                                    }

                                    &-error {
                                        display: flex;
                                        color: #ca2a2a;
                                        margin-top: 0.25rem;
                                        font-size: 0.875em;
                                        min-height: 1.125rem;
                                        line-height: 1.125rem;
                                    }
                                }
                            }
                        }
                    }
                }
            }

            &-basket {
                display: flex;
                flex-direction: column;

                &-wrapper {
                    &-group {
                        display: flex;
                        flex-direction: column;

                        &:not(:first-of-type) {
                            margin-top: 0.5rem;
                        }

                        .custom-form-group-row-label-title {
                            color: #282828;
                            font-weight: 400;
                            line-height: 1.5rem;
                        }

                        &-text {
                            width: 100%;
                            display: flex;
                            color: #282828;
                            align-items: center;
                            justify-content: space-between;

                            &:not(:first-of-type) {
                                margin-top: 0.5rem;
                            }

                            &-button {
                                width: 100%;
                                display: flex;
                                margin-top: 0.5rem;
                                align-items: center;
                                justify-content: center;

                                button {
                                    border: 0;
                                    width: 100%;
                                    outline: none;
                                    appearance: none;
                                    color: #ffffff;
                                    font-size: 1rem;
                                    padding: 0.5rem 0;
                                    font-weight: 500;
                                    line-height: 1.5rem;
                                    background-color: #fb8500;

                                    &:disabled {
                                        opacity: 0.6;
                                        cursor: not-allowed;
                                    }
                                }
                            }

                            &-title {
                                font-size: 0.875rem;
                                line-height: 1.5rem;
                            }

                            &-label {
                                font-weight: 700;
                                font-size: 0.875rem;
                                line-height: 1.5rem;
                            }
                        }
                    }
                }
            }

            &-policy {
                color: #545454;
                line-height: 1rem;
                font-size: 0.75rem;
                position: absolute;
                bottom: calc(0% + 32px);
            }
        }
    }

    @media only screen and (max-width: 1400px) {
        .custom-logo {
            display: none;
        }
    }
}
</style>
