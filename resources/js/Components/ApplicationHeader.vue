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
.pf-header {
    position: fixed;
    background-color: #202124;
    color: #f7f7f7;
    border-bottom: 1px solid #f7f7f7;
    width: 100%;
    z-index: 999;
    &__body {
        display: flex;
        justify-content: space-between;
        padding: 25px 0;
    }
    &__logo {
        display: flex;
        align-items: center;
        h2 {
            font-size: 24px;
            font-weight: bold;
        }
    }
    &__menu {
        display: flex;
        align-items: center;
        ul {
            display: flex;
            gap: 50px;
            li {
                text-align: center;
                font-weight: bold;
            }
            li:hover a {
                border-bottom: 3px solid #F0BF6C;
            }
        }
    }
}
@media screen and (max-width: 979px) {
    .pf-header {
        &__menu {
            display: none;
        }
    }
}
</style>