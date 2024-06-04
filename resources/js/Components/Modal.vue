<template>
<div class="pf-modal" v-if="isOpenModal">
    <div class="pf-modal__content">
        <pfbutton class="pf-modal__close" @click="closeModal">Close</pfbutton>
        <slot/>
    </div>
    <div class="pf-modal__back"  @click="closeModal"></div>
</div>
</template>

<script setup>
import { defineProps } from 'vue';

import pfbutton from '@/Components/UI/PfButton.vue';

const props = defineProps({
  isOpenModal: Boolean,
  closeModal: Function
});
</script>
<style lang="scss" scoped>
    .pf-modal {
        &__back {
            background-color: #000;
            opacity: 40%;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }
        &__content {
            z-index: 50;
            padding: 50px;
            border-radius: 25px;
            background-color: #fff;
            opacity: 100%;
            position: absolute;
            left: 50%;
            top: 50%;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }
    }
</style>