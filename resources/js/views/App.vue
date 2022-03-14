<template>
    <div class="app-wrapper">
        <!-- <Header @getTypology="getTypology" /> -->
        <div class="loader" v-if="!pageLoaded">
            <div class="loader-spin"></div>
        </div>
        <main v-else>
            <div class="login-button">
                <a href="/admin">Accedi</a>
            </div>
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
        async getRestaurants() {
            const response = await axios.get("http://127.0.0.1:8000/api/restaurants");
            this.restaurants = response.data;
            this.pageLoaded = true
        },
        getTypology(typology) {
            this.selectedTypology = typology;
        },
    },
};
</script>

<style lang="scss">
@import "../styles/main.scss";

* {
    scrollbar-width: thin;
    ::-webkit-scrollbar {
        display: none;
    }
}

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

    .login-button {
        top: 2rem;
        right: 2rem;
        display: grid;
        color: #ffffff;
        cursor: pointer;
        z-index: 999999;
        position: absolute;
        place-items: center;
        padding: 0.5rem 1rem;
        background-color: #333333;

        > a {
            color: #ffffff;
            font-size: 1rem;
            line-height: 1.5rem;
            text-decoration: none;
        }
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
