<script setup>
    import { onMounted, ref } from 'vue';
    import ShortLinkList from '@/components/ShortLink/List.vue';
    import ShortLinkForm from '@/components/ShortLink/Form.vue';

    const shortLinks = ref([]);

    const loadShortLinks = () => {
        axios.get('/api/short-links')
            .then(response => shortLinks.value = response.data);
    };

    onMounted(() => {
        loadShortLinks();
    });
</script>

<template>
    <ShortLinkForm @loadShortLinks="loadShortLinks"/>
    <ShortLinkList :shortLinks="shortLinks" />
</template>
