<template>
   <Head title="Portfolio" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Portfolio</h2>
        </template>
        <div class="pf-create__section">
            <pfbutton @click="openCreateModal" class="pf-btn__create">Add new portfolio item</pfbutton>
        </div>
        <div class="container">
            <Modal 
            :isOpenModal="isCreateOpenModal" 
            :closeModal="closeCreateModal"
            >
                <div class="pf-create">
                    <form @submit.prevent="createSubmit()" class="pf-create__form">
                        <label for="title">Title</label>
                        <input type="text" id="title" v-model="form.title" />
                        <div class="pf-errors__input" v-if="errors.title">{{ errors.title }}</div>

                        <label for="description">Link</label>
                        <input type="text" id="description" v-model="form.description" />
                        <div class="pf-errors__input" v-if="errors.description">{{ errors.description }}</div>

                        <label for="site_link">Site link(optional)</label>
                        <input type="text" id="site_link" v-model="form.site_link" />
                        <div class="pf-errors__input" v-if="errors.site_link">{{ errors.site_link }}</div>

                        <label for="git_link">Git link(optional)</label>
                        <input type="text" id="git_link" v-model="form.git_link" />
                        <div class="pf-errors__input" v-if="errors.git_link">{{ errors.git_link }}</div>

                        <label for="Image">Image</label>
                        <input type="file" @input="form.images = $event.target.files" multiple="multiple"/>
                        <div class="pf-errors__input" v-if="errors.image">{{ errors.image }}</div>
                        <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                            {{ form.progress.percentage }}%
                        </progress>

                        <pfbutton type="submit">Submit</pfbutton>
                    </form>
                </div>
            </Modal>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import { ref, defineProps } from 'vue';

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Modal from '@/Components/Modal.vue';
import pfbutton from '@/Components/UI/PfButton.vue';

const props = defineProps({
    items: {
        type: Array,
        default: () => [],
    },
    errors: Object,
});
const form = useForm({
    id: null,
    title: null,
    description: null,
    site_link: null,
    git_link: null,
});

function createSubmit() {
  form.post("/dashboard/skills", {
    onSuccess: () => {
        form.reset();
        closeCreateModal();
    },
    onError: (e) => {
        console.log(e);
    }
  });
};

// modal
const isCreateOpenModal = ref(false);
const isEditOpenModal = ref(false);

const openCreateModal = () => {
  isCreateOpenModal.value = true;
}
const closeCreateModal = () => {
  isCreateOpenModal.value = false;
}

</script>

<style lang="scss">
    .pf-create__section {
        display: flex;
        padding: 25px;
        justify-content: center;
    }
    .pf-btn__create {
        padding: 10px;
        background-color: #fff;
        transition: 0.3s all;
        &:hover {
            background-color: #e7e7e7;
        }
    }
    .pf-create {
        padding: 50px;
        max-width: 750px;
        margin: 50px auto;
        background-color: #fff;
        border-radius: 17px;
        border: 1px solid #e7e7e7;
        &__form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
    }
    input[type=file] {
        border-radius: 6px;
    }
</style>