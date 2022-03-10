<template>
    <main>
        <HeaderRestaurant :image="restaurant.cover" :name="restaurant.user.name" :address="restaurant.user.address"/>

        <section class="custom-section">
            <div class="custom-section-wrapper">
                <ul class="card-list">
                    <li
                        class="custom-card"
                        v-for="(item, index) in menu"
                        :key="`item-${index}`"
                    >
                        <router-link to="">
                            <div class="custom-card-image-container">
                                <div
                                    class="custom-card-image"
                                    :style="`background-image: url('../storage/${item.image}')`"
                                ></div>
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
                            </button>
                        </router-link>
                    </li>
                </ul>
            </div>
        </section>
    </main>
</template>

<script>
import axios from "axios";
import Header from "../components/Header.vue";
import HeaderRestaurant from "../components/HeaderRestaurant.vue";
import Card from "../components/Card.vue";
export default {
    components: { Header, Card, HeaderRestaurant},
    data() {
        return {
            restaurant: null,
            menu: [],
        };
    },
    created() {
        this.getSingolRestaurant();
        this.getMenu();
    },
    methods: {
        //Header Restaurant
        getSingolRestaurant() {
            axios.get(`http://127.0.0.1:8000/api/restaurants/${this.$route.params.id}`)
            .then(res => {
                    if (res.data.not_found) {
                        this.$router.push({ cover: 'not_found' })
                    } else {
                        this.restaurant = res.data;
                        console.log(this.restaurant);
                    }
                })
            .catch(function (error) {
        // handle error
            console.log(error);
            })
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
    },
};
</script>

<style lang="scss" scoped>
main {
    flex-grow: 1;
    display: flex;
    padding-top: 80px;
    flex-direction: column;
}

.custom-section {
    padding: 48px 0 80px;

    .custom-section-wrapper {
        margin: 0 auto;
        padding: 0 32px;
        width: calc(100% - (2 * 32px));

        h2 {
            margin: 0;
            font-size: 40px;
            font-weight: 600;
            margin-bottom: 32px;
        }

        .card-list {
            margin: 0;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
            margin: 0 0 -32px -32px;

            > .custom-card {
                list-style: none;
                padding-left: 32px;
                padding-bottom: 32px;
                width: calc(100% / 3);

                a {
                    color: currentColor;
                    text-decoration: none;

                    .custom-card-image-container {
                        padding-top: 50%;
                        position: relative;
                        margin-bottom: 8px;

                        .custom-card-image {
                            left: 0;
                            top: 0;
                            width: 100%;
                            height: 100%;
                            position: absolute;
                            background-size: cover;
                        }
                    }

                    .custom-card-name {
                        font-weight: 500;
                        margin-bottom: 4px;
                        font-size: 1.125rem;
                        letter-spacing: 0.02rem;
                    }

                    .custom-card-description {
                        margin: 0;
                        padding: 0;
                        font-size: 16px;
                    }
                }
            }
        }
    }
}

@media screen and (max-width: 768px) {
    .custom-card {
        width: 100% !important;
        flex-grow: 0 !important;
        flex-shrink: 0 !important;

        &.custom-card-long {
            width: 100%;
            flex-grow: 0;
            flex-shrink: 0;
        }
    }
}
</style>
