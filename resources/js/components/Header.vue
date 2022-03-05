<template>
    <header class="front-header position-fixed vw-100" :class="{ 'onScroll': !view.topOfPage || $route.path != '/'}">
        <div class="container header-container">
            <nav class="d-flex justify-content-between align-items-center p-3">
                <!-- Left Side Of Navbar -->
                    <a class="site-logo" href="/">
                        <img src="../images/deliveboo-logo.png" alt="deliveboo-logo">
                    </a>
            
                    <div v-if="$route.path != '/' || !view.topOfPage" class="d-flex">
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
            view: {
                topOfPage: true
            }
        }
    },
    created(){
        this.getTypologies();
    },
    beforeMount() {
        window.addEventListener('scroll', this.handleScroll)
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
        handleScroll(){
            if(window.pageYOffset>250){
                if(this.view.topOfPage) this.view.topOfPage = false
            } else {
                if(!this.view.topOfPage) this.view.topOfPage = true
            }
        },
    }
}
</script>

<style lang="scss" scoped>
    .front-header {
        background: transparent;
        z-index: 1;
        transition: all 0.4s ease-in-out;

        &.onScroll {
            box-shadow: 0 0 10px #aaa;
            background-color: rgba(2, 48, 71, 0.5);
        }

        nav {
           background-color: transparent;

           .site-logo {
               img {
                   filter: contrast(180%) drop-shadow(8px 8px 10px rgb(51, 50, 50));
               }
           }
        }
       
    }
    
</style>
