<script setup>
    defineProps({
        shortLinks: {
            type: Array,
        },
    });
    const getLinkByCode = (code) => {
        return window.location.origin + '/' + code;
    };
</script>

<template>
    <ul v-if="shortLinks.length > 0">
        <li v-for="shortLink in shortLinks">
            <a :href="getLinkByCode(shortLink.short_code)" target="_blank"
               class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5
                    text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700
                    focus:border-gray-300 transition duration-150 ease-in-out">
                {{ getLinkByCode(shortLink.short_code) }}
            </a>
        </li>
    </ul>
</template>
