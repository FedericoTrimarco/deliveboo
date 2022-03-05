<template>
    <section class="container">
        <router-link 
                    v-for="typology in typologies"
                    :key="`prodotto-${typology.id}`"
                    :to="{name: 'restaurant', params: { id: typology.id }}"
                >
            {{typology.name}}
        </router-link>
    </section>
</template>

<script>
import axios from 'axios';
export default {
    name: 'Home',
    data(){
        return{
            typologies: null,
            restaurants: null,
        }
    },
    created(){
        this.getTypologies();
        this.getRestaurants();
    },
    methods: {
        getTypologies(){
            axios.get('http://127.0.0.1:8000/api/typologies')
            .then(res => {
                    this.typologies = res.data;
                })
            .catch(function (error) {
                console.log(error);
            })
        },
        getRestaurants(){
            axios.get('http://127.0.0.1:8000/api/restaurants')
            .then(res => {
                    this.restaurants = res.data;
                })
            .catch(function (error) {
                console.log(error);
            })
        },
    }
}
</script>

<style>

</style>