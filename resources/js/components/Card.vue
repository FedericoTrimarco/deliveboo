<template>
    <div class="h-100">
        <div class="h-100 card-plate d-flex flex-column">

            <!-- plate-img -->
            <figure class="position-relative ">
                <img v-if="plate" :src="img" :alt="`${name}-image`" class="w-100 h-100 img-flud " :class="{'not-visible' : visible == '0' }">
                <img v-else src="http://www.persefone.it/blog/wp-content/themes/photobook/images/blank.png" alt="img-not-found" class="w-100 h-100 img-flud ">
                <span v-if="visible == '0'" class="text-danger position-absolute">NON VISIBILE</span>
                <h1 class="position-absolute m-0">{{ name }}</h1>
            </figure>

            <!-- plate details -->
            <div class="p-4 d-flex flex-column justify-content-center">
                <div class="description">
                    <span><strong>Prezzo</strong>: {{ price }}€</span>
                    <h3 class="mt-4">Ingredienti</h3>
                    <p>{{ description }}</p>
                </div>

                <!-- link for show plate -->
                <div>
                    <a :href="show" class="show py-2 px-3">Dettagli</a>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
export default {
    name: 'Card',
    props: {
        plate: String,
        visible: String,
        img: String,
        name: String,
        price: String,
        description: String,
        show: String,
    }
}
</script>

<style lang="scss" scoped>
@import '../../sass/partials/_variables.scss';
.not-visible{
    filter: grayscale(100);
}
.card-plate{
    background-color: $site-card-bg;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;
    .show{
        font-size: 1rem;
        font-weight: bold;
        text-decoration: none;
        cursor: pointer;
        border-radius: 30px;
        background-color: $site-item-col;
    }
    i{
       
        font-size: 20px;
    }
    h1, h3, strong{
        font-weight: bold;
        color: $site-primary-col;
    }
    figure{
        height: 400px;
        img{
            object-fit: cover;
            object-position: center;
        }
        h1{
            border-top-right-radius: 10px;
            background-color: #8ecae683;
            padding: 15px;
            bottom: 0;
            left: 0;
        }
        span{
            border: 3px solid red;
            top: 20px;
            left: 20px;
            filter: none;
            z-index: 10;
            background: rgba(0, 0, 0, 0.609);
            padding: 10px;
            font-weight: bold;
            font-size: 20px;
            border-radius: 10px;
        }
    }
    .description{
        span{
            font-size: 30px;
        }
        p{
            width: 200px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            font-size: 1rem;
        }
    }
}
</style>
