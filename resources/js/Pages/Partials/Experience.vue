<template>
    <section class="pf-experience pf-section">
        <div class="container">
            <div class="pf-experience__body">
        
                <BorderHeader>Experience</BorderHeader>
                <div class="pf-experience__wrap">
                    <div class="pf-experience__item">
                        <div class="pf-experience__item-title">
                            <h3>Center for web-development SumDU</h3>
                            <h4>June 2023 - now</h4>
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
                    <div class="pf-experience__img">
                        <img src="/sumdu.png" alt="" srcset="">
                    </div>
                </div>

            </div>
        </div>
        <div class="pf-experience__back">

        </div>
    </section>
</template>

<script setup>
import BorderHeader from '@/Components/BorderHeader.vue';
</script>

<style lang="scss">
.pf-experience {
    position: relative;
    &__back {
        position: absolute;
        top: 0;
        left: 0;
        width: 45%;
        height: 85%;
        background-color: rgb(233 233 233);
        z-index: 9;
        border-radius: 0 0 25px 0;
    }
    background-color: rgb(238, 238, 238);
    h2 {
        color: black!important;
    }
    &__body {
        position: relative;
        z-index: 200;
        display: flex;
        flex-direction: column;
        gap: 50px;
    }
    &__wrap {
        display: flex;
        justify-content: space-between;
    }
    &__item {
        text-align: justify;
        position: relative;
        max-width: 750px;
        &-title {
            font-weight: bold;
            font-size: 28px;
            display: flex;
            flex-direction: column;
            gap: 5px;
            margin-bottom: 15px;
            h4 {
                font-size: 16px;
                
            }
        }
    }
    &__img {
            max-width: 450px;
            max-height: 450px;
            img {
                object-fit: contain;
                width: 100%;
                height: 100%;
            }
        }
    &__project {
        display: flex;
        flex-direction: column;
        gap: 25px;
        position: relative;
        &-item {
            h4 {
                font-weight: bold;
            }
        }
    }
}
</style>