import Vue from 'vue';
import App from './App.vue';
import router from './router';
import store from './store';
import './registerServiceWorker';
import {BootstrapVue, IconsPlugin} from 'bootstrap-vue';

Vue.config.productionTip = false;

// BootstrapVue
Vue.use(BootstrapVue);
Vue.use(IconsPlugin);

new Vue({
    router,
    store,
    render: h => h(App)
}).$mount('#app');
