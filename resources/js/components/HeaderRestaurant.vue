<template>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <img :src="image" alt="">    
                </div>
                <div class="col-6 ps-4">
                    <h2>{{ name }} </h2>
                    <p class="mt-4" ><span>Categorie:</span>Americana</p>
                    <p><span>Ci troviamo in:</span>{{ address }}</p>
                    <div class="box-info" >
                        <i class="fa-solid fa-info icon"></i>
                        <a href=""
                           class="info">
                            <span class="ms-2 me-2" >Informazioni</span>
                        </a>
                        <i class="fa-solid fa-chevron-right icon"></i>
                    </div>
                </div>
                <div class="col-2">
                    <div>
                        <i class="fa-solid fa-person-biking icon"></i>
                        <span>Cosegna tra: 40-50 minuti</span>
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
               border: 2px solid #ffb703;
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

   }

</style>