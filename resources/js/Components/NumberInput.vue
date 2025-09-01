<script setup>
import { onMounted, ref } from "vue";
const props = defineProps({
    label: {
        type: String,
    },
    age: {
        type: String,
    },
    id: {
        type: String,
    },
    initValue: {
        type: Number,
        default: 0,
    },
});

const myAge = ref(0);

// emit 은 참고만,,
const emit = defineEmits(["updateAge"]);
const updateAge = (value) => {
    myAge.value = myAge.value + value;
    if (myAge.value < 0) {
        myAge.value = 0;
    }
    emit("updateAge", { id: props.id, value: myAge.value });
};
onMounted(() => {
    if (!!props.initValue) {
        myAge.value = props.initValue;
    }
});
</script>
<!-- https://flowbite.com/docs/forms/number-input/ -->
<template>
    <div>
        <label
            :for="id"
            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white"
            >{{ label }}<br /><span class="text-xs text-gray-500">{{
                age
            }}</span></label
        >
        <div class="relative flex items-center">
            <button
                type="button"
                :id="'decrement-button-' + id"
                @click="updateAge(-1)"
                class="flex-shrink-0 bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-md h-5 w-5 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none"
            >
                <svg
                    class="w-2.5 h-2.5 text-gray-900 dark:text-white"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 18 2"
                >
                    <path
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M1 1h16"
                    />
                </svg>
            </button>
            <input
                type="text"
                :id="id"
                :value="myAge"
                class="flex-shrink-0 text-gray-900 dark:text-white border-0 bg-transparent text-sm font-normal focus:outline-none focus:ring-0 max-w-[2.5rem] text-center"
                placeholder=""
                value="0"
                required
            />
            <button
                type="button"
                :id="'increment-button-' + id"
                @click="updateAge(+1)"
                class="flex-shrink-0 bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-md h-5 w-5 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none"
            >
                <svg
                    class="w-2.5 h-2.5 text-gray-900 dark:text-white"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 18 18"
                >
                    <path
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M9 1v16M1 9h16"
                    />
                </svg>
            </button>
        </div>
    </div>
</template>
