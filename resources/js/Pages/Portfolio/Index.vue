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

                        <label for="description">Description</label>
                        <textarea id="description" v-model="form.description" />
                        <div class="pf-errors__input" v-if="errors.description">{{ errors.description }}</div>

                        <label for="site_link">Site link(optional)</label>
                        <input type="text" id="site_link" v-model="form.site_link" />
                        <div class="pf-errors__input" v-if="errors.site_link">{{ errors.site_link }}</div>

                        <label for="git_link">Git link(optional)</label>
                        <input type="text" id="git_link" v-model="form.git_link" />
                        <div class="pf-errors__input" v-if="errors.git_link">{{ errors.git_link }}</div>

                        <label for="Image">Images</label>
                        <input 
                        type="file" 
                        accept="image/*"
                        multiple="multiple"
                        @input="form.images=$event.target.files" 
                        @change="onFileChange" 
                        />
                        <div class="pf-errors__input" v-if="errors.images">{{ errors.images }}</div>
                        <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                            {{ form.progress.percentage }}%
                        </progress>
                        <div class="preview" v-if="urls.length">
                            <div v-for="item in urls" class="preview__img-container">
                                <img  :src="item.url" />
                                <button 
                                type="button" 
                                :class="item.is_preview ? 'preview__btn selected' : 'preview__btn'"
                                @click="setPreview(item.name, item.is_preview)"
                                >Set as a preview</button>
                            </div>
                        </div>
                        <pfbutton type="submit">Submit</pfbutton>
                    </form>
                </div>
            </Modal>

        </div>

        <ItemList 
        :items="portfolio_items"
        :editItem="openEditModal"
        :deleteItem="deletePortfolio"
        />

        <Modal 
        :isOpenModal="isEditOpenModal" 
        :closeModal="closeEditModal"
        >
            <div class="pf-create">
                <form @submit.prevent="createSubmit()" class="pf-create__form">
                    <label for="title">Title</label>
                    <input type="text" id="title" v-model="editForm.title" />
                    <div class="pf-errors__input" v-if="errors.title">{{ errors.title }}</div>

                    <label for="description">Description</label>
                    <input type="text" id="description" v-model="editForm.description" />
                    <div class="pf-errors__input" v-if="errors.description">{{ errors.description }}</div>

                    <label for="site_link">Site link(optional)</label>
                    <input type="text" id="site_link" v-model="editForm.site_link" />
                    <div class="pf-errors__input" v-if="errors.site_link">{{ errors.site_link }}</div>

                    <label for="git_link">Git link(optional)</label>
                    <input type="text" id="git_link" v-model="editForm.git_link" />
                    <div class="pf-errors__input" v-if="errors.git_link">{{ errors.git_link }}</div>

                    <label for="Image">Images</label>
                    <input type="file" @input="editForm.images = $event.target.files" multiple="multiple"/>
                    <div class="pf-errors__input" v-if="errors.images">{{ errors.images }}</div>
                    <div class="pf-errors__input" v-if="errors.preview_path">{{ errors.preview_path }}</div>
                    <progress v-if="editForm.progress" :value="editForm.progress.percentage" max="100">
                        {{ editForm.progress.percentage }}%
                    </progress>

                    <pfbutton type="submit">Submit</pfbutton>
                </form>
            </div>
        </Modal>
    </AuthenticatedLayout>
</template>

<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import { ref, defineProps, computed } from 'vue';

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Modal from '@/Components/Modal.vue';
import pfbutton from '@/Components/UI/PfButton.vue';
import ItemList from '@/Components/ItemList.vue';

const props = defineProps({
    portfolio_items: {
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
    images: null,
    preview_path: null,
});

const editForm = useForm({
    id: null,
    title: null,
    description: null,
    site_link: null,
    git_link: null,
    images: null,
    preview_path: null,
});

// computed property to format description with line breaks
const formattedDescription = computed(() => {
    return form.description ? form.description.replace(/\n/g, '<br>') : '';
});

const urls = ref([]);

const isCreateOpenModal = ref(false);

const isEditOpenModal = ref(false);

// submits
function createSubmit() {
  form.post("/dashboard/portfolio", {
    onSuccess: () => {
        form.reset();
        closeCreateModal();
    },
    onError: (e) => {
        console.log(e);
    }
  });
}

const onFileChange = (e) => {
    const files = e.target.files;
    urls.value.length = 0;
    for (const [i, file] of Object.entries(files)) {
        const s_file = {
            name: file.name,
            url: URL.createObjectURL(file),
            is_preview: false,
        }
        urls.value.push(s_file);
    }
}

const setPreview = (name) => {
    urls.value.map(e => {
        if (e.name === name) {
            e.is_preview = true;
        } else {
            e.is_preview = false;
        }
    });
    for (const [i, file] of Object.entries(form.images)) {
        if (file.name === name) {
            form.preview_path = file;
        }
    }
    console.log(form)
}

const deletePortfolio = (id) => {
    form.delete(`portfolio/${id}`);
}

// modal
const openCreateModal = () => {
  isCreateOpenModal.value = true;
}
const closeCreateModal = () => {
  isCreateOpenModal.value = false;
  form.reset();
  urls.value = [];
}

// edit modal
const closeEditModal = () => {
  isEditOpenModal.value = false;
}
const openEditModal = (id) => {
  isEditOpenModal.value = true;
  editItem(id);
}
const editItem = (id) => {
    const item = props.portfolio_items.find(item => item.id === id);
    if (item) {
        editForm.title = item.title;
        editForm.description = item.description;
        editForm.git_link = item.git_link;
        editForm.site_link = item.site_link;
        editForm.images = item.images;
        openEditModal();
    }
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
    .pf-errors {
        &__input {
            background-color: #F74949;
            color: #fff;
            border-radius: 6px;
            padding: 5px;
        }
    }
    .preview {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        border: 2px solid #dbdbdb;
        border-radius: 5px;
        gap: 15px;
        padding: 10px;
        &__img-container {
            position: relative;
            width: 100px;
            height: 100px;
            flex: 33%;
            border: 1px solid #e7e7e7;
            border-radius: 2px;
            img {
                min-width: 100%;
                max-height: 100%;
                object-fit: contain;
            }
        }
        &__btn {
            position: absolute;
            top: 0;
            right: 0;
            padding: 10px;
            background-color: #dbdbdba2;
            &.selected {
                background-color: #83da49a2;
            }
        }
    }
</style>