<template>
    <div class="front-hero" ref="hero">
        <div
            class="mb-3 d-flex flex-column align-items-start justify-content-center vh-100"
        >
            <div
                v-if="view.topOfPage"
                class="select-container"
                id="search-hero"
            >
                <div class="d-flex justify-content-center">
                    <!-- <select class="form-control mx-3 flex-shrink-1" name="typology_id" id="typology_id"  v-model="typologyLink">
                                <option selected disabled value="">Selezionare una tipologia</option>
                                <option v-for="typology in typologies" :key="`typology-${typology.id}`" :value="typology.id">{{ typology.name }}</option>
                        </select> -->
                    <div class="position-relative w-75 mr-3">
                        <div
                            @click="selectDopdown()"
                            class="w-100 text-center py-3 site-pointer site-custom-select"
                        >
                            <div
                                class="site-control-select"
                                v-if="typologyLink === ''"
                            >
                                Cos'hai voglia di mangiare oggi?
                            </div>
                            <div class="site-control-select" v-else>
                                {{ typologies[typologyLink - 1].name }}
                            </div>
                        </div>
                        <ul
                            class="position-absolute text-center w-100 list-group overflow-auto select-dropdown"
                            :class="{ 'd-0': select }"
                        >
                            <li
                                v-for="typology in typologies"
                                :key="`typology-${typology.id}`"
                                class="list-group-item site-pointer"
                                @click="
                                    (typologyLink = typology.id),
                                        selectDopdown(),
                                        (typologyName = typology.name)
                                "
                            >
                                {{ typology.name }}
                            </li>
                        </ul>
                    </div>
                    <a
                        href="#restaurants"
                        class="site-primary-btn search d-flex align-items-center"
                        @click="getTypology(typologyName)"
                        >Cerca</a
                    >

                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "Hero",
    data() {
        return {
            typologies: null,
            typologyLink: "",
            typologyName: "",
            view: {
                topOfPage: true,
            },
            select: true,
        };
    },
    created() {
        this.getTypologies();
    },
    beforeMount() {
        window.addEventListener("scroll", this.handleScroll);
    },
    mounted() {
        document.addEventListener("click", this.onClick);
    },
    beforeDestroy() {
        document.removeEventListener("click", this.onClick);
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
        handleScroll() {
            if (window.pageYOffset > 250) {
                if (this.view.topOfPage) this.view.topOfPage = false;
            } else {
                if (!this.view.topOfPage) this.view.topOfPage = true;
            }
        },
        selectDopdown() {
            this.select = !this.select;
        },
        onClick(event) {
            if (event.target.className !== "site-control-select") {
                this.select = true;
            }
        },
        getTypology(typology) {
            this.$emit("getTypology", typology);
            this.fadeOnClick();
        },
        fadeOnClick(){
            this.$refs.hero.style.opacity = '0';
            setTimeout(()=> {
               this.$refs.hero.style.display = 'none';
            }, 800)
        }
    },
};
</script>

<style lang="scss" scoped>
@import "../../sass/variables.scss";

.front-hero {
    height: 100vh;
    background: url("../images/hero-deliveboo.png") no-repeat center center;
    background-size: cover;
    transition: all .3s ease-in-out;
    
    // scrollbar-width: none;
    .select-container {
        color: white;
        // background: rgba(2, 48, 71, 0.5);
        padding: 10px;
        transform: translateY(-100px);
        width: 100%;

        .site-pointer {
            cursor: pointer;
        }
        .site-custom-select {
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
            background: #fff;
            color: gray;
        }
        .select-dropdown {
            max-height: 300px;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
            transition: all 0.5s ease-in-out;

            &.d-0 {
                max-height: 0px;
            }

            li {
                background: white;
                color: gray;

                &:hover {
                    background: $site-col-3;
                    color: white;
                }
            }
        }
    }

    @media all and (min-width: 999px) {
        .select-container {
            width: 50%
        }
    }
}

.search {
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
}
</style>
