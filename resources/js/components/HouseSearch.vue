<script setup>
    import axios from 'axios';
    import { onMounted, ref } from 'vue';
    import HouseSearchFilter from '@/components/HouseSearch/Filter.vue';
    import HouseSearchList from '@/components/HouseSearch/List.vue';

    defineProps({
        filter: {
            type: Object,
        },
    });

    const params = {
        name: '',
        bedrooms: '',
        bathrooms: '',
        storeys: '',
        garages: '',
        price_from: '',
        price_to: '',
    }

    const houses = ref([]);
    const loading = ref(false);
    const message = ref('');

    const loadHouses = () => {
        loading.value = true;
        message.value = '';
        axios.get(
            '/api/houses',
            {
                params: params
            }
        )
        .then(
            response => {
                houses.value = response.data;
                loading.value = false;
            }
        )
        .catch(
            error => {
                if (error.response?.data?.message) {
                    message.value = error.response.data.message;
                }
                loading.value = false;
            }
        );
    };

    onMounted(() => {
        loadHouses();
    });
</script>

<template>
    <HouseSearchFilter :filter="params" :message="message" @loadHouses="loadHouses"/>
    <HouseSearchList :houses="houses" />

    <div class="spinner" v-show="loading"></div>
    <div id="overlay" v-show="loading"></div>
</template>

<style>
    @keyframes spinner {
        to {transform: rotate(360deg);}
    }
    .spinner:before {
        content: '';
        box-sizing: border-box;
        position: absolute;
        top: 50%;
        left: 50%;
        width: 50px;
        height: 50px;
        margin-top: -10px;
        margin-left: -10px;
        border-radius: 50%;
        border: 2px solid #ccc;
        border-top-color: #000;
        animation: spinner .6s linear infinite;
    }
    #overlay{
        position: absolute;
        top:0px;
        left:0px;
        width: 100%;
        height: 100%;
        background: black;
        opacity: .5;
    }
</style>
