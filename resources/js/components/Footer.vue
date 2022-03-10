<template>
    <footer>
        <div class="container-fluid foot">
            <!--Top-->
            <div class="row box">
                <div class="col-lg-6 top">
                    <div>
                        <img
                            class="logo"
                            src="../images/deliveboo-logo.png"
                            alt=""
                        />
                    </div>
                    <div class="app">
                        <img
                            class="me-3 mt-2"
                            src="https://d3i4yxtzktqr9n.cloudfront.net/web-eats-v2/6a17d190539d6845b10955e8ba585d36.svg"
                            alt=""
                        />
                        <img
                            class="mt-2 me-3"
                            src="https://d3i4yxtzktqr9n.cloudfront.net/web-eats-v2/75a8c9ee29967730c0674e7fa870e582.png"
                            alt=""
                        />
                    </div>
                </div>

                <div class="col-lg-3 d-none d-lg-block">
                    <ul>
                        <li>
                            <a href="">Aggiungi il tuo ristorante</a>
                        </li>
                        <li>
                            <a href="">Richiedi assistenza</a>
                        </li>
                        <li>
                            <a href="">Registrati per consegnare</a>
                        </li>
                        <li>
                            <a href="">Crea un account aziendale</a>
                        </li>
                        <li>
                            <a href="">Guarda i piatti più venduti</a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-3 d-none d-lg-block">
                    <ul>
                        <li>
                            <a href="https://www.linkedin.com/in/luigiragusa/">
                                <i class="fa-brands fa-linkedin me-1"></i>Luigi
                                Ragusa</a
                            >
                        </li>
                        <li>
                            <a href="https://www.linkedin.com/in/luirusso/">
                                <i class="fa-brands fa-linkedin me-1"></i>Luigi
                                Russo</a
                            >
                        </li>
                        <li>
                            <a
                                href="https://www.linkedin.com/in/federico-trimarco/"
                            >
                                <i class="fa-brands fa-linkedin me-1"></i
                                >Federico Trimarco</a
                            >
                        </li>
                        <li>
                            <a
                                href="https://www.linkedin.com/in/vittorio-sbardella-0873b2232/"
                            >
                                <i class="fa-brands fa-linkedin me-1"></i
                                >Vittorio Sbardella</a
                            >
                        </li>
                        <li>
                            <a
                                href="https://www.linkedin.com/in/misia-pierobon-b7b6391b1/"
                            >
                                <i class="fa-brands fa-linkedin me-1"></i>Misia
                                Pierobon</a
                            >
                        </li>
                    </ul>
                </div>
            </div>

            <!--Horizontal Rule-->
            <div class="hr mb-4 mt-5"></div>

            <!--Bottom-->
            <div class="d-flex justify-content-between">
                <div class="socialBox">
                    <ul class="d-flex social">
                        <li>
                            <a href=""
                                ><i class="fa-brands fa-facebook-square"></i
                            ></a>
                        </li>
                        <li>
                            <a href=""><i class="fa-brands fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href=""
                                ><i class="fa-brands fa-instagram"></i
                            ></a>
                        </li>
                    </ul>
                </div>

                <div>
                    <ul class="d-flex list d-none d-lg-block">
                        <li>
                            <a href="">Informativa sulla privacy</a>
                        </li>
                        <li>
                            <a href="">Termini e condizioni</a>
                        </li>
                        <li>
                            <a href="">Tariffe</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!--Privacy-->
            <div class="d-none d-lg-block">
                <ul class="d-flex list justify-content-end">
                    <li>
                        Questo sito è protetto da reCAPTCHA. Si applicano
                        <a href="">Informativa sulla privacy e</a>
                        <a href="">Termini e condizioni</a>
                        di Google
                    </li>
                    <li>&copy; 2022 Boolean Technologies Inc.</li>
                </ul>
            </div>
        </div>
    </footer>
</template>

<script>
export default {
    name: "Footer",
    data() {
        return {};
    },
};
</script>

<style scoped lang="scss">
footer {
    width: 100%;
    background-color: #000;
    color: #fff;
    padding: 80px 70px;
    justify-self: flex-end;
    .foot {
        .logo {
            width: 135px;
        }
    }
    .box {
        height: 250px;
        .top {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .app {
            img {
                width: 135px;
            }
        }
    }
    li {
        list-style: none;
        line-height: 40px;
    }
    a {
        text-decoration: none;
        color: #fff;
        &:hover {
            text-decoration: underline;
            color: #fff;
        }
    }
    .social {
        padding-left: 0;
        a {
            font-size: 18px;
            margin-right: 35px;
        }
    }
    .list {
        li {
            margin-left: 35px;
        }
    }
    .hr {
        width: 100%;
        height: 2px;
        background-color: #fff;
    }
}
// Media Query
@media all and(max-width: 991.98px) {
    .top {
        text-align: center;
    }
}
@media all and(max-width: 991.98px) {
    .socialBox {
        margin: 0 auto;
    }
}
</style>
