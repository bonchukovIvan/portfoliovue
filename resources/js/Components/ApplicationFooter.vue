<script>

</script>

<template>
<footer class="pf-footer">
    <div class="container">
        <div class="pf-footer__body">
            <div class="pf-footer__logo">
                <a href="/">
                    <h4>© Bonchukov Ivan {{ new Date().getFullYear() }}</h4>
                </a>
            </div>
        </div>
    </div>
</footer>
</template>

<style lang="scss">
.pf-footer {
    padding: 150px 0;
    border-top: 1px solid #F0BF6C;
    z-index: 999;
    h4 {
        position: relative;
        font-size: 16px;
        color: #fff;
        text-align: center;
    }
    &__body {
        display: flex;
        justify-content: center;
    }
}
</style>