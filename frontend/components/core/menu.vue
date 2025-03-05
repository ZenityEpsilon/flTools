<script lang="ts" setup></script>
<template>
    <div class="menu">
        <div class="menu-container">
            <svg class="icons icons_menu menu-icon">
                <use xlink:href="/public/icons.svg#menuAngel"></use>
            </svg>
            <ul class="menu-list">
                <li class="menu-listItem">Main</li>
                <li class="menu-listItem">POBs list</li>
                <li class="menu-listItem">My pob</li>
            </ul>
            <svg class="icons icons_menu menu-icon menu-icon_reverse">
                <use xlink:href="/public/icons.svg#menuAngel"></use>
            </svg>
        </div>
    </div>
</template>
<style lang="scss">
.menu {
    @apply relative;
    &-container {
        @apply flex absolute w-auto left-1/2 -translate-x-1/2;
    }
    &-list {
        @apply flex;
        background-color: #382e5e;
        color: #87c2e0;
        border-bottom: 1px solid #7ca0c2;
        &Item {
            @apply uppercase;
            padding: 5px;
            &:hover {
                color: #ffff00;
            }
        }
    }
    &-icon {
        @apply absolute -left-[16px];
        &_reverse {
            @apply left-auto -right-[16px];
            transform: scaleX(-1);
        }
    }
}
</style>
