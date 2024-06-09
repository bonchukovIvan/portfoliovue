<template>
  <ApplicationHeader />
  
  <About/>

  <Skills 
  :skills="skills"
  :app_url="app_url"
  />
  
  <section class="pf-section pf-portfolio">
    <div class="container">
      <div class="pf-portfolio__body">

        <div class="pf-title pf-section-title">
          <h2>Portfolio</h2>
        </div>

        <div class="pf-cards pf-portfolio__cards">
          <div class="pf-portfolio__card"        
          v-for="item in portfolio" 
          :key="item.id"
          >
            <div class="pf-portfolio__card-body">
              <div class="pf-portfolio__more">
                <div class="pf-portfolio__title">
                  <h5>{{ item.title }}</h5>
                </div>
                <div class="pf-portfolio__btn">
                  <button @click="openPortfolio(item.id)">More information</button>
                </div>
              </div>
              <div class="pf-portfolio__img">
                <img 
                :src="app_url+item.preview_path"
                :alt="item.title"
                width="150" 
                height="150"
                >
              </div>
            </div>
            <div class="pf-gradient__gray"></div>

            <Modal
            :isOpenModal="isOpenModal" 
            :closeModal="closeModal"
            >
            <div class="pf-gallery">
              <div 
              class="pf-gallery__item" 
              v-for="image in item.images" 
              :key="image.id"
              >
                <img :src="app_url+image.path" alt="" srcset="">
              </div>
            </div>
            </Modal>
          </div>
        </div>

      </div>
    </div>
  </section>

  <Expirience />

  <ApplicationFooter />
</template>

<script setup>
import { ref, defineProps } from 'vue';

import ApplicationHeader from '@/Components/ApplicationHeader.vue';
import Modal from '@/Components/Modal.vue';
import About from './Partials/About.vue';
import Skills from './Partials/Skills.vue';
import Expirience from './Partials/Expirience.vue';


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

<style scoped>
@import '@styles/Components/_header.scss';
</style>
