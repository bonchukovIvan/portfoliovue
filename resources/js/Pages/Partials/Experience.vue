<template>
    <section class="pf-experience pf-section">
        <div class="container">
            <div class="pf-experience__body">
        
                <BorderHeader>Experience</BorderHeader>

                <div class="pf-experience__item">
                    <div class="pf-experience__item-title">
                        <h3>Center for web-development SumDU</h3>
                    </div>
                    <div class="pf-experience__project">
                            <div class="pf-experience__project-item">
                                <h4>Main project:</h4>
                                <p>SumDu Monitoring System, wordpress-based services for checking information about SumDU sites network. Developed from scratch</p>
                            </div>
                            <div class="pf-experience__project-item">
                                <h4>Work responsibilities:</h4>
                                <p>Developing WordPress and Joomla plugins to gather
                                    information about websites. Also, developing a WordPress service that retrieves and
                                    manages information from sites, such as details about their latest posts, menu
                                    items, etc.
                                </p>
                            </div>
                            <div class="pf-experience__project-item">
                                <h4>Technologies:</h4>
                                <p>PHP-curl, WordPress, Joomla, ACF, HTML/SCSS/jQuery, Docker+WSL, GIT.</p>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import BorderHeader from '@/Components/BorderHeader.vue';
</script>

<style lang="scss">
.pf-experience {
    background-color: rgb(238, 238, 238);
    h2 {
        color: black!important;
    }
    &__body {
        display: flex;
        flex-direction: column;
        gap: 50px;
    }
    &__item {
        box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        padding: 25px;
        &-title {
            font-weight: bold;
            font-size: 28px;
        }
    }
    &__project {
        display: flex;
        flex-direction: column;
        gap: 25px;
        &-item {
            h4 {
                font-weight: bold;
            }
        }
    }
}
</style>