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

        <form @submit.prevent="submit">
            <label for="title">Title</label>
            <input type="text" id="title" v-model="form.title" />
            <label for="Image">Image</label>
            <input type="file" @input="form.image = $event.target.files[0]" />
            <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                {{ form.progress.percentage }}%
            </progress>
            <button type="submit">Submit</button>
        </form>

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Skills</h2>
        </template>

        <tbody>
        <tr v-for="skill in skills" :key="skill.id">
          <td>{{ skill.title }}</td>
          <td>
            <img v-if="skill.image_path" :src="skill.image_path" :alt="skill.title" style="width: 100px; height: auto;">
          </td>
          <td>
            <button @click="deleteSkill(skill.id)">Delete</button>
        </td>
        </tr>
      </tbody>

    </AuthenticatedLayout>
</template>
