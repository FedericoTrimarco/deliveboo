<template>
    <div>
        <Header />

        <main>
            <!-- component matched by the route will render here -->
            <router-view
                :typologies="typologies"
                :restaurants="restaurants"
            >
            </router-view>
        </main>

        <Footer />
    </div>
</template>

<script>
import Header from '../components/Header.vue';
import Footer from '../components/Footer.vue';
import axios from 'axios';
export default {
    name: 'App',
    components: {
        Header,
        Footer,
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

<style lang="scss">

</style>