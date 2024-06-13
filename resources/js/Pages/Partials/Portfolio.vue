<template>
  <section class="pf-section pf-portfolio">
    <div class="container">
      <div class="pf-portfolio__body">
        <BorderHeader>Portfolio</BorderHeader>
        
        <div class="pf-cards pf-portfolio__cards">

          <div 
            class="pf-portfolio__card"        
            v-for="item in portfolio" 
            :key="item.id"
          >
          <a :href="route('home.portfolio', item.id)">
            <div class="pf-portfolio__card-body">
              <div class="pf-portfolio__more">
                <div class="pf-portfolio__title">
                  <h5>{{ item.title }}</h5>
                </div>
              </div>
              <div class="pf-portfolio__img">
                <img 
                  :src="app_url + item.preview_path"
                  :alt="item.title"
                  width="150" 
                  height="150"
                />
              </div>
            </div>
            <div class="pf-gradient__gray"></div>
          </a>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import BorderHeader from '@/Components/BorderHeader.vue';

defineProps({
    portfolio: {
        type: Array,
        default: () => [],
    },
    openPortfolio: Function,
    app_url: String
});
</script>

<style lang="scss" scoped>

.pf-portfolio {
    &__body {
        display: flex;
        flex-direction: column;
        gap: 50px;
    }
    &__cards {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
    }
    &__card {
        position: relative;
    }
    &__card:hover &__more{
        opacity: 100%;
    }
    &__card:hover .pf-gradient__gray {
        display: block;
        opacity: 100%;
    }
    &__more {
        opacity: 0;
        display: flex;
        flex-direction: column;
        gap: 25px;
        position: absolute;
        z-index: 99;
        top: 180px;
        left: 0;
        right: 0;
        margin: auto;
        width: 300px;
        transition: 0.3s all;
    }
    &__title {
        font-weight: bold;
        font-size: 20px;
        text-align: center;
        color: #f7f7f7;
        cursor: default;
    }
    &__btn {
        text-align: center;
    }
    &__img {
        width: 100%;
        height: 400px;
        img {
          object-fit: cover;
          min-width: 100%;
          min-height: 100%;
        }
    }
}
</style>