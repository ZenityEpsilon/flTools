<script lang="ts" setup>
const props = defineProps({
    active: {
        type: Boolean,
        required: true,
    },
});

const emit = defineEmits(['update:active']);
const active = computed({
    get() {
        return props.active;
    },
    set(value) {
        emit('update:active', value);
    },
});
</script>
<template>
    <div class="popup" v-if="active">
        <div class="popup-faber" @click="active = !active"></div>
        <div class="popup-container">
            <div class="popup-navigation" @click="active = !active">
                <svg class="icons icons_cross popup-cross">
                    <use xlink:href="/public/icons.svg#cross"></use>
                </svg>
            </div>
            <slot></slot>
        </div>
    </div>
</template>
<style lang="scss">
.popup {
    @apply flex justify-center items-center fixed w-full h-full left-0 bottom-0 z-50;
    &-faber {
        @apply absolute bg-black top-0 right-0 bottom-0 left-0 cursor-pointer z-0 opacity-[0.6];
    }
    &-navigation {
        @apply flex absolute top-2 right-2 p-1 cursor-pointer;
    }
    &-cross {
        @apply fill-blue;
    }
    &-container {
        @apply relative bg-background border-2 border-solid border-blue p-8 min-w-[250px] min-h-[100px];
    }
}
</style>
