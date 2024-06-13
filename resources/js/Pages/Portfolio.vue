<template>
    <ApplicationHeader />

    <section class="pf-section pf-portfolio">
        <div class="container">
            <div class="pf-portfolio__body">

                <BorderHeader>{{ portfolio.title }}</BorderHeader>

                <div class="pf-portfolio__preview">
                    <div class="pf-portfolio__links">
                        <a 
                            v-if="portfolio.site_link"
                            :href="portfolio.site_link" 
                            target="_blank"
                        >
                            <div class="pf-portfolio__links-site">
                                <div>
                                    <img src="/hp.webp" alt="">
                                </div>
                            </div>
                        </a>
                        <a 
                            v-if="portfolio.git_link"
                            :href="portfolio.git_link" 
                            target="_blank"
                        >
                            <div class="pf-portfolio__links-git">
                                <div>
                                    <img src="/github.png" alt="">
                                </div>
                                
                            </div>
                        </a>
                    </div>
                    <div class="pf-gradient__gray--single"></div>
                    <div class="pf-portfolio__img">
                        <img 
                            :src="app_url+portfolio.preview_path" 
                            :alt="portfolio.title"
                        >
                    </div>
                </div>
                <div class="pf-portfolio__description">
                    <p>
                        {{ portfolio.description }}
                    </p>
                </div>
            </div>
        </div>

        <div class="pf-portfolio__gallery">
            <div class="pf-portfolio__title-wrap">
                <h2>
                    Screenshots
                </h2>
            </div>
            <carousel :autoplay="3000" :items-to-show="1"  :wrap-around="true" :transition="450">
                <slide v-for="image in portfolio.images" :key="image">
                    <div class="carousel__item"><img :src="app_url+image.path" alt=""></div>
                </slide>
                <template #addons>
                    <navigation />
                    <pagination />
                </template>
            </carousel>
        </div>

    </section>
    <ApplicationFooter />
</template>
  
<script setup>
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel'
import 'vue3-carousel/dist/carousel.css'

import ApplicationHeader from '@/Components/ApplicationHeader.vue';
import ApplicationFooter from '@/Components/ApplicationFooter.vue';
import BorderHeader from '@/Components/BorderHeader.vue';

const app_url = import.meta.env.VITE_APP_URL;
defineProps({
    portfolio: {
        type: Array,
        default: () => [],
    }
});
</script>

<style lang="scss" scoped>
.carousel {
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    &__pagination {
        padding: 25px 0;
    }
}
.pf-portfolio {
    background-color: #202124;
    &__body {
        display: flex;
        flex-direction: column;
        gap: 50px;
        padding-top: 50px;
        padding-bottom: 150px;
    }
    h2 {
        margin-bottom: 25px;
    }
    &__gallery {
        background-color: #ffffff;
        padding: 25px;
        font-size: 32px;
        text-transform: uppercase;
        text-align: center;
        .carousel__item {
            height: 650px;
            img {
                padding: 20px;
                height: 100%;
                object-fit: contain;
            }
        }
    }
    &__description {
        color: #f7f7f7;
        font-size: 24px;
        p {
            text-align: justify;
        }
    }
    &__preview {
        box-shadow: rgba(10, 10, 10, 0.2) 0px 7px 29px 0px;
        // border-radius: 20px;
        position: relative;
        max-height: 500px;
        img {
            // border-radius: 20px;
            object-fit: cover;
            max-height: 500px;
            width: 100%;
        }
    }
    &__links {
        position: absolute;
        top: 0;
        left: 0;
        display: flex;
        justify-content: space-around;
        align-items: center;

        z-index: 99;
        width: 100%;
        height: 100%;
        a {
            width: 100%;
            height: 100%;
        }
        div {
            background-color: #20212433;
            display: flex;
            justify-content: space-around;
            align-items: center;
            height: 100%;
            width: 100%;
            transition: 0.3s all;
            &:hover {
                background-color: #202124b6;
            }
            div {
                height: 150px;
                width: 150px;
                padding: 25px;
                border-radius: 13px;
                transition: 0.3s all;
                background-color: transparent;
                border-radius: 50%;
                &:hover {
                    background-color: #f7f7f7;
                    box-shadow: rgba(255, 222, 32, 0.25) 0px 0px 13px 3px, rgb(187 134 2 / 30%) -1px -2px 60px 20px;
                }
                img {
                    height: 100%;
                    width: 100%;
                    object-fit: contain;
                }
            }
        }


    }
}
.pf-gradient__gray {
    &--single {
        // border-radius: 20px;
        display: block;
        width: 100%;
        height: 100%;
        background-color: #00000038;
        position: absolute;
        left: 0;
        top: 0;
        transition: 0.3s all;
        opacity: 100%;
    }
}
</style>
  