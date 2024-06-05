<template>
    <Head title="Skills" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Skills</h2>
        </template>
        <div class="pf-create__section">
            <pfbutton @click="openCreateModal" class="pf-btn__create">Add new skill</pfbutton>
        </div>
        

        <div class="container">
            <Modal 
            :isOpenModal="isCreateOpenModal" 
            :closeModal="closeCreateModal">
                <div class="pf-create">
                    <form @submit.prevent="submit" class="pf-create__form">
                        <label for="title">Title</label>
                        <input type="text" id="title" v-model="form.title" />
                        <div class="pf-errors__input" v-if="errors.title">{{ errors.title }}</div>
                        <label for="title">Link</label>
                        <input type="text" id="title" v-model="form.slink" />
                        <div class="pf-errors__input" v-if="errors.slink">{{ errors.slink }}</div>
                        <label for="Image">Image</label>
                        <input type="file" @input="form.image = $event.target.files[0]" />
                        <div class="pf-errors__input" v-if="errors.image">{{ errors.image }}</div>
                        <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                            {{ form.progress.percentage }}%
                        </progress>
                        <pfbutton type="submit" >Submit</pfbutton>
                    </form>
                </div>
            </Modal>

            <ItemList 
            :items="skills"
            :editItem="openEditModal"
            :deleteItem="deleteSkill"
            />
            
            <Modal 
            :isOpenModal="isEditOpenModal" 
            :closeModal="closeEditModal">
                <div class="pf-create">
                    <form @submit.prevent="submitEdit" class="pf-create__form">
                        <label for="title">Title3</label>
                        <input type="text" id="title" v-model="editForm.title" />
                        <div class="pf-errors__input" v-if="errors.title">{{ errors.title }}</div>
                        <label for="title">Link</label>
                        <input type="text" id="title" v-model="editForm.slink" />
                        <div class="pf-errors__input" v-if="errors.slink">{{ errors.slink }}</div>
                        <label for="Image">Image</label>
                        <input type="file" @input="editForm.image = $event.target.files[0]" />
                        <div class="pf-errors__input" v-if="errors.image">{{ errors.image }}</div>
                        <progress v-if="editForm.progress" :value="editForm.progress.percentage" max="100">
                            {{ editForm.progress.percentage }}%
                        </progress>
                        <pfbutton type="submit">Update</pfbutton>
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
import ItemList from '@/Components/ItemList.vue';
import Modal from '@/Components/Modal.vue';
import pfbutton from '@/Components/UI/PfButton.vue';

const props = defineProps({
    skills: {
        type: Array,
        default: () => [],
    },
    errors: Object,
});
const isCreateOpenModal = ref(false);
const isEditOpenModal = ref(false);

const openCreateModal = () => {
  isCreateOpenModal.value = true;
}
const closeCreateModal = () => {
  isCreateOpenModal.value = false;
}

const closeEditModal = () => {
  isEditOpenModal.value = false;
}
const openEditModal = (id, skills) => {
  isEditOpenModal.value = true;
  editSkill(id);
}

const form = useForm({
    id: null,
    title: null,
    slink: null,
    image: null,
});
const editForm = useForm({
    id: null,
    title: null,
    slink: null,
    image: null,
});
function submit() {
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
function submitEdit() {
    const formData = new FormData();
    formData.append('title', editForm.title);
    formData.append('slink', editForm.slink);
    if (editForm.image instanceof File) {
        formData.append('image', editForm.image);
    }
    editForm.post(`skills/${editForm.id}`, {
        data: formData,
        onSuccess: () => {
            editForm.reset();
            closeEditModal();
        }
    });
};
const deleteSkill = (id) => {
    form.delete(`skills/${id}`);
};
const editSkill = (id) => {
    const skill = props.skills.find(item => item.id === id);
    editForm.id = skill.id;
    editForm.title = skill.title;
    editForm.slink = skill.slink;
    editForm.image = skill.image;
    openEditModal();
};
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
    .pf-errors {
        &__input {
            background-color: #F74949;
            color: #fff;
            border-radius: 6px;
            padding: 5px;
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
