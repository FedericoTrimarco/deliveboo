<template>
    <section class="restaurants d-flex flex-column ps-4">
        <div class="container">
            <div class="d-flex flex-wrap" v-if="filter[0] === '' && filter[1] == null || filter.length == 0">
                <div v-for="(el, id) in mainArray" :key="id">
                    <div class="card-restaurant p-2">
                        <router-link
                            class="h-100 text-decoration-none text-dark"
                            :to="{
                                name: 'restaurant',
                                params: { id: el.id },
                            }"
                        >
                            <div class="restaurant-item h-100">
                                <div class="cover-restaurant">
                                    <img
                                        :src="el.cover"
                                        class="w-100 h-100"
                                        alt=""
                                    />
                                </div>
                                <div class="info-card d-flex p-3 flex-column">
                                    <h5 class="mb-3">{{ el.user.name }}</h5>
                                    <div class="typologies">
                                        <i
                                            class="fa-solid fa-utensils mr-2"
                                        ></i>
                                        <span
                                            v-for="(typology, id) in el.typologies"
                                            :key="`tpology-${id}`"
                                        >
                                            {{ typology.name }},
                                        </span>
                                    </div>
                                    <span
                                        ><i
                                            class="fa-solid fa-location-dot mr-2"
                                        ></i
                                        >{{ el.user.address }}</span
                                    >
                                </div>
                            </div>
                        </router-link>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-wrap" v-else>
                <div v-for="(el, id) in mainArray" :key="id">
                    <div
                        class="card-restaurant p-2"
                        v-if="getFilter(el.typologies, filter)"
                    >
                        <router-link
                            class="h-100 text-decoration-none text-dark"
                            :to="{
                                name: 'restaurant',
                                params: { id: el.id },
                            }"
                        >
                            <div class="restaurant-item h-100">
                                <div class="cover-restaurant">
                                    <img
                                        :src="el.cover"
                                        class="w-100 h-100"
                                        alt=""
                                    />
                                </div>
                                <div class="info-card d-flex p-3 flex-column">
                                    <h5 class="mb-3">{{ el.user.name }}</h5>
                                    <div class="typologies">
                                        <i class="fa-solid fa-utensils mr-2"></i>
                                        <span
                                            v-for="(typology, id) in el.typologies"
                                            :key="`tpology-${id}`"
                                        >
                                            {{ typology.name }},
                                        </span>
                                    </div>
                                    <span>
                                        <i class="fa-solid fa-location-dot mr-2"></i>
                                        {{ el.user.address }}
                                    </span
                                    >
                                </div>
                            </div>
                        </router-link>
                    </div>
                </div>
            </div>

        </div>
    </section>
</template>

<script>
export default {
    name: "TypologyRestaurant",
    props: {
        mainArray: Array,
        filter: Array,
        allRestaurant: Array,
    },
    methods: {
        getFilter(array1, array2) {
            let isInclude = false;
            array1.forEach((el) => {
                if (array2.includes(el.name)) {
                    isInclude = true;
                }
            });
            return isInclude;
        },
    },
};
</script>

<style scoped lang="scss">
@import "../../sass/_variables.scss";
.restaurants {
    /* border: 1px solid red;
        .container-fluid{
            border: 2px solid blue;
        } */
    padding-top: 150px;
    width: 80%;
    .card-restaurant {
        width: 300px;
        height: 300px;
        .restaurant-item {
            outline: 2px solid transparent;
            outline-offset: 5px;
            transition: outline 0.2s;
            &:hover {
                outline-color: $site-item-col;
            }
            box-shadow: rgba(0, 0, 0, 0.103) 1.95px 1.95px 2.6px;
            border-radius: 8px;
            overflow: hidden;
            cursor: pointer;
            .cover-restaurant {
                height: 57%;
                img {
                    object-fit: cover;
                }
            }
            .info-card {
                overflow: hidden;
                backdrop-filter: blur(10px);
                height: 43%;
                transition: height 0.5s;
                h5 {
                    text-transform: capitalize;
                }
                i{
                    color: $site-item-col;
                }
                .typologies{
                    overflow: hidden;
                    text-overflow: ellipsis;
                    white-space: nowrap;
                }
            }
        }
    }
}
</style>
