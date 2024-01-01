<script setup>
    defineProps({
        houses: {
            type: Array,
        },
    });

    const getFormattedPrice = (price) => {
        return '$' + price;
    };
</script>

<template>
    <table cellspacing="5" cellpadding="5" class="mt-4" style="display: block; overflow-x: auto; white-space: nowrap;"
           v-if="houses.length > 0">
        <tr>
            <th>Name</th>
            <th>Bedrooms</th>
            <th>Bathrooms</th>
            <th>Storeys</th>
            <th>Garages</th>
            <th>Price</th>
        </tr>
        <tr v-for="house in houses">
            <td>{{ house.name }}</td>
            <td align="center">{{ house.bedrooms }}</td>
            <td align="center">{{ house.bathrooms }}</td>
            <td align="center">{{ house.storeys }}</td>
            <td align="center">{{ house.garages }}</td>
            <td align="right">{{ getFormattedPrice(house.price) }}</td>
        </tr>
    </table>

    <div align="center" v-if="houses.length == 0" class="mt-4">No results</div>
</template>
