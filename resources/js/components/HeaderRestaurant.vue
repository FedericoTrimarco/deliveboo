<template>
    <header>
        <div>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <img :src="image" alt="">
                </div>

                <div class="col-12 col-md-6 col-lg-6 ps-4 title">
                    <h2>{{ name }} </h2>
                    <p class="mt-4">
                        <span><i class="fa-solid fa-utensils icon me-2"></i></span>
                        <span v-for="(el, id) in typologiesArray" :key="id"><s></s>{{ el.name}} </span>
                    </p>

                    <p class="maps" >
                        <span><i class="fa-solid fa-map-pin icon me-2"></i>Ci troviamo in:
                        </span>
                        {{ address }}
                    </p>
                </div>
            </div>
        </div>
    
    </header>
  
</template>

<script>
export default {
    name: 'HeaderRestaurant',
    props: { 
        image: String,
        name: String,
        address: String,
        typologiesArray: Array,
    },
    methods: { 
        showCategories(array) {
            return array.split(',').join('');
        }
    }
}
</script>

<style scoped lang="scss">
   header {
       width: 100%;
       margin-top: 25px;
       padding: 25px 0;
       img{
           width: 100%;
           height: 265px;
           border-radius: 5px;
           box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
           object-fit: cover;
       }
       h2{
           font-size: 45px;
           font-weight: 700;
           color: #282828;
       }
       .box-info{
           width: 170px;
           height: 35px;
           border-radius: 5px;
           border: 2px solid transparent;
           display: flex;
           align-items: center;
           justify-content: space-between;
           padding: 8px;
           &:hover{
               border: 4px solid #f5dd9f;
           }
           .info{
               text-decoration: none;
               color: #2e3333;
               font-size: 18px;
           }
       }
       .icon{
           font-size: 18px;
           color: #ffb703;
          
       }

       .content{
           width: 150px;height: 80px;
       }
   }
   @media all and(max-width: 768px) {
    .title {
        text-align: center;
        margin-top:2rem;
    }
    .maps {
        display: none;
    }
}

  

</style>