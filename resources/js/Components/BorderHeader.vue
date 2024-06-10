<template>
    <div class="pf-title pf-section-title">
        <h2>
            <slot />
        </h2>
    </div>
</template>

<style lang="scss" scoped>
.pf-title {
    h2 {
        color: #f7f7f7;
        font-size: 48px;
        font-weight: bold;
        border-left: 3px solid #F0BF6C;
        padding-left: 10px;
    }
}
</style>