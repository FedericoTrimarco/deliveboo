<template>
    <header class="front-header position-fixed vw-100">
        <div class="container header-container">
            <nav class="d-flex justify-content-between align-items-center p-3">
                <!-- Left Side Of Navbar -->
                    <a class="site-logo" href="/">
                        <img src="../images/deliveboo-logo.png" alt="deliveboo-logo">
                    </a>
            
                    <div v-if="$route.path != '/'" class="d-flex">
                        <select class="form-control mx-3 flex-shrink-1" name="category_id" id="category_id"  v-model="typologyLink">
                                <option v-for="typology in typologies" :key="`typology-${typology.id}`" :value="typology.id">{{ typology.name }}</option>
                        </select>
                        <router-link :to="{name: 'restaurant', params: {id: typologyLink}}" class=" site-primary-btn">Cerca</router-link>
                    </div>
                    <div>
                        <a class="text-uppercase site-primary-btn mr-3" href="/admin">Area Privata</a>
                        <button class="site-primary-btn">
                            <i class="fas fa-shopping-cart"></i>
                        </button>
                    </div>
            </nav>
        </div>
    </header>
</template>

<script>
import axios from 'axios'

export default {
    name: 'Header',
    data(){
        return{
            typologies: null,
            typologyLink: '',
        }
    },
    created(){
        this.getTypologies();
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
    }
}
</script>

<style lang="scss" scoped>
    .front-header {
        background: rgba(2, 48, 71, 0.5);

        nav {
           background-color: transparent;
        }
       
    }
    
</style>
