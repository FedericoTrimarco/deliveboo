<template>
    <div class="app-wrapper">
        <Header @getTypology="getTypology" />

        <main>
            <router-view :selectedTypology="selectedTypology"></router-view>
        </main>
    </div>
</template>

<script>
import axios from "axios";
import Header from "../components/Header.vue";
export default {
    name: "App",
    components: {
        Header,
    },
    data() {
        return {
            typologies: null,
            restaurants: null,
            selectedTypology: null,
        };
    },
    watch: {
        selectedTypology: function (newVal, oldVal) {
            this.checkedTypologies = [newVal];
        },
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
        getTypology(typology) {
            // console.log(typology);
            this.selectedTypology = typology;
        },
    },
};
</script>

<style lang="scss">
@import "../styles/main.scss";
.app-wrapper {
    width: 100%;
    height: 100%;
    display: flex;
    overflow: auto;
    flex-direction: column;

    > main {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        background-color: #f9fafa;
    }
}
</style>
