<template>
    <header
        class="front-header position-fixed vw-100"
        :class="{
            onScroll: !view.topOfPage || $route.path != '/',
            hidden: getCurrentRouteName === 'checkout',
        }"
    >
        <nav class="row justify-content-between align-items-center p-3 px-5">
            <!-- Left Side Of Navbar -->
            <div class="col-4">
                <router-link
                    v-if="$route.path != '/'"
                    :to="{ name: 'home' }"
                    class="site-logo"
                >
                    <img
                        src="../images/deliveboo-logo.png"
                        alt="deliveboo-logo"
                    />
                </router-link>

                <a v-else href="/" class="site-logo">
                    <img
                        src="../images/deliveboo-logo.png"
                        alt="deliveboo-logo"
                    />
                </a>

                <!-- <a class="site-logo" href="/">
                    <img src="../images/deliveboo-logo.png" alt="deliveboo-logo">
                </a> -->
            </div>

            <div class="d-none d-sm-block col-6 col-md-4">
                <div
                    v-if="$route.path != '/' || !view.topOfPage"
                    class="d-flex align-items-center"
                >
                    <!-- <select class="form-control mx-3 flex-grow-1" name="category_id" id="category_id"  v-model="typologyLink" placeholder-text="Selezionare una tipologia">
                            <option selected disabled hidden value="">Selezionare una tipologia</option>
                            <option v-for="typology in typologies" :key="`typology-${typology.id}`" :value="typology.id">{{ typology.name }}</option>
                    </select> -->
                    <!-- <div class="position-relative w-100 mr-lg-3">
                        <div
                            @click="selectDopdown()"
                            class="w-100 text-center py-2 site-pointer site-custom-select"
                        >
                            <div
                                class="site-control-select"
                                v-if="typologyLink === ''"
                            >
                                Seleziona tipologia
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
                    </div> -->
                    <!-- <router-link :is="typologyLink === '' ? 'span' : 'router-link'" :to="{name: 'restaurant', params: {id: typologyLink}}" class=" site-primary-btn">Cerca</router-link> -->

                    <!-- <a href="#restaurants" class=" site-primary-btn" @click="getTypology(typologyName)">Cerca</a> -->
                </div>
            </div>
            <div class="col-2 col-md-4 d-flex justify-content-end">
                <div class="position-relative">
                    <a
                        class="d-md-none site-control-select site-control-select-2"
                        @click="changeDropDownDisplay"
                    >
                        <!-- <i class="fa-solid fa-bars"></i> -->

                        <Hamburger class="site-primary-btn"/>
                    </a>
                    <div
                        class="d-md-block site-dropdown"
                        :class="{ 'd-none': dropdownNone }"
                    >
                        <div class="d-flex flex-column flex-md-row">
                            <div
                                v-if="$route.path == '/' && !view.topOfPage"
                                class="position-relative"
                            >
                                <button
                                    class="d-sm-none text-uppercase site-primary-btn mb-3 site-control-select"
                                    @click="changeDropLeftDisplay"
                                >
                                    Cerca Ristoranti
                                </button>
                                <div
                                    class="site-dropleft d-sm-none"
                                    :class="{ 'd-none': dropleftNone }"
                                >
                                    <div class="position-relative w-100 mb-3">
                                        <div
                                            @click="selectDopdown()"
                                            class="w-100 text-center py-2 site-pointer site-custom-select"
                                        >
                                            <div
                                                class="site-control-select"
                                                v-if="typologyLink === ''"
                                            >
                                                Seleziona tipologia
                                            </div>
                                            <div
                                                class="site-control-select"
                                                v-else
                                            >
                                                {{
                                                    typologies[typologyLink - 1]
                                                        .name
                                                }}
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
                                                    (typologyLink =
                                                        typology.id),
                                                        selectDopdown(),
                                                        changeDropDownDisplay(),
                                                        (typologyName =
                                                            typology.name),
                                                        getTypology(
                                                            typologyName
                                                        )
                                                "
                                            >
                                                {{ typology.name }}
                                            </li>
                                        </ul>
                                    </div>

                                    <router-link
                                        :is="
                                            typologyLink === ''
                                                ? 'span'
                                                : 'router-link'
                                        "
                                        :to="{
                                            name: 'restaurant',
                                            params: { id: typologyLink },
                                        }"
                                        class="site-primary-btn"
                                        >Cerca</router-link
                                    >
                                </div>
                            </div>
                            <a
                                class="site-primary-btn px-4 px-lg-5"
                                href="/admin"
                                >Registrati o accedi</a
                            >
                        </div>
                    </div>
                </div>
                <!-- <div class="d-none d-md-flex ">
                    <a class="text-uppercase site-primary-btn mr-3" href="/admin">Area Privata</a>
                    <button class="site-primary-btn">
                        <i class="fas fa-shopping-cart"></i>
                    </button>
                </div> -->
            </div>
        </nav>
    </header>
</template>

<script>
import axios from "axios";
import Hamburger from "../components/Hamburger";

export default {
    name: "Header",
    components: {
        Hamburger,
    },
    data() {
        return {
            typologies: null,
            typologyLink: "",
            typologyName: "",

            view: {
                topOfPage: true,
            },
            dropdownNone: true,
            dropleftNone: true,
            select: true,
        };
    },
    computed: {
        getCurrentRouteName() {
            return this.$route.name;
        },
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
    watch: {
        $route(to, from) {
            this.dropdownNone = true;
            this.dropleftNone = true;
        },
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
        changeDropDownDisplay() {
            this.dropdownNone = !this.dropdownNone;
            this.dropleftNone = true;
            this.select = true;
        },
        changeDropLeftDisplay() {
            this.dropleftNone = !this.dropleftNone;
        },
        selectDopdown() {
            this.select = !this.select;
        },
        onClick(event) {
            if (!event.target.classList.contains("site-control-select")) {
                if (this.select == false) {
                    this.select = true;
                } else if (this.dropleftNone == false) {
                    this.dropleftNone = true;
                } else {
                    this.select = true;
                    this.dropdownNone = true;
                    this.dropleftNone = true;
                }

                // console.log(event.target);
            }
        },
        getTypology(typology) {
            this.$emit("getTypology", typology);
        },
    },
};
</script>

<style lang="scss" scoped>
.hidden {
    display: none;
}

.front-header {
    background: transparent;
    z-index: 1;
    transition: all 0.4s ease-in-out;

    &.onScroll {
        box-shadow: 0 0 10px #aaa;
        background-color: white;
    }

    nav {
        background-color: transparent;

        .site-logo {
            padding: 0;
            img {
                max-width: 100%;
            }
        }

        .site-custom-select {
            background: #e0f4fe;
            color: #219ebc;
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

                &:nth-child(even) {
                    background: #daf1fd;
                    color: #219ebc;
                }

                &:hover {
                    background: #ffb703;
                }
            }
        }

        .site-pointer {
            cursor: pointer;
        }

        @media all and (max-width: 767px) {
            .site-dropdown {
                position: absolute;
                top: 50px;
                left: -65px;
                background-color: rgb(2, 48, 71);
                padding: 10px;
                width: 150px;
                box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px,
                    rgba(0, 0, 0, 0.3) 0px 30px 60px -30px;
            }

            .site-pointer {
                cursor: pointer;
            }
        }

        @media all and (max-width: 767px) {
            .site-dropdown {
                position: absolute;
                top: 50px;
                left: -65px;
                background-color: rgb(2, 48, 71);
                padding: 10px;
                width: 150px;
                box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px,
                    rgba(0, 0, 0, 0.3) 0px 30px 60px -30px;

                .site-primary-btn {
                    padding: 5px;
                    text-align: center;
                }
            }
        }

        .site-dropleft {
            position: absolute;
            right: 140px;
            top: -10px;
            background-color: rgb(2, 48, 71);
            padding: 10px;
            width: 200px;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset,
                rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;

            .site-primary-btn {
                padding: 5px;
                text-align: center;
            }
        }
    }
}
</style>
