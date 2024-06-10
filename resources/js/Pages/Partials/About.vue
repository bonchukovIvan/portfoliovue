<template>
  <section class="pf-section pf-about">
    <div class="container">
      <div class="pf-about__body">
        
        <BorderHeader>About</BorderHeader>

        <div class="pf-about__text">
          <div class="pf-about__v-line"></div>
          <p>
            wassup :^)<br>
            I`m passionate PHP developer with 1 years of experience. Passionate about
            creating responsive and visually appealing web interfaces. Looking for
            opportunities to collaborate with skilled teams to deliver exceptional user
            experiences.
          </p>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import BorderHeader from '@/Components/BorderHeader.vue';

</script>

<style lang="scss" scoped>
.pf-about {
    &__body {
        display: flex;
        flex-direction: column;
        gap: 50px;
    }
    font-size: 20px;
    &__text {
        color: #f7f7f7;
        display: flex;
        justify-content: center;
        p {
            max-width: 750px;
            text-align: justify;
        }
    }
    &__v-line {
        height: 3px;
        background-color: #F0BF6C;
        position: relative;
        top: 15px;
        right: 10px;
        min-width: 100px;
    }
}
</style>