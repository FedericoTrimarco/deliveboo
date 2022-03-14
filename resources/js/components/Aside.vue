<template>
    <div class="sidebar-container hidden">
        <div @click="sidebarToggle()" class="toggle">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"
                />
            </svg>
            <span>Filtra</span>
        </div>
        <div id="aside" class="aside">
            <aside class="py-5 aside-wrapper h-100 w-100">
                <!-- LOGO CONTAINER -->
                <div class="container">
                    <div class="ps-3">
                        <a href="/" class="site-logo">
                            <img
                                src="../images/deliveboo-logo.png"
                                alt="deliveboo-logo"
                            />
                        </a>
                    </div>
                </div>

                <!-- SIDEBAR -->
                <div class="container">
                    <h5 class="pt-5 pb-4 ps-3">Filtra per tipologia:</h5>

                    <div
                        class="checkbox-list position-relative"
                        v-for="(el, index) in mainArray"
                        :key="`typology-${index}`"
                    >
                        <label class="custom-checkbox pb-2 ps-3" :for="el.name">
                            <!-- :checked="selectedTypology == el.id" -->
                            <!-- v-model="checkedTypologies" -->
                            <input
                                :checked="selectedTypology == el.name"
                                type="checkbox"
                                :value="el.name"
                                :name="el.name"
                                :id="el.name"
                                @click="
                                    putTypologies(el.name),
                                        getTypologyFromAside(checkedTypologies)
                                "
                            />
                            <div class="checkbox m-2">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-6 w-6"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="2"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M5 13l4 4L19 7"
                                    />
                                </svg>
                            </div>
                            {{ el.name }}
                        </label>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</template>

<script>
export default {
    name: "Aside",
    data() {
        return {
            checkedTypologies: [],
        };
    },
    props: {
        mainArray: Array,
        selectedTypology: String,
    },
    created() {
        this.getTypologyFromAside;
    },
    watch: {
        selectedTypology: function (newVal, oldVal) {
            this.checkedTypologies = [newVal];
        },
    },
    methods: {
        putTypologies(typo) {
            if (!this.checkedTypologies.includes(typo)) {
                this.checkedTypologies.push(typo);
            } else if (this.checkedTypologies.includes(typo)) {
                for (let i = 0; i < this.checkedTypologies.length; i++) {
                    if (this.checkedTypologies[i] == typo) {
                        this.checkedTypologies.splice(i, 1);
                    }
                }
            }
        },
        getTypologyFromAside(typology) {
            this.$emit("getTypologyFromAside", typology);
        },
        sidebarToggle() {
            let aside = document.querySelector(".sidebar-container");
            aside.classList.toggle("hidden");
            aside.classList.toggle("show");
        },
    },
};
</script>

<style scoped lang="scss">
@import "../../sass/variables.scss";

.sidebar-container {
    width: 100%;
    height: 100%;
    max-width: 320px;
    position: absolute;
    left: -320px;
    background-color: #ffffff;
    border-right: 2px solid #282828;
    transition: left 0.1s ease-in-out;

    &.show {
        left: -320px;
        position: absolute;
        transition: left 0.4s ease-in-out;
        animation: slideIn 200ms linear forwards;

        @keyframes slideIn {
            to {
                left: 0px;
            }
        }
    }

    &.hidden {
        left: 0;
        position: absolute;
        transition: left 0.4s ease-in-out;
        animation: slideOut 200ms linear forwards;

        @keyframes slideOut {
            to {
                left: -320px;
            }
        }
    }
}

.aside-wrapper {
    padding-top: 100px;
}

.aside {
    width: 100%;
    height: 100%;
    display: flex;
    overflow: auto;
    overflow-x: hidden;
    position: relative;
    flex-direction: column;
    transition: all 0.4s ease-in-out;
}

.toggle {
    position: absolute;
    top: 2rem;
    display: flex;
    cursor: pointer;
    left: 318px;
    justify-content: center;
    width: 96px;
    align-items: center;
    height: 40px;
    appearance: none;
    border: 0;
    background-color: #282828;
    color: white;
    z-index: 9999999;

    > svg {
        width: 20px;
        height: 20px;
        display: flex;
    }

    > span {
        display: flex;
        margin-left: 8px;
    }
}

.checkbox-list {
    scrollbar-width: thin;
    overflow: auto;
}

.custom-checkbox {
    display: flex;
    align-items: center;
    line-height: 24px;
    font-size: 16px;
    cursor: pointer;
    &:hover .checkbox {
        border: 2px solid $site-col-3;
    }
}

.custom-checkbox input {
    display: none;
}

.custom-checkbox input:checked + .checkbox {
    background-color: $site-col-3;
    border: 0;
}

.custom-checkbox input:checked + .checkbox svg {
    display: flex;
    color: white;
}

.checkbox {
    width: 18px;
    height: 18px;
    background-color: white;
    border: 2px solid grey;
    border-radius: 3px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.checkbox svg {
    display: none;
}

// @media all and (max-width: 767px) {
//     .aside {
//         position: fixed;
//         z-index: 10;
//         background-color: white;
//         height: 100%;
//         box-shadow: rgba(17, 17, 26, 0.05) 0px 1px 0px,
//             rgba(17, 17, 26, 0.1) 0px 0px 8px;
//     }
// }
</style>
