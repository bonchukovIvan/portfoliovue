<template>
    <header class="pf-header">
        <div class="container">
            <div class="pf-header__body">
                <div class="pf-header__logo">
                    <a href="/">
                        <h2>Bonchukov Ivan</h2>
                    </a>
                </div>
                <nav class="pf-header__menu">
                    <ul>
                        <li>
                            <a href="/">Home</a>
                        </li>
                        <li>
                            <a href="#">Projects</a>
                        </li>
                        <li>
                            <a :href="contacts_url">Contacts</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
</template>

<script setup>
const contacts_url = route('home.contacts');
</script>

<style lang="scss">
@import '@styles/Components/_header.scss';
</style>