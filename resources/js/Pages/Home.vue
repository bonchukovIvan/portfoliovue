<template>
  <ApplicationHeader />
  
  <About/>

  <Skills 
  :skills="skills"
  :app_url="app_url"
  />

  <Portfolio 
  :portfolio="portfolio"
  :openPortfolio="openPortfolio"
  :app_url="app_url"
  />
  
  <Expirience />

  <ApplicationFooter />
</template>

<script setup>
import { ref, defineProps } from 'vue';

import ApplicationHeader from '@/Components/ApplicationHeader.vue';
import About from './Partials/About.vue';
import Skills from './Partials/Skills.vue';
import Expirience from './Partials/Experience.vue';
import Portfolio from './Partials/Portfolio.vue';


const app_url = import.meta.env.VITE_APP_URL;
const isOpenModal = ref(false);
defineProps({
    skills: {
        type: Array,
        default: () => [],
    },
    portfolio: {
      type: Array,
      default: () => [],
    }
});
const closeModal = () => {
  isOpenModal.value = false;
}
const openModal = () => {
  isOpenModal.value = true;
}
const openPortfolio = (id) => {
  window.open(`/portfolio/${id}`, '_blank');
}
</script>

<style lang="scss">
@import '@styles/Components/_header.scss';

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
.pf-gradient__gray {
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

</style>
