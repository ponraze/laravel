import './bootstrap';
import { createApp } from 'vue';
import HouseSearch from './components/HouseSearch.vue';

const app = createApp({});
app.component('house_search', HouseSearch);

app.mount("#app");