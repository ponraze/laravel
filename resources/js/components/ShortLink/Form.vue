<script setup>
    import axios from 'axios';
    import { ref } from 'vue';

    defineEmits(['submitLink'])

    const link = ref('');
    const message = ref('')

    const submitLink = () => {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        axios.post(
            '/api/short-links',
            {
                link: link.value
            },
            {
                headers: { 'X-CSRF-TOKEN': csrfToken }
            }
        ).then(
            response => {
                link.value = '';
                message.value = '';
                $emit('loadShortLinks')
            }
        ).catch(
            error => {
                if (error.response?.data?.message) {
                    message.value = error.response.data.message;
                }
            }
        );
    };
</script>

<template>
    <div class="form">
        <div>
            <label for="link" class="block font-medium text-sm text-gray-700">Full Link</label>
            <input id="link" name="link" type="text" class="block mt-1 w-full"
                   v-model="link"
                   v-on:keyup.enter="submitLink"
            />
        </div>

        <div v-show="message" class="mt-2">
            <p class="text-sm text-red-600">
                {{ message }}
            </p>
        </div>

        <div class="flex items-center justify-end mt-4">
                <button @click="submitLink"
                class="ms-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md
                font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700
                active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2
                transition ease-in-out duration-150">
                Shorten
            </button>
        </div>
    </div>
</template>
