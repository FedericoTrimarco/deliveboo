<template>
    <header>
        <div class="container">
            <div class="row">

                <div class="col-12 col-md-6 col-lg-4">
                    <img :src="image" alt="">    
                </div>

                <div class="d-sm-none d-md-block col-md-6 col-lg-6 ps-4">
                    <h2>{{ name }} </h2>
                    <p class="mt-4">
                        <span><i class="fa-solid fa-utensils icon me-2"></i>Categorie:
                        </span>
                        Americana
                    </p>

                    <p>
                        <span><i class="fa-solid fa-map-pin icon me-2"></i>Ci troviamo in:
                        </span>
                        {{ address }}
                    </p>

                    <div class="box-info" >
                        <i class="fa-solid fa-info icon"></i>
                        <a href=""
                           class="info">
                            <span>Informazioni</span>
                        </a>
                        <i class="fa-solid fa-chevron-right icon"></i>
                    </div>
                </div>

                <div class="d-none d-sm-block d-sm-none d-md-block d-md-none d-lg-block col-lg-2">
                    <div>
                        <i class="fa-solid fa-person-biking icon"></i>
                        <span>Consegna fra:</span>
                        <div class="mt-3" >40/50 minuti</div>
                    </div>
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
    }

}
</script>

<style scoped lang="scss">
   header {
       width: 100%;
       height: 310px;
       margin-top: 45px;
       padding: 25px 0;
       color: #2e3333;
       img{
           width: 100%;
           height: 265px;
           border-radius: 5px;
           box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
       }
       h2{
           font-size: 45px;
           font-weight: 700;
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

</style>