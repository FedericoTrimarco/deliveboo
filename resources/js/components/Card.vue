<template>
    <div>
        <div class="card-plate h-100 position-relative">

            <!-- plate-img -->
            <figure class="h-50 position-relative">
                <img :src="img" :alt="`${name}-image`" class="w-100 h-100 img-flud">
                <h1 class="position-absolute m-0">{{ name }}</h1>
            </figure>

            <!-- plate details -->
            <div class="p-3 description">
                <span><strong>Prezzo</strong>: {{ price }}€</span>
                <h3 class="mt-4">Description</h3>
                <p>{{ description }}</p>
            </div>

            <!-- link for show plate -->
            <a :href="showProduct" class="py-2 px-3 position-absolute">View Details</a>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Card',
    props: {
        img: String,
        name: String,
        price: String,
        description: String,
        // showProduct: String,
    }
}
</script>

<style lang="scss" scoped>
@import '../../sass/partials/_variables.scss';
.card-plate{
    background-color: $site-card-bg;
    border-radius: 10px;
    overflow: hidden;
    a{
        bottom: 20px;
        right: 30px;
        font-size: 1rem;
        font-weight: bold;
        text-decoration: none;
        cursor: pointer;
        border-radius: 30px;
        background-color: $site-item-col;
    }
    h1, h3, strong{
        font-weight: bold;
        color: $site-primary-col;
    }
    figure{
        img{
            object-fit: cover;
        }
        h1{
            border-top-right-radius: 10px;
            background-color: #8ecae683;
            padding: 15px;
            bottom: 0;
            left: 0;
            
        }
    }
    .description{
        span{
            font-size: 30px;
        }
        p{
            font-size: 1rem;
        }
    }
}
</style>
