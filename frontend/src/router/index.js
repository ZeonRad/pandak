import { createRouter, createWebHistory } from 'vue-router'
import { routes } from 'vue-router/auto-routes'

const routes  = [
  {
      name: "index",
      path: "/",
      component: () => import("@index.vue"),
      meta: {
          title: "Főoldal"
      }
  },
  {
      name: "panda",
      path: "/pandas/:id",
      component: () => import("@pandas/[id].vue"),
      meta: {
        title: "Kiválasztott panda"
    }
  },
]

export const router = createRouter({
  routes,
  history: createWebHistory(),
  linkActiveClass: "active"
});

router.beforeEach((to) => {
  document.title = to.meta.title
})