import './bootstrap';
import { createApp } from 'vue';
import ShortLink from './components/ShortLink.vue';

const app = createApp({});
app.component('short_link', ShortLink);

app.mount("#app");
