<script lang="ts" setup>
const props = defineProps({
    label: {
        type: String,
        default() {
            return '';
        },
    },
    options: {
        type: Array,
        required: true,
    },
    modelValue: {
        type: Object,
        required: true,
    },
});

const emit = defineEmits(['update:modelValue']);

const value = computed({
    get() {
        return props.modelValue;
    },
    set(value) {
        emit('update:modelValue', value);
    },
});

const { uid } = getCurrentInstance();
const search = ref('');
const optionsList = computed(() => props.options?.filter((item) => item.infotext.includes(search.value)));

const isExpanded = ref(false);
const select = (item) => {
    value.value = item;
    isExpanded.value = false;
    search.value = '';
};
</script>
<template>
    <div class="select">
        <label :for="uid" class="select-label">{{ label }}</label>
        <div class="select-container" @blur="isExpanded = false">
            <input
                type="text"
                :id="uid"
                class="select-search"
                :placeholder="value.infotext"
                v-model="search"
                @focus="isExpanded = true"
            />
            <svg class="icons icons_arrow select-searchArrow" :class="{ 'select-searchArrow_expanded': isExpanded }">
                <use xlink:href="/public/icons.svg#arrow"></use>
            </svg>
            <ul class="select-list" :class="{ 'select-list_expanded': isExpanded }">
                <li v-for="(option, index) in optionsList" :key="index" @click="select(option)" class="select-item">
                    {{ option.infotext }}
                </li>
            </ul>
        </div>
    </div>
</template>
<style lang="scss">
.select {
    @apply flex flex-col;
    &-container {
        @apply relative;
    }
    &-search {
        @apply block w-full px-2 py-1 bg-background outline-none border border-blue border-solid;
        &Arrow {
            @apply absolute fill-blue right-2 top-[7px] transition-all duration-500;
            &_expanded {
                @apply -rotate-180;
            }
        }
    }
    &-list {
        @apply hidden absolute left-0 top-[34px] w-full bg-background transition-all duration-500;
        @apply border-r border-b border-l border-blue border-solid;
        &_expanded {
            @apply block;
        }
    }
    &-item {
        @apply block cursor-pointer px-3 py-1;
        &:hover {
            @apply text-yellow;
        }
    }
}
</style>
