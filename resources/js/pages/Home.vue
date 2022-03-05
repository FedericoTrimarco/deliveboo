<template>
    <div>
        <Hero />
    </div>
</template>

<script>
import axios from 'axios';
import Hero from '../components/Hero.vue'
export default {
    name: 'Home',
    components: {
        Hero,
    },
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