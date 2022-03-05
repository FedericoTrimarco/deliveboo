<template>
    <section class="restaurants d-flex flex-column p-4">
        <div class="container-fluid">
            <div class="d-flex">
                <div v-for="(el, id) in mainArray" :key="id" class="card-restaurant p-2">
                    <router-link class="h-100 text-decoration-none text-dark" :to="{name: 'restaurantDetails', params: { id: el.restaurant_id }}">
                        <div class="restaurant-item h-100">
                            <div class="cover-restaurant">
                                <img :src="el.cover" class="w-100 h-100" alt="">
                            </div>
                            <div class="info-card d-flex p-3 flex-column">
                                <h5 class="mb-3">{{el.name}}</h5>
                                <span><i class="fa-solid fa-utensils mr-2"></i>{{el.name_typology}}</span>
                                <span><i class="fa-solid fa-location-dot mr-2"></i>{{el.address}}</span>
                            </div>
                        </div>
                    </router-link>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: 'TypologyRestaurant',
    props: {
        mainArray: Array,
    }
}
</script>

<style scoped lang="scss">
@import '../../sass/_variables.scss';
    .restaurants{
        /* border: 1px solid red;
        .container-fluid{
            border: 2px solid blue;
        } */
        width: 80%;
        .card-restaurant {
            width: 300px;
            height: 300px;
            .restaurant-item {
                outline: 2px solid transparent;
                outline-offset: 5px;
                transition: outline .2s;
                &:hover {
                    outline-color: $site-item-col;
                }
                box-shadow: rgba(0, 0, 0, 0.103) 1.95px 1.95px 2.6px;
                border-radius: 8px;
                overflow: hidden;
                cursor: pointer;
                .cover-restaurant{
                    height: 57%;
                    img {
                        object-fit: cover;
                    }
                }
                .info-card{
                    overflow: hidden;
                    backdrop-filter: blur(10px);
                    height: 43%;
                    transition: height 0.5s ;
                    h5 {
                        text-transform: capitalize;
                    }
                    span {
                        i{
                            color: $site-item-col;
                        }
                    }
                }
            }
        }
    }
</style>