<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import FormModal from '@/Components/FormModal.vue';
import ItemList from '@/Components/ItemList.vue';
import ItemForm from '@/Components/ItemForm.vue';
import pfbutton from '@/Components/UI/PfButton.vue';
import { Head, useForm } from '@inertiajs/vue3';

const props = defineProps({
    skills: {
        type: Array,
        default: () => [],
    },
    errors: Object,
    editErrors: Object,

});

const form = useForm({
    id: null,
    title: null,
    image: null,
});
const editForm = useForm({
    id: null,
    title: null,
    image: null,
});

function submit() {
  form.post("/dashboard/skills", {
    onSuccess: () => {
        form.reset();
    },
    onError: (e) => {
        console.log(e);
    }
  });
};
function submitEdit() {
    const formData = new FormData();
    formData.append('title', editForm.title);
    if (editForm.image instanceof File) {
        formData.append('image', editForm.image);
    }
    editForm.post(`skills/${editForm.id}`, {
        data: formData,
        onSuccess: () => {
            editForm.reset();
        }
    });
};
const deleteSkill = (id) => {
    form.delete(`skills/${id}`);
};
const editSkill = (id, skills) => {
    const skill = skills.find(item => item.id === id);
    editForm.id = skill.id;
    editForm.title = skill.title;
    editForm.image = skill.image;
};

const openModal = ()  => {
    isModalVisible = true;
};
const closeModal = () => {
    isModalVisible = false;
};

</script>

<template>
    <Head title="Skills" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Skills</h2>
        </template>
        <div class="container">

            <div class="pf-create">
                <form @submit.prevent="submit" class="pf-create__form">
                    <label for="title">Title</label>
                    <input type="text" id="title" v-model="form.title" />
                    <div class="pf-errors__input" v-if="errors.title">{{ errors.title }}</div>
                    <label for="Image">Image</label>
                    <input type="file" @input="form.image = $event.target.files[0]" />
                    <div class="pf-errors__input" v-if="errors.image">{{ errors.image }}</div>
                    <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                        {{ form.progress.percentage }}%
                    </progress>
                    <pfbutton type="submit" >Submit</pfbutton>
                </form>
            </div>

            <ItemList :items="skills"/>

            <div class="pf-create">
                <form @submit.prevent="submitEdit" class="pf-create__form">
                    <label for="title">Title</label>
                    <input type="text" id="title" v-model="editForm.title" />
                    <div class="pf-errors__input" v-if="errors.title">{{ errors.title }}</div>
                    <label for="Image">Image</label>
                    <input type="file" @input="editForm.image = $event.target.files[0]" />
                    <div class="pf-errors__input" v-if="errors.image">{{ errors.image }}</div>
                    <progress v-if="editForm.progress" :value="editForm.progress.percentage" max="100">
                        {{ editForm.progress.percentage }}%
                    </progress>
                    <pfbutton type="submit">Update</pfbutton>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style lang="scss">
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
