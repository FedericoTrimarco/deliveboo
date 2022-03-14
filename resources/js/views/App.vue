<template>
    <div class="app-wrapper">
        <!-- <Header @getTypology="getTypology" /> -->
        <div class="loader" v-if="!pageLoaded">
            <div class="loader-spin"></div>
        </div>
        <main v-else>
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
            pageLoaded: false,
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
        this.pageLoaded = true;
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
    scrollbar-width: none;
    flex-direction: column;

    > main {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        background-color: #ffffff;
    }
}

.loader {
    width: 100%;
    height: 100%;
    display: flex;
    position: fixed;
    align-items: center;
    justify-content: center;

    &-spin {
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
</style>
