<script setup>
    defineProps({
        filter: {
            type: Object,
        },
        message: {
            type: String,
        },
    });

    defineEmits(['loadHouses'])
</script>

<template>
    <div class="form border border-gray-400 sm:rounded-lg p-2">
        <h2>Filters</h2>

        <div class="flex items-center text-gray-700 font-medium text-sm" style="flex-wrap: wrap">
            <div class="w-48 ml-3 mr-2 mt-3">
                <label for="name" class="block">Name</label>
                <input id="name" type="text" name="name"
                       v-model="filter.name"
                       v-on:keyup.enter="$emit('loadHouses')"
                       class="mt-1 h-8 w-48" />
            </div>

            <div class="w-16 ml-3 mr-2 mt-3">
                <label for="bedrooms" class="block">Bedrooms</label>
                <input id="bedrooms" type="text" name="bedrooms"
                       v-model="filter.bedrooms"
                       v-on:keyup.enter="$emit('loadHouses')"
                       class="mt-1 h-8 w-16" />
            </div>

            <div class="w-16 ml-3 mr-2 mt-3">
                <label for="bathrooms" class="block">Bathrooms</label>
                <input id="bathrooms" type="text" name="bathrooms"
                       v-model="filter.bathrooms"
                       v-on:keyup.enter="$emit('loadHouses')"
                       class="mt-1 h-8 w-16" />
            </div>

            <div class="w-16 ml-3 mr-2 mt-3">
                <label for="storeys" class="block">Storeys</label>
                <input id="storeys" type="text" name="storeys"
                       v-model="filter.storeys"
                       v-on:keyup.enter="$emit('loadHouses')"
                       class="mt-1 h-8 w-16" />
            </div>

            <div class="w-16 ml-3 mr-2 mt-3">
                <label for="garages" class="block">Garages</label>
                <input id="garages" type="text" name="garages"
                       v-model="filter.garages"
                       v-on:keyup.enter="$emit('loadHouses')"
                       class="mt-1 h-8 w-16" />
            </div>

            <div class="w-20 ml-3 mr-2 mt-3">
                <label for="price_from" class="block">Price from</label>
                <input id="price_from" type="text" name="price_from"
                       v-model="filter.price_from"
                       v-on:keyup.enter="$emit('loadHouses')"
                       class="mt-1 h-8 w-20" />
            </div>

            <div class="w-20 ml-3 mr-2 mt-3">
                <label for="price_to" class="block">Price to</label>
                <input id="price_to" type="text" name="price_to"
                       v-model="filter.price_to"
                       v-on:keyup.enter="$emit('loadHouses')"
                       class="mt-1 h-8 w-20" />
            </div>
        </div>

        <div v-show="message" class="mt-3">
            <p class="text-red-600">
                {{ message }}
            </p>
        </div>

        <div class="flex items-center justify-end mt-3">
            <button @click="$emit('loadHouses')"
                class="ms-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md
                font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700
                active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2
                transition ease-in-out duration-150">
                Apply
            </button>
        </div>
    </div>
</template>
