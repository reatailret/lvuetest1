

import TableComponent from './components/TableComponent.vue';

require('./bootstrap');
import ElementPlus from 'element-plus'
import 'element-plus/lib/theme-chalk/index.css'
import { createApp } from 'vue';
const app = createApp(TableComponent).use(ElementPlus).mount("#app")

