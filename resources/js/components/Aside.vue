<template>
    <div>
        <div class="aside row h-100">
            <aside
                class="aside-wrapper col-md-4 col-lg-3 col-xxl-2 h-100 px-3 px-lg-5 w-100"
            >
                <div class="container">
                    <h5 class="pt-5 ps-3 pb-3">Filtra per Tipo:</h5>

                    <div
                        class="position-relative"
                        v-for="(el, index) in mainArray"
                        :key="`typology-${index}`"
                    >
                        <label class="custom-checkbox pb-2 ps-3" :for="el.name">
                            <input
                                type="checkbox"
                                checked="checked"
                                :value="el.name"
                                v-model="checkedTypologies"
                                :name="el.name"
                                :id="el.name"
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
    },
};
</script>

<style scoped lang="scss">
@import "../../sass/variables.scss";

.aside-wrapper {
    box-shadow: rgba(17, 17, 26, 0.05) 0px 1px 0px,
        rgba(17, 17, 26, 0.1) 0px 0px 8px;
        padding-top: 100px;
}

.custom-checkbox {
    display: flex;
    align-items: center;
    line-height: 24px;
    font-size: 16px;
    cursor: pointer;
    &:hover .checkbox {
        border: 2px solid $site-item-col;
    }
}

.custom-checkbox input {
    display: none;
}

.custom-checkbox input:checked + .checkbox {
    background-color: $site-item-col;
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

@media all and (max-width: 767px) {
    .aside {
        display: none;
    }
}
</style>
