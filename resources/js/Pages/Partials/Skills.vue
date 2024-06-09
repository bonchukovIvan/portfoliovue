<template>
    <section class="pf-section pf-skills">
        <div class="container">
            <div class="pf-skills__body">
                <div class="pf-title pf-section-title">
                    <h2>My Skills</h2>
                </div>
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

defineProps({
    skills: {
        type: Array,
        default: () => [],
    },
    app_url: String
});
</script>