<template>
    <div>
        <Header />
        <main>
            <router-view></router-view>
        </main>

        <Footer />
    </div>
</template>

<script>
import axios from "axios";
import Header from "../components/Header.vue";
import Footer from "../components/Footer.vue";
export default {
    name: "App",
    components: {
        Header,
        Footer,
    },
    data() {
        return {
            typologies: null,
            restaurants: null,
        };
    },
    created() {
        this.getTypologies();
        this.getRestaurants();
    },
    methods: {
        getTypologies() {
            axios
                .get("http://127.0.0.1:8000/api/typologies")
                .then((res) => {
                    this.typologies = res.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        getRestaurants() {
            axios
                .get("http://127.0.0.1:8000/api/restaurants")
                .then((res) => {
                    this.restaurants = res.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
    },
};
</script>

<style lang="scss">
@import "../styles/main.scss";
</style>
