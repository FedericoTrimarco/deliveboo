<template>
    <div>
        <div class="app-logo">
                <a @click.prevent="alertMessage"><img src="../images/deliveboo-nl.svg" alt="deliveboo-logo" /></a>
        </div>
        <section class="custom-section">
            <HeaderRestaurant v-if="restaurant" :image="restaurant.cover" :name="restaurant.user.name" :typologiesArray="restaurant.typologies" :address="restaurant.user.address" class="mb-5"
            />
            <!-- :typologiesArray="restaurant.typologies" -->
            <hr class="mb-5" />
            <h1 class="restaurant-title">Il nostro menù</h1>
            <div class="container-fluid mt-5">
                <div class="row">
                    <div class="custom-section-wrapper col-12  col-md-6  col-xxl-7">
                        <div v-for="(category, index) in categories" :key="index" class="mb-5" v-show="menuCategories.includes(category.name)">
                            <h2 class="restaurant-subtitle">{{ category.name }}</h2>
                            <ul class="card-list list-unstyled d-flex flex-wrap">
                                <li @click="checkForLocalstorage(item)" v-for="(item, index) in menu" :key="`item-${index}`" v-show="item.category.name == category.name &&item.visible" class="pointer p-3">
                                    <div v-if="item.visible" class="custom-card row rounded position-relative h-100">
                                        <div class="col-4 image-plate">
                                            <img :src="item.image" alt="" class="w-100 h-100" />
                                        </div>
                                        <div class="col-8 info">
                                            <h4 class="custom-card-name mt-3">
                                                {{ item.name }}
                                            </h4>
                                            <p class="info-plate">
                                                <strong>Ingredienti:</strong>
                                                {{ item.ingredients }}
                                            </p>
                                            <p class="info-plate">
                                                <strong>Descrizione:</strong>
                                                {{ item.description }}
                                            </p>
                                            <p class="text-end price m-0">
                                                €{{ item.price }}
                                            </p>
                                        </div>
                                        <div class="add-to-cart position-absolute top-0 start-0 h-100 d-flex justify-content-center align-items-center">
                                            <h3> AGGIUNGI AL <i class="fas fa-shopping-cart"></i></h3>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-7 col-md-6 col-xxl-5 order pt-5">
                        <div class="cart-review p-3">
                            <h1 class="restaurant-title">Riepilogo Ordine</h1>
                            <hr />
                            <div class="cart-header" >
                                <span class="fs-5"><strong>Nome</strong></span>
                                <span class="fs-5"><strong>Quantità</strong></span>
                                <span class="fs-5"><strong></strong></span>
                            </div>
                            <ul class="list-unstyled">
                                <li v-for="(plate, id) in cart.plates" :key="id" class="cart-item">
                                    <h4>{{ plate.name }}</h4>
                                    <span>x{{ plate.quantity }}</span>
                                    <div>
                                        <span class="cart-icon" @click="addToCart(plate)"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg></span>
                                        <span class="cart-icon" @click="removeFromCart(plate)" ><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg></span>
                                    </div>
                                </li>
                            </ul>
                            <router-link
                                :to="{ name: 'checkout' }"
                                class="site-primary-btn d-block p-3 text-center button-cart"
                                :class="{ disabled: cart.length == 0 || cart.plates.length == 0, }" >
                                <i class="fas fa-shopping-cart fs-4"></i>
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="col-12 order-responsive"
                :class="{ open: maxHeight == true, 'with-plates': cart.length != 0 && cart.plates.length != 0, }" >
                <div class="cart-review-responsive p-3 d-flex flex-column h-100" >
                    <div class="d-flex flex-column align-items-center mb-4" @click="viewCartResponive">
                        <i class="fa-solid fa-angle-up fs-4 arrow"></i>
                        <h2  class="restaurant-title">Riepilogo Ordine</h2>
                    </div>
                    <hr />
                    <div class="my-4">
                        <span class="fs-5"><strong>Nome Piatto</strong></span>
                    </div>
                    <ul class="list-unstyled flex-grow-1">
                        <li v-for="(plate, id) in cart.plates" :key="id" class="cart-item" >
                            <h4>{{ plate.name }}</h4>
                            <span>x{{ plate.quantity }}</span>
                            <div>
                                <span class="cart-icon" @click="addToCart(plate)" ><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg></span>
                                <span class="cart-icon" @click="removeFromCart(plate)" ><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg></span>
                            </div>
                        </li>
                    </ul>
                    <router-link
                        :to="{ name: 'checkout' }"
                        class="site-primary-btn d-block p-3 text-center button-cart"
                        :class="{
                            disabled:
                                cart.length == 0 || cart.plates.length == 0,
                        }"
                    >
                        <i class="fas fa-shopping-cart fs-4"></i>
                    </router-link>
                </div>
            </div>
        </section>

        <Footer />
    </div>
</template>

<script>
import axios from "axios";
import Header from "../components/Header.vue";
import HeaderRestaurant from "../components/HeaderRestaurant.vue";
import Card from "../components/Card.vue";
import Footer from "../components/Footer.vue";
export default {
    components: {
        Header,
        Card,
        HeaderRestaurant,
        Footer,
    },
    data() {
        return {
            restaurant: null,
            menu: [],
            categories: null,
            menuCategories: [],
            cart: [],
            maxHeight: false,
        };
    },
    created() {
        this.getSingleRestaurant();

        this.getCart();
        this.getCategories();

        this.getMenu();
    },
    watch: {
        menu: function () {
            this.menu.forEach((el) => {
                if (el.visible) {
                    this.menuCategories.push(el.category.name);
                }
            });
        },
    },
    methods: {
        getSingleRestaurant() {
            axios
                .get(
                    `http://127.0.0.1:8000/api/restaurants/${this.$route.params.id}`
                )
                .then((res) => {
                    if (res.data.not_found) {
                        this.$router.push({ name: "not_found" });
                    } else {
                        this.restaurant = res.data;
                    }
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                });
        },
        getCategories() {
            axios
                .get("http://127.0.0.1:8000/api/categories")
                .then((res) => {
                    this.categories = res.data;
                })
                .catch((err) => log.error(err));
        },
        // prettier-ignore
        getMenu() {
            const id = JSON.stringify({ id: this.$route.params.id });
            const config = { headers: { "Content-Type": "application/json", Accept: "application/json" } };
            axios.post("http://127.0.0.1:8000/api/restaurant/menu", id, config).then((response) => this.menu = response.data);
        },
        checkForLocalstorage(item) {
            if (
                JSON.parse(localStorage.getItem("cart") !== null) &&
                Object.keys(JSON.parse(localStorage.getItem("cart"))).length > 0
            ) {
                const cart = JSON.parse(localStorage.getItem("cart"));

                const exist = cart["plates"].find(
                    (element) => element.id === item.id
                );
                if (exist) exist.quantity++;
                else
                    cart["plates"].push({
                        id: item.id,
                        name: item.name,
                        quantity: 1,
                    });

                localStorage.setItem("cart", JSON.stringify(cart));
            } else {
                const obj = {
                    id: this.$route.params.id,
                    plates: [{ id: item.id, name: item.name, quantity: 1 }],
                };
                localStorage.setItem("cart", JSON.stringify(obj));
            }
            this.getCart();
        },
        getCart() {
            if (JSON.parse(localStorage.getItem("cart")) !== null) {
                this.cart = JSON.parse(localStorage.getItem("cart"));
            }
        },
        addToCart(product) {
            if (
                JSON.parse(localStorage.getItem("cart") !== null) &&
                Object.keys(JSON.parse(localStorage.getItem("cart"))).length > 0
            ) {
                const cart = JSON.parse(localStorage.getItem("cart"));
                const exist = cart["plates"].find(
                    (element) => element.id === product.id
                );
                if (exist) exist.quantity++;
                localStorage.setItem("cart", JSON.stringify(cart));
            }
            this.getCart();
        },
        removeFromCart(product) {
            if (
                JSON.parse(localStorage.getItem("cart") !== null) &&
                Object.keys(JSON.parse(localStorage.getItem("cart"))).length > 0
            ) {
                const cart = JSON.parse(localStorage.getItem("cart"));
                const exist = cart["plates"].find(
                    (element) => element.id === product.id
                );
                if (exist) {
                    exist.quantity--;
                    if (exist.quantity <= 0) {
                        const index = cart["plates"].indexOf(exist);
                        cart["plates"].splice(index, 1);
                    }

                    localStorage.setItem("cart", JSON.stringify(cart));
                }
                this.getCart();
            }
        },
        viewCartResponive() {
            this.maxHeight = !this.maxHeight;
        },
        alertMessage() {
            if (Object.keys(this.cart).length > 0) {
                if (confirm('Sei sicuro di voler uscire? Perderai tutti i prodotti presenti nel carrello!')) {
                    this.$router.push({ name: 'home' })
                } else {
                    console.log('Ok rimango qui');
                }
            } else {
                this.$router.push({ name: 'home' })
            }
        }
    },
};
</script>

<style lang="scss" scoped>
.pointer {
    cursor: pointer;
}
.disabled {
    opacity: 0.5;
    pointer-events: none;
}

.restaurant-title {
    font-size: 2rem;
    font-weight: 700;
    line-height: 3.5rem;
}

.restaurant-subtitle {
    font-size: 1.75rem;
    font-weight: 600;
    line-height: 2rem;
}

.cart-header {
     display: grid;
     margin-bottom: 0.5rem;
      grid-template-columns: 2fr 1fr 1fr;
}

.cart-item {
    display: grid;
    line-height: 28px;
    margin-bottom: .5rem;
    align-content: center;
    grid-template-columns: 2fr 1fr 1fr;

    > h4 {
        margin: 0;
        padding: 0;
        font-size: 1.125rem;
        font-weight: 500;
        line-height: 28px;
        letter-spacing: 0.02rem;
    }

    > span:first-of-type {
        display: flex;
        font-size: 1.125rem;
    }

    > div:last-of-type {
        display: flex;
        justify-content: flex-end;

        > span:last-of-type {
            margin-left: 1rem;
        }
    }
}

.cart-icon {
    width: 32px;
    height: 32px;
    display: grid;
    cursor: pointer;
    color: #282828;
    place-items: center;
}

.custom-section {
    margin: 150px auto 0;
    width: 80%;
     color: #282828;

    .custom-section-wrapper {
        ul {
            li {
                width: 450px;
                .custom-card {
                    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
                    transition: all 0.4s ease-in-out;
                    background-color: #fff;
                    overflow: hidden;
                    .add-to-cart {
                        background-color: #ffb8038f;
                        backdrop-filter: blur(2px);
                        opacity: 0;
                        transition: all 0.6s ease-in-out;
                    }
                    &:hover {
                        box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px,
                            rgba(0, 0, 0, 0.3) 0px 18px 36px -18px;
                        .add-to-cart {
                            opacity: 1;
                        }
                    }
                    .info {
                        h4 {
                            text-transform: capitalize;
                        }
                        /* .info-plate{
                            overflow: hidden;
                            text-overflow: ellipsis;
                            white-space: nowrap;
                        } */
                        .price {
                            font-size: 20px;
                            color: #bcc5d8;
                        }
                    }
                    .image-plate {
                        padding: 15px;
                        img {
                            border-radius: 5px;
                            object-fit: cover;
                        }
                    }
                }
            }
        }
    }
}
.order {
    .cart-review {
        display: flex;
        flex-direction: column;
        margin-bottom: 50px;
        background-color: #fff;
        min-height: 400px;
        border-radius: 5px;
        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
        position: sticky;
        top: 150px;

        ul {
            flex-grow: 1;
            max-height: 300px;
            overflow: auto;
        }
    }
}
.order-responsive {
    position: sticky;
    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    height: 0;
    overflow: hidden;
    background: #fff;
    bottom: 0;
    left: 0;
    transition: all 0.4s ease-in-out;
    div .arrow {
        transition: all 0.4s ease-in-out;
    }
    &.with-plates {
        height: 80px;
    }
    &.open {
        height: 80vh;
        div .arrow {
            transform: rotate(180deg);
        }
    }
    .cart-review-responsive {
        ul {
            max-height: 300px;
            overflow: auto;
        }
    }
}

/**********
RESPONSIVE
***********/

@media screen and (max-width: 860px) {
    .order {
        display: none;
    }
    .order-responsive {
        display: block;
    }
}
@media screen and (min-width: 860px) {
    .order-responsive {
        display: none;
    }
}
</style>
