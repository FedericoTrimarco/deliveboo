<template>
    <!-- <div class="front-hero" ref="hero">
        <div class="mb-3 d-flex flex-column align-items-start justify-content-center vh-100">
            <div v-if="view.topOfPage" class="select-container" id="search-hero" >
                <div class="d-flex justify-content-center">
                    <div class="position-relative w-75 mr-3">
                        <div @click="selectDopdown()" class="w-100 text-center py-3 site-pointer site-custom-select" >
                            <div class="site-control-select" v-if="typologyLink === ''"> Cos'hai voglia di mangiare oggi? </div>
                            <div class="site-control-select" v-else>
                                {{ typologies[typologyLink - 1].name }}
                            </div>
                        </div>
                        <ul class="position-absolute text-center w-100 list-group overflow-auto select-dropdown" :class="{ 'd-0': select }" >
                            <li v-for="typology in typologies" :key="`typology-${typology.id}`" class="list-group-item site-pointer"
                                @click=" (typologyLink = typology.id), selectDopdown(), (typologyName = typology.name) " >
                                {{ typology.name }}
                            </li>
                        </ul>
                    </div>
                    <a href="#restaurants" class="site-primary-btn search d-flex align-items-center" @click="getTypology(typologyName)" >Cerca</a>
                </div>
            </div>
        </div>
    </div> -->
    
    <div class="custom-hero">
        <div class="app-logo">
                <a href="/"><img src="../images/deliveboo-nl.svg" alt="deliveboo-logo" /></a>
        </div>
        <div class="custom-search">
            <div class="custom-search-action">
                <div class="custom-search-action-input">
                    <input
                        type="text"
                        placeholder="Cosa vuoi mangiare?"
                        v-model="input"
                        @input="getSuggest(input)"
                    />
                    <div class="custom-search-action-input-dropdown">
                        <ul v-if="filterTypology">
                            <li
                                v-for="typology in filterTypology"
                                :key="`typology-${typology.id}`"
                                @click="
                                    (typologyLink = typology.id),
                                        selectDopdown(),
                                        (typologyName = typology.name),
                                        retriveTypologies(typologyName)
                                "
                            >
                                {{ typology.name }}
                            </li>
                        </ul>
                    </div>
                </div>
                <a
                    href="#restaurants"
                    class="custom-search-action-button"
                    @click="retriveTypologies(typologyName)"
                >
                    Cerca
                </a>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import Header from "./Header.vue";

export default {
    components: { Header },
    name: "Hero",
    data() {
        return {
            input: "",
            typologies: null,
            filterTypology: null,
            typologyLink: "",
            typologyName: "",
            view: { topOfPage: true },
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
        getSuggest(string) {
            if (this.typologies && this.input != "") {
                this.filterTypology = this.typologies.filter((typology) =>
                    typology.name.toLowerCase().match(string.toLowerCase())
                );
            }

            if (this.input == "") {
                this.filterTypology = null;
            }
        },
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
        retriveTypologies(typology) {
            this.$emit("retriveTypologies", typology);
            this.input = "";
        },
    },
};
</script>

<style lang="scss" scoped>
@import "../../sass/variables.scss";
.custom-hero {
    flex-grow: 1;
    display: flex;
    overflow: hidden;
    padding-top: 72px;
    position: relative;
    background-position: center;
    background-image: url("../images/hero-deliveboo.jpg");

    .custom-search {
        top: 40%;
        left: 2rem;
        display: flex;
        padding: 1rem;
        min-width: 480px;
        position: absolute;
        flex-direction: column;
        transform: translateY(-50%);

        .custom-search-action {
            display: flex;
            align-items: center;

            &-input {
                width: 100%;
                display: flex;
                color: #282828;
                min-width: 320px;
                cursor: pointer;
                margin-right: 1rem;
                position: relative;
                background-color: #ffffff;
                justify-content: space-between;

                input {
                    width: 100%;
                    outline: none;
                    padding: 0.5rem;
                    font-size: 1rem;
                    color: #282828;
                    appearance: none;
                    line-height: 1.5rem;
                    border: 2px solid #ebebeb;

                    &:focus-within {
                        border-color: #282828;
                    }

                    &::placeholder {
                        color: #c4c4c4;
                    }
                }

                &-title {
                    font-weight: 500;
                    font-size: 1rem;
                    color: #545454;
                    line-height: 1.5rem;
                }

                &-icon {
                    width: 24px;
                    height: 24px;
                    display: grid;
                    place-items: center;
                }

                &-dropdown {
                    left: 0;
                    top: 100%;
                    width: 100%;
                    overflow: auto;
                    position: absolute;
                    max-height: calc(56px * 3);
                    background-color: #ffffff;

                    ul {
                        margin: 0;
                        padding: 0;
                        display: block;

                        li {
                            display: flex;
                            align-items: center;
                            padding: 1rem;

                            &:hover {
                                background-color: #f2f2f2;
                            }
                        }
                    }
                }
            }

            &-button {
                display: grid;
                color: #ffffff;
                font-size: 1rem;
                place-items: center;
                line-height: 1.5rem;
                padding: 0.5rem 1rem;
                text-decoration: none;
                background-color: #fb8500;
            }
        }
    }
}

/* .front-hero {
    height: 100vh;
    background: url("../images/hero-deliveboo.png") no-repeat center center;
    background-size: cover;
    transition: all 0.3s ease-in-out;

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
            width: 50%;
        }
    }
}

.search {
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
} */
</style>
