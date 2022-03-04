<template>
    <main>
        <section class="custom-section">
            <div class="custom-section-wrapper">
                <h2>I vostri tipici preferiti</h2>
                <div class="card-wrapper">
                    <router-link class="custom-card" to="/">
                        <div class="custom-card-container">
                            <div class="custom-card-container-image">
                                <span class="placeholder">
                                    <span class="image-text">Dessert</span>
                                </span>
                            </div>
                        </div>
                        <div class="custom-card-texts">
                            Lorem ipsum dolor sit amet consectetur, adipisicing
                            elit. Assumenda, repellendus.
                            <span>Scopri di più</span>
                        </div>
                    </router-link>
                    <router-link class="custom-card custom-card-long" to="/">
                        <div class="custom-card-container">
                            <div class="custom-card-container-image">
                                <span class="placeholder">
                                    <span class="image-text">Dessert</span>
                                </span>
                            </div>
                        </div>
                        <div class="custom-card-texts">
                            Lorem ipsum dolor sit amet consectetur, adipisicing
                            elit. Assumenda, repellendus.
                            <span>Scopri di più</span>
                        </div>
                    </router-link>
                    <router-link class="custom-card custom-card-long" to="/">
                        <div class="custom-card-container">
                            <div class="custom-card-container-image">
                                <span class="placeholder">
                                    <span class="image-text">Dessert</span>
                                </span>
                            </div>
                        </div>
                        <div class="custom-card-texts">
                            Lorem ipsum dolor sit amet consectetur, adipisicing
                            elit. Assumenda, repellendus.
                            <span>Scopri di più</span>
                        </div>
                    </router-link>
                    <router-link class="custom-card" to="/">
                        <div class="custom-card-container">
                            <div class="custom-card-container-image">
                                <span class="placeholder">
                                    <span class="image-text">Dessert</span>
                                </span>
                            </div>
                        </div>
                        <div class="custom-card-texts">
                            Lorem ipsum dolor sit amet consectetur, adipisicing
                            elit. Assumenda, repellendus.
                            <span>Scopri di più</span>
                        </div>
                    </router-link>
                </div>
            </div>
        </section>

        <section class="custom-section colored">
            <div class="custom-section-wrapper">
                <h2>I vostri ristoranti preferiti</h2>
                <ul class="card-list">
                    <li class="custom-card">
                        <a href="#">
                            <div class="custom-card-image-container">
                                <div class="custom-card-image"></div>
                            </div>
                            <h3 class="custom-card-name">Restaurant Name</h3>
                            <p class="custom-card-description"></p>
                        </a>
                    </li>
                    <li class="custom-card">
                        <a href="#">
                            <div class="custom-card-image-container">
                                <div class="custom-card-image"></div>
                            </div>
                            <h3 class="custom-card-name">Restaurant Name</h3>
                            <p class="custom-card-description"></p>
                        </a>
                    </li>
                    <li class="custom-card">
                        <a href="#">
                            <div class="custom-card-image-container">
                                <div class="custom-card-image"></div>
                            </div>
                            <h3 class="custom-card-name">Restaurant Name</h3>
                            <p class="custom-card-description"></p>
                        </a>
                    </li>
                    <li class="custom-card">
                        <a href="#">
                            <div class="custom-card-image-container">
                                <div class="custom-card-image"></div>
                            </div>
                            <h3 class="custom-card-name">Restaurant Name</h3>
                            <p class="custom-card-description"></p>
                        </a>
                    </li>
                </ul>
            </div>
        </section>
    </main>
</template>

<script>
export default {
    name: "Home",
};
</script>

<style lang="scss" scoped>
.custom-section {
    padding: 48px 0 80px;

    &.colored {
        background-color: #eeeeee;
    }

    .custom-section-wrapper {
        margin: 0 auto;
        padding: 0 32px;
        width: calc(100% - (2 * 32px));

        h2 {
            margin: 0;
            font-size: 40px;
            font-weight: 600;
            margin-bottom: 32px;
        }

        .card-wrapper {
            display: flex;
            flex-wrap: wrap;
            margin-left: -32px;

            > .custom-card {
                width: 40%;
                flex-grow: 1;
                cursor: pointer;
                padding-left: 32px;
                color: currentColor;
                margin-bottom: 32px;
                text-decoration: none;

                &.custom-card-long {
                    width: 60%;
                    flex-grow: 1;
                    padding-left: 32px;
                    margin-bottom: 32px;
                }

                .custom-card-container {
                    height: 200px;
                    position: relative;

                    .custom-card-container-image {
                        top: 0;
                        left: 0;
                        width: 100%;
                        height: 100%;
                        position: absolute;

                        .placeholder {
                            width: 100%;
                            height: 100%;
                            display: flex;
                            background: #000;
                            align-items: center;
                            justify-content: center;

                            > .image-text {
                                width: 100%;
                                height: 100%;
                                display: flex;
                                font-weight: 600;
                                font-size: 1.5rem;
                                line-height: 32px;
                                position: absolute;
                                align-items: center;
                                justify-content: center;
                            }
                        }
                    }
                }

                .custom-card-texts {
                    font-size: 16px;
                    margin-top: 8px;
                    line-height: 24px;
                    padding-right: 8%;

                    > span {
                        width: 100%;
                        display: block;
                        margin: 4px 0 0;
                    }
                }
            }
        }

        .card-list {
            margin: 0;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
            margin: 0 0 -32px -32px;

            > .custom-card {
                list-style: none;
                padding-left: 32px;
                padding-bottom: 32px;
                width: calc(100% / 3);

                a {
                    color: currentColor;
                    text-decoration: none;

                    .custom-card-image-container {
                        padding-top: 50%;
                        position: relative;
                        margin-bottom: 8px;

                        .custom-card-image {
                            left: 0;
                            top: 0;
                            width: 100%;
                            height: 100%;
                            position: absolute;
                            background-size: cover;
                            background-color: red;
                        }
                    }

                    .custom-card-name {
                        font-weight: 500;
                        margin-bottom: 4px;
                        font-size: 1.125rem;
                        letter-spacing: 0.02rem;
                    }

                    .custom-card-description {
                        margin: 0;
                        padding: 0;
                        font-size: 16px;
                    }
                }
            }
        }
    }
}

@media screen and (max-width: 768px) {
    .custom-card {
        width: 100% !important;
        flex-grow: 0 !important;
        flex-shrink: 0 !important;

        &.custom-card-long {
            width: 100%;
            flex-grow: 0;
            flex-shrink: 0;
        }
    }
}
</style>
