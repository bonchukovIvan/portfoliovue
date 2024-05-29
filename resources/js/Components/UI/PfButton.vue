<template>
    <button>
        <slot></slot>
    </button>
</template>

<style>
    button {
        border-radius: 6px;
    }
    input[type=file] {
        background-color: #F0BF6C;
        padding: 10px;

    }
    button[type=submit] {
        padding: 7px;
        background-color: #3D3E42;
        color: #f7f7f7;
    }
</style>
