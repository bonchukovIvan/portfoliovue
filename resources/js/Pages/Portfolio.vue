<template>
    <ApplicationHeader />

    <section class="pf-section pf-portfolio">
        <div class="container">
            <div class="pf-portfolio__body">

                <BorderHeader>{{ portfolio.title }}</BorderHeader>
                <div class="pf-portfolio__preview">

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

                <div class="pf-portfolio__gallery">
                    <h2>
                        Screenshots
                    </h2>
                    <swiper
                        :slides-per-view="1"
                        :space-between="50"
                        navigation
                        :pagination="true"
                        :scrollbar="{ draggable: true }"
                        :modules="[Pagination, Navigation]"
                        @swiper="onSwiper"
                        @slideChange="onSlideChange"
                    >
                        <swiper-slide v-for="item in portfolio.images">
                            <img :src="app_url+item.path" alt="">
                        </swiper-slide>
                    </swiper>
                </div>
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
            </div>
        </div>
    </section>

    <ApplicationFooter />
</template>
  
<script setup>
import { ref, defineProps } from 'vue';
import { Swiper, SwiperSlide } from 'swiper/vue';
import { Navigation, Pagination, Scrollbar, EffectFade } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/bundle';

import ApplicationHeader from '@/Components/ApplicationHeader.vue';
import ApplicationFooter from '@/Components/ApplicationFooter.vue';
import BorderHeader from '@/Components/BorderHeader.vue';

const app_url = import.meta.env.VITE_APP_URL;
const isOpenModal = ref(false);
defineProps({
    portfolio: {
        type: Array,
        default: () => [],
    }
});
const onSwiper = (swiper) => {
        console.log(swiper);
      };
const onSlideChange = () => {
    console.log('slide change');
};
</script>

<style lang="scss" scoped>
.pf-portfolio {
    &__body {
        gap: 100px;
    }
    &__gallery {
        background-color: #F0BF6C;
        border-radius: 20px;
        padding: 25px;
        font-size: 24px;
        text-transform: uppercase;
        img {
            height: 100%;
            width: 100%;
            margin: 25px 0px;
            border-radius: 13px;
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
        border-radius: 20px;
        position: relative;
        max-height: 500px;
        img {
            border-radius: 20px;
            object-fit: cover;
            max-height: 500px;
            max-width: 100%;
        }
    }
    &__links {
        display: flex;
        flex-direction: column;
        gap: 25px;
        font-size: 20px;
        a {
            width: 100%;
        }
        div {
            transition: 0.3s all;
            background-color: #fafafa;
            color: #0c0c0c;
            border-radius: 10px;
            padding: 15px;
            display: flex;
            align-items: center;
            gap: 25px;
            justify-content: center;
            text-align: center;
            font-size: 30px;
            font-weight: bold;
            > div {
                transition: 0.3s all;
                height: 75px;
                img {
                    height: 100%;
                    width: 100%;
                    object-fit: contain;
                }
            }
        }
        div:hover{
            background-color: #949494;
            > div {
                background-color: #949494;
            }
        }

    }
}
.pf-gradient__gray {
    &--single {
        border-radius: 20px;
        display: block;
        width: 100%;
        height: 100%;
        background-color: #0000008a;
        position: absolute;
        left: 0;
        top: 0;
        transition: 0.3s all;
        opacity: 100%;
    }
}
</style>
  