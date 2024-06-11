<template>
    <ApplicationHeader />
    <section class="pf-contacts pf-section">
        <div class="container">
            <div class="pf-contacts__body">
                <BorderHeader>Contact Me</BorderHeader>
                <div class="pf-contacts__avatar-wrap">
                    <div class="pf-contacts__avatar">
                        <img src="/av.jpg" alt="">
                    </div>
                    <h1>Bonchukov Ivan</h1>
                    <h2>Junior web developer</h2>
                    <div class="hr-orange hr-left"></div>
                    <div class="hr-orange hr-right"></div>
                </div>

                <div class="pf-contacts__info">
                    <a href="mailto:bonchukooov@gmail.com">
                        <div class="pf-contacts__item">
                            <div class="pf-contacts__img">
                                <img src="/mail.png" alt="">
                            </div>
                            <p>bonchukooov@gmail.com</p>
                        </div>
                    </a>
                    <a href="mailto:bonchukooov@gmail.com">
                        <div class="pf-contacts__item">
                            <div class="pf-contacts__img">
                                <img src="/phone.webp" alt="">
                            </div>
                            <p>+380950277946</p>
                        </div>
                    </a>
                    <a href="mailto:bonchukooov@gmail.com">
                        <div class="pf-contacts__item">
                            <div class="pf-contacts__img">
                                <img src="/telegram.webp" alt="">
                            </div>
                            <p>@bonchukov</p>
                        </div>
                    </a>
                    <a href="mailto:bonchukooov@gmail.com">
                        <div class="pf-contacts__item">
                            <div class="pf-contacts__img">
                                <img src="/telegram.webp" alt="">
                            </div>
                            <p>@bonchukov</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <ApplicationFooter />
</template>
  
<script setup>
import ApplicationHeader from '@/Components/ApplicationHeader.vue';
import ApplicationFooter from '@/Components/ApplicationFooter.vue';
import BorderHeader from '@/Components/BorderHeader.vue';

</script>

<style lang="scss" scoped>
.hr {
    &-orange {
        position: absolute;
        background-color: #FFD871;
        height: 2px;
        width: 450px;
        top: 450px;
        z-index: 998;
        box-shadow: rgba(255, 222, 32, 0.25) 0px 0px 13px 3px, rgb(187 134 2 / 30%) -1px -2px 60px 20px;
    }
    &-left {
        left: 0;
    }
    &-right {
        right: 0;
    }
    &-back {
        position: absolute;
        width: 100%;
        height: 50%;
        background-color: #3f3e3c;
        bottom: 160px;
        left: 0;
        z-index: 9;
    }
}
.pf-contacts {
    &__body {
        padding-top: 50px;

    }
    background-color: #3D3E42;
    &__info {
        position: relative;
        display: flex;
        flex-wrap: wrap;
        gap: 25px;
        margin: 50px 0;
        > a {
            flex: 27%;
        }
        z-index: 90;
    }
    &__item {
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 20px;
        gap: 10px;
        background-color: #31333B;
        padding: 25px;
        transition: 0.3s all;
        p {
            color: #FFD871;
            font-weight: bold;
            letter-spacing: 1px;
        }
        &:hover {
            background-color: #23252b;
        }
    }
    &__img {
        height: 50px;
        width: 50px;
        img {
            height: 100%;
            width: 100%;
        }
    }
    &__avatar {
        z-index: 90;
        &-wrap {
            display: flex;
            flex-direction: column;
            gap: 15px;
            > * {
                text-align: center;
                color: #fff;
                font-weight: bold;
            }
            
            h1 {
                font-size: 48px;
                z-index: 90;
            }
            h2 {
                font-size: 28px;
                z-index: 90;
            }
        }
        margin: auto;
        height: 250px;
        width: 250px;
        img {
            height: 100%;
            width: 100%;
            border-radius: 50%;
        }
    }
}
</style>
  