<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { reactive } from "vue";

const form = useForm({
    id: null,
    title: null,
    image: null,
});

function submit() {
  form.post("/dashboard/skills", {
    onSuccess: () => {
        form.reset('title');
        form.reset('image');
    }
  });
};
const deleteSkill = (id) => {
    form.delete(`skills/${id}`);
};
const editSkill = (id) => {
    form.put(`skills/${id}`);
};
defineProps({
    skills: {
        type: Array,
        default: () => [],
    },
});
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
                    <label for="Image">Image</label>
                    <input type="file" @input="form.image = $event.target.files[0]" />
                    <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                        {{ form.progress.percentage }}%
                    </progress>
                    <button type="submit" >Submit</button>
                </form>
            </div>
            <div class="pf-items">
                <tbody class="pf-items__list">
                    <tr v-for="skill in skills" :key="skill.id">
                        <td>{{ skill.title }}</td>
                        <td>
                            <img v-if="skill.image_path" :src="skill.image_path" :alt="skill.title" style="width: 100px; height: auto;">
                        </td>
                        <td>
                            <button @click="editSkill(skill.id)" class="pf-edit">Edit</button>
                        </td>
                        <td>
                            <button @click="deleteSkill(skill.id)" class="pf-delete">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </div>

        </div>

    </AuthenticatedLayout>
</template>

<style lang="scss">
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
            input,
            button {
                border-radius: 6px;
            }
            input[type=file] {
                background-color: #F0BF6C;
                padding: 10px;

            }
            button[type=submit] {
                padding: 7px;
                background-color: #3D3E42;
                color: #f7f7f7;
            }
        }
    }
    .pf-items {
        &__list {
            display: flex;
            flex-direction: column;
            gap: 15px;
            width: 100%;
            tr {
                display: flex;
                justify-content: space-between;
                padding: 15px;
                background-color: #fff;
                border: 1px solid #e7e7e7;
                border-radius: 17px;
                button {
                    padding: 5px;
                    border-radius: 6px;
                }
                button.pf-edit {
                    background-color: #F0BF6C;
                }
                button.pf-delete {
                    background-color: #F74949;
                }
                td {
                    height: 50px;
                    width: 50px;
                    display: flex;
                    justify-content: center;
                    align-items: center
                }
                td img {
                    min-height: 100%;
                    min-width: 100%;
                    object-fit: cover;
                }
            }
        }
        max-width: 750px;
        margin: 50px auto;
    }
</style>
