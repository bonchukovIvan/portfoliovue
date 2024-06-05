<script setup>
import pfbutton from '@/Components/UI/PfButton.vue';
const props = defineProps({
    items: {
        type: Array,
        required: true,
    },
    errors: Object,
    editErrors: Object,
    deleteItem: Function,
    editItem: Function,
});
const app_url = import.meta.env.VITE_APP_URL;
</script>

<template>
    <div class="pf-items">
        <tbody class="pf-items__list">
            <tr v-for="item in items" :key="item.id">
                <td>{{ item.title }}</td>
                <td>
                    <img v-if="item.image" :src="app_url+item.image" :alt="item.title" style="width: 100px; height: auto;">
                </td>
                <td>
                    <pfbutton @click="editItem(item.id)" class="pf-edit">Edit</pfbutton>
                </td>
                <td>
                    <pfbutton @click="deleteItem(item.id)" class="pf-delete">Delete</pfbutton>
                </td>
            </tr>
        </tbody>
    </div>
</template>

<style lang="scss">
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
                    letter-spacing: 1px;
                    color: #fff;
                    font-weight: bold;
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
