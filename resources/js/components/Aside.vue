<template>
    <div class="row">
        <div class="container">
            <aside class="aside-wrapper col-2 px-5">
                <div>
                    <h5 class="py-3">Cerca per Tipo:</h5>

                    <div
                        v-for="(el, index) in mainArray"
                        :key="`typology-${index}`"
                    >
                        <input
                            :value="el.name"
                            v-model="checkedTypologies"
                            :name="el.name"
                            :id="el.name"
                            type="checkbox"
                        />
                        <label class="pb-3" :for="el.name">
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

<style scoped style="scss">
.aside-wrapper {
    background-color: grey;
}
</style>
