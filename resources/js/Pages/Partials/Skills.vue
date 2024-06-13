<template>
    <section class="pf-skills pf-section">
        <div class="container">
            <div class="pf-skills__body">
                <BorderHeader>My Skills</BorderHeader>
                <div class="pf-skills__groups">
                    <div 
                    class="pf-skills__group" 
                    v-for="(group, index) in chunkedSkills" 
                    :key="index"
                    >
                        <div 
                        class="pf-skills__card" 
                        v-for="skill in group" 
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
        </div>
    </section>
</template>

<script setup>
import BorderHeader from '@/Components/BorderHeader.vue';
import { computed } from 'vue';

const props = defineProps({
    skills: {
        type: Array,
        default: () => [],
    },
    app_url: {
        type: String,
        required: true,
    },
});

const chunkedSkills = computed(() => {
    const chunkSize = 4;
    const result = [];
    for (let i = 0; i < props.skills.length; i += chunkSize) {
        result.push(props.skills.slice(i, i + chunkSize));
    }
    return result;
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
    &__groups {
        display: flex;
        flex-direction: column;
        gap: 50px;
    }
    &__group {
        display: flex;
        justify-content: center;
        gap: 50px;
    }
    &__card {
        flex: 25%;
        max-width: 25%;
        min-height: 100%;
        overflow: hidden;
        transition: 0.3s all;
        box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px;
        padding: 75px;
        background-color: #e2e0df;

        border-radius: 25px;
        &:hover {
            transform: translateY(-10px);
            background-color: #d3d3d3;
            cursor: pointer;
            color: #080808;
        }
        &-body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 25px;
            font-size: 24px;
        }
        &-img {
            width: 100px;
            height: 100px;
            img {
                min-width: 100%;
                min-height: 100%;
                object-fit: contain;
            }
        }
        &-name {
            text-align: center;
        }
    }
}
</style>