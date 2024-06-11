<template>
    <section class="pf-skills pf-section">
        <div class="container">
            <div class="pf-skills__body">
                <BorderHeader>My Skills</BorderHeader>
                <div class="pf-skills__cards">
                    <div 
                    class="pf-skills__card" 
                    v-for="skill in skills" 
                    :key="skill.id"
                    >
                        <a :href="skill.slink" target="_blank">
                            <div class="pf-skills__card-body">
                                <div class="pf-skills__card-img">
                                    <img 
                                    v-if="skill.image" 
                                    :src="app_url+skill.image" 
                                    :alt="skill.title"
                                    width="150" 
                                    height="150"
                                    >
                                </div>
                                <div class="pf-skills__card-name">
                                    <h5>{{ skill.title }}</h5>
                                </div>
                            </div>
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
    skills: {
        type: Array,
        default: () => [],
    },
    app_url: String
});
</script>

<style lang="scss">
.pf-skills {
    background-color: rgb(238, 238, 238)!important;
    h2 {
        color: black!important;
    }
    &__body {
        display: flex;
        flex-direction: column;
        gap: 50px;
    }
    &__cards {
        display: flex;
        flex-wrap: wrap;
        gap: 50px;
        &-group {
            display: flex;
            justify-content: center;
            gap: 50px;
        }
    }
    &__card {
        flex: 25%;
        &-body {
            transition: 0.3s all;
            padding: 50px;
            background-color: #3D3E42;
            border-radius: 25px;
            box-shadow: rgba(36, 38, 39, 0.2) 0px 8px 24px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 25px;
            font-size: 24px;
            &:hover {
                background-color: #F0BF6C;
                cursor: pointer;
                color: #f7f7f7;
                font-weight: bold;
            }
        }
        &-img {
            width: 150px;
            height: 150px;
        }
        &-img img {
            min-width: 100%;
            min-height: 100%;
            object-fit: contain;
        }
        &-name {
            text-align: center;
        }
    }
}
</style>