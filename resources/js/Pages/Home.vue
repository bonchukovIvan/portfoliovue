<template>
  <ApplicationHeader />

  <About/>
  <div class="container" style="position: relative;">
    <div class="pf__v-line"></div>
  </div>

  <Skills 
  :skills="skills"
  :app_url="app_url"
  />

  <Portfolio 
  :portfolio="portfolio"
  :openPortfolio="openPortfolio"
  :app_url="app_url"
  />
  <div class="container" style="position: relative;">
    <div class="pf__v-line"></div>
  </div>

  <Expirience />

  <ApplicationFooter />
</template>

<script setup>
import { ref, defineProps } from 'vue';

import ApplicationHeader from '@/Components/ApplicationHeader.vue';
import ApplicationFooter from '@/Components/ApplicationFooter.vue';
import About from './Partials/About.vue';
import Skills from './Partials/Skills.vue';
import Expirience from './Partials/Experience.vue';
import Portfolio from './Partials/Portfolio.vue';

const app_url = import.meta.env.VITE_APP_URL;
defineProps({
    skills: {
        type: Array,
        default: () => [],
    },
    portfolio: {
      type: Array,
      default: () => [],
    },
    contacts_url: String,
});

const openPortfolio = (id) => {
  window.open(`/portfolio/${id}`, '_blank');
}
</script>

<style lang="scss">

.pf-cards {
    display: flex;
    flex-direction: column;
    gap: 50px;
    &-group {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 50px;
    }
}
button {
    padding: 10px 25px;
    background-color: #F0BF6C;
    color: #202124;
    font-weight: bold;
    border-radius: 7px;
    &:hover {
        background-color: #bb8830;
    }
}
.pf {
    &-gradient__gray {
        display: block;
        width: 100%;
        height: 100%;
        background-color: #000000d2;
        position: absolute;
        left: 0;
        top: 0;
        transition: 0.3s all;
        opacity: 0;
    }
    &__v-line {
        margin-right: 50px;
        position: absolute;
        top: -150px;
        right: 0;
        width: 4px;
        height: 300px;
        background: rgb(8,8,8);
        background: linear-gradient(0deg, #202124 0%, #202124 50%, rgba(240,191,108,1) 50%, rgba(240,191,108,1) 100%);

        z-index: 99;
        border-radius: 3px;
        &::after {
            position: absolute;
            content: '';
            width: 100%;
            height: 50%; /* Half of the original height */
            top: 0;
            left:0;
            box-shadow: rgba(255, 222, 32, 0.25) 0px 0px 13px 3px, rgb(187 134 2 / 30%) -1px -2px 60px 20px;
            z-index: -1;
        }
    }
}
</style>
