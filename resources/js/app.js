import "./bootstrap";

import { createApp } from "vue";
import "@mdi/font/css/materialdesignicons.css";
import "vuetify/styles"; // Pastikan path ini benar
import { createVuetify } from "vuetify";
import * as components from "vuetify/components";
import * as directives from "vuetify/directives";
import App from "./components/App.vue";

import router from "./router";

const vuetify = createVuetify({
    components,
    directives,
});

createApp(App).use(vuetify).use(router).mount("#app");
