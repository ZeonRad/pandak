import { createRouter, createWebHistory } from 'vue-router'
import { routes } from 'vue-router/auto-routes'
import Index from "@pages/index.vue";
import Panda from "@pages/panda.vue";
const routes = [
  { path: '/', name: 'index', component: Index },
  { path: '/pandas/:id', name: 'panda', component: Panda },
];
export const router = createRouter({
  history: createWebHistory(),
  linkActiveClass: 'active',
  routes
})
export default router;
