<template>
    <header>
        <nav class="d-flex justify-content-between align-items-center p-3">
            <!-- Left Side Of Navbar -->
                <a class="site-logo" href="/">
                    <img src="../images/deliveboo-logo.png" alt="deliveboo-logo">
                </a>
                
                <input type="text" width="500px">

                <div>
                    <a class="text-uppercase site-primary-btn mr-3" href="/admin">Area Privata</a>
                    <button class="site-primary-btn">
                        <i class="fas fa-shopping-cart"></i>
                    </button>
                </div>
        </nav>
    </header>
</template>

<script>
export default {
    name: 'Header',
}
</script>

<style lang="scss" scoped>
    .site-primary-btn {
        padding: 5px;
    }
</style>
