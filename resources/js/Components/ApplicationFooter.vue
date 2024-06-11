<script>

</script>

<template>
<footer class="pf-footer">
    <div class="container">
        <div class="pf-footer__body">
            <div class="pf-footer__logo">
                <a href="/">
                    <h4>Made by me, <br>using Laravel+Vue3<br>❤</h4>
                </a>
            </div>
        </div>
    </div>
</footer>
</template>

<style lang="scss">
.pf-footer {
    padding: 50px 0;
    border-top: 1px solid #F0BF6C;
    z-index: 999;
    h4 {
        position: relative;
        font-size: 24px;
        color: #fff;
        font-weight: bold;
        text-align: center;
    }
    &__body {
        display: flex;
        justify-content: center;
    }
}
</style>