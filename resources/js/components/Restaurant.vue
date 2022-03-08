<template>
    <section id="restaurants" class="d-flex typology-restaurant vh-100">
        <Aside
            :mainArray="typologies"
            :selectedTypology="selectedTypology"
            @getTypologyFromAside="selectedTypologyLello"
        />

        <TypologyRestaurant
            :filter="checkedTypologies"
            :mainArray="restaurants"
        />
    </section>
</template>

<script>
import axios from "axios";
import Aside from "../components/Aside";
import TypologyRestaurant from "./TypologyRestaurant.vue";

export default {
    name: "Restaurant",
    components: {
        Aside,
        TypologyRestaurant,
    },
    props: {
        selectedTypology: String,
    },
    data() {
        return {
            typologies: null,
            restaurants: null,
            checkedTypologies: [],
            // selectedTypology: null,
        };
    },
    created() {
        this.getTypologies();
        this.getRestaurants();
    },
    computed: {
        firstTypology() {
            return (this.checkedTypologies = [this.selectedTypology]);
        },
    },
    methods: {
        getRestaurants() {
            axios
                .get("http://127.0.0.1:8000/api/restaurants")
                .then((res) => {
                    this.restaurants = res.data;
                })
                .catch((err) => log.error(err));
        },

        getTypologies() {
            axios
                .get("http://127.0.0.1:8000/api/typologies")
                .then((res) => {
                    this.typologies = res.data;
                })
                .catch((err) => log.error(err));
        },

        selectedTypologyLello(typology) {
            return (this.checkedTypologies = typology);
        },
    },
};
</script>

<style scoped lang="scss"></style>
