<template>
    <section class="typology-restaurant">
      <Aside 
        :mainArray="typologies"/>
    </section>
</template>

<script>
import Aside from '../components/Aside';
import axios from 'axios';

export default {
    name: 'Restaurant',
    components: {
      Aside,
    },
    data() {
      return {
        typologies: null,
        restaurants: null,
      }
    },
    created() {
        this.getTypologies();
        this.getRestaurants();
    },

    methods: {
          getRestaurants() {
            axios.get(`http://127.0.0.1:8000/api/typologies/${this.$route.params.id}`)
            .then(res => {
                /* if (res.data.not_found) {
                    this.$router.push({ name: 'not_found' })
                } else { */
                    this.product = res.data;
                // }
            })
            .catch(err => log.error(err));
          },

          getTypologies(){
            axios.get('http://127.0.0.1:8000/api/typologies')
            .then(res => {
                    this.typologies = res.data;
                })
            .catch(err => log.error(err));
        },
    }
}
</script>

<style>

</style>