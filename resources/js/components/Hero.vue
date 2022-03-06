<template>
    <div class="front-hero">
        <div class="container mb-3 d-flex flex-column align-items-start justify-content-center vh-100">

                <div v-if="view.topOfPage" class="select-container w-50">
                    <label class="px-3"  for="typology_id">Tipologie Ristoranti</label>
                    <div class="d-flex">
                        <select class="form-control mx-3 flex-shrink-1" name="typology_id" id="typology_id"  v-model="typologyLink">
                                <option v-for="typology in typologies" :key="`typology-${typology.id}`" :value="typology.id">{{ typology.name }}</option>
                        </select>
                        <router-link :to="{name: 'restaurant', params: {id: typologyLink}}" class=" site-primary-btn">Cerca</router-link>
                    </div>
                </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    name: 'Hero',
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

<style lang='scss' scoped>
    .front-hero {
        height: 100vh;
        background: url('../images/hero-deliveboo.png') no-repeat center center;
        background-size: cover;
        .select-container {
            width: 33%;
            color: white;
            background: rgba(2, 48, 71, 0.5);
            padding: 10px;
            transform: translateY(-100px);
        }
    }
</style>