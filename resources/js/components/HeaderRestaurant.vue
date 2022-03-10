<template>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-4">
                
                    
                 
                </div>
                <div class="col-6">
                    <h2> </h2>
                    <span>Consegna tra 40-50 minuti</span>
                    <p>descriptions:</p>
                    <div>
                        <i class="fa-solid fa-circle-info byke"></i>
                        <span>Informazioni</span>
            
                    </div>

                </div>
                <div class="col-2">
                    <div>
                        <i class="fa-solid fa-person-biking byke"></i>
                        <span>Cosegna tra 40-50 minuti</span>
                    </div>

                </div>
            </div>
        </div>
        

    </header>
  
</template>

<script>
export default {
    name: 'HeaderRestaurant',
}
</script>

<style scoped lang="scss">
   header {
       width: 100%;
       height: 310px;
       padding: 32px 0;
       img{
           width: 100%;
           height: 250px;
           border-radius: 10px;
       }
       .byke{
           font-size: 25px;
           color: #ffb703;
          
       }
       .card{
           width: 150px;
       }
   }

</style>