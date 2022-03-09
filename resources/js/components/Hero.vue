<template>
    <div class="front-hero">
        <div class="container mb-3 d-flex flex-column align-items-start justify-content-center vh-100">

                <div v-if="view.topOfPage" class="select-container" id="search-hero">
                    <label class="px-3"  for="typology_id">Tipologie Ristoranti</label>
                    <div class="d-flex">
                        <!-- <select class="form-control mx-3 flex-shrink-1" name="typology_id" id="typology_id"  v-model="typologyLink">
                                <option selected disabled value="">Selezionare una tipologia</option>
                                <option v-for="typology in typologies" :key="`typology-${typology.id}`" :value="typology.id">{{ typology.name }}</option>
                        </select> -->
                        <div class="position-relative w-100 mr-3">
                            <div @click="selectDopdown()" class="w-100 text-center py-2 site-pointer site-custom-select">
                                <div class="site-control-select" v-if="typologyLink === ''" >Seleziona tipologia</div>
                                <div class="site-control-select" v-else>{{ typologies[typologyLink-1].name }}</div>
                            </div>
                            <ul class="position-absolute text-center w-100 list-group overflow-auto select-dropdown" :class="{'d-0': select}">
                                <li v-for="typology in typologies" :key="`typology-${typology.id}`" class="list-group-item site-pointer" @click="typologyLink = typology.id, selectDopdown(), typologyName = typology.name">{{ typology.name }}</li>
                            </ul>
                        </div>
                         <a href="#restaurants" class=" site-primary-btn" @click="getTypology(typologyName)">Cerca</a>
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
            typologyName: '',
            view: {
                topOfPage: true
            },
            select: true,
        }
    },
    created(){
        this.getTypologies();
    },
    beforeMount() {
        window.addEventListener('scroll', this.handleScroll)
    },
    mounted() {
        document.addEventListener('click', this.onClick);
    },
    beforeDestroy() {
        document.removeEventListener('click', this.onClick);
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
        selectDopdown() {
            this.select = ! this.select;
        },
        onClick(event) {
            if (event.target.className !==  'site-control-select') {
                this.select = true;
            }
        },
        getTypology(typology){
            this.$emit('getTypology', typology);
        }
    }
}
</script>

<style lang='scss' scoped>
    .front-hero {
        height: 100vh;
        background: url('../images/hero-deliveboo.png') no-repeat center center;
        background-size: cover;
        .select-container {
            width: 100%;
            color: white;
            background: rgba(2, 48, 71, 0.5);
            padding: 10px;
            transform: translateY(-100px);

            .site-pointer {
                cursor: pointer;
            }
            .site-custom-select {
                background: #E0F4FE;
                color: #219EBC;
            }
            .select-dropdown {
                max-height: 300px;
                transition: all 0.5s ease-in-out;

                &.d-0 {
                    max-height: 0px;
                }

                li {
                    background: #c7ecff;
                    color: #179dbe;

                    &:nth-child(even){
                        background: #daf1fd;
                        color: #219EBC;
                    }

                    &:hover {
                        background: #FFB703;
                    }
                }
            }
        }

        @media all and (min-width: 769px) {
            .select-container {
                width: 40%;
            }
        }


    }
</style>