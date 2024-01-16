import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";

import "./assets/main.css";
import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { faUserSecret } from '@fortawesome/free-solid-svg-icons'
import { faCartShopping } from '@fortawesome/free-solid-svg-icons'

library.add(faUserSecret)
library.add(faCartShopping)

const app = createApp(App);

app.use(router);

createApp(App)
.component('font-awesome-icon', FontAwesomeIcon)
.mount('#app')
