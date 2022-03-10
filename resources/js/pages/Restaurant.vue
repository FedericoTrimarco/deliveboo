<template>
    <section class="custom-section">
        <h1>I NOSTRI PIATTI</h1>
        <div class="container-fluid mt-5">
            <div class="row">
                <div class="custom-section-wrapper col-8">
                    <div v-for="(category, index) in categories" :key="index" class="mb-5" v-show="menuCategories.includes(category.name)">
                        <h1>{{category.name}}</h1>
                        <ul class="card-list list-unstyled d-flex row">
                            <li 
                                @click="checkForLocalstorage(item)"
                                v-for="(item, index) in menu"
                                :key="`item-${index}`"
                                v-show="item.category.name == category.name"
                                class="col-4 pointer p-3"
                            >
                                <div v-if="item.visible" class="custom-card row rounded">
                                    <div class="col-4 image-plate">
                                        <img :src="item.image" alt="" class="w-100 h-100">
                                    </div>
                                    <div class="col-8 info">
                                        <h4 class="custom-card-name mt-3">{{ item.name }}</h4>
                                        <p><strong>Ingredienti:</strong> {{item.ingredients}}</p>
                                        <p><strong>Descrizione:</strong> {{item.description}}</p>
                                        <p class="text-end price m-0">€{{item.price}}</p>
                                    </div>

                                    <!-- <span class="text-danger">{{item.category.name}}</span>
                                    <div class="custom-card-image-container">
                                        <img :src="item.image" alt="">
                                    </div>
                                    <h3 class="custom-card-name">{{ item.name }}</h3>
                                    <p>
                                        {{
                                            item.price.toLocaleString("it", {
                                                style: "currency",
                                                currency: "EUR",
                                            })
                                        }}
                                    </p>
                                    <button @click="checkForLocalstorage(item)">
                                        Aggiungi al carrello
                                    </button> -->
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-4 order">
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
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import axios from "axios";
import Header from "../components/Header.vue";
import Card from "../components/Card.vue";
export default {
    components: { Header, Card },
    data() {
        return {
            menu: [],
            categories: null,
            menuCategories: [],
            cart: {},
        };
    },
    created() {
        this.getCategories();
        this.getMenu();
    },
    watch:{
        menu: function(){
            this.menu.forEach(el => {
                if(el.visible){
                    this.menuCategories.push(el.category.name)

                }
            })
        }
    },
    created() {
        this.getCart();
    },
    methods: {
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
                console.log(obj);
                localStorage.setItem("cart", JSON.stringify(obj));
            }
        },
        getCart() {
            if (JSON.parse(localStorage.getItem("cart")) !== null) {
                this.cart = JSON.parse(localStorage.getItem("cart"));
                console.log('lello');
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
    },
};
</script>

<style lang="scss" scoped>
.pointer{
    cursor: pointer;
}
.custom-section{
    margin: 150px auto 0;
    width: 80%;
    .custom-section-wrapper{
        border: 2px solid blue;
        ul{
            li{
                .custom-card{
                    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
                    transition: all .4s ease-in-out;
                    background-color: #fff;
                    &:hover{
                       box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;
                    }
                    .info{
                        .price{
                            font-size: 20px;
                            color: #bcc5d8;
                        }
                    }
                    .image-plate{
                        padding: 15px;
                        img{
                            border-radius: 5px;
                            object-fit: cover;
                        }
                    }
                }
            }
        }

    }
    .order{
        border: 2px solid red;
    }
}




</style>
