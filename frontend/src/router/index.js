import { createRouter, createWebHistory } from "vue-router";
import Dashboard from "../views/Dashboard.vue";
import Login from "../views/Login.vue";
import TodosIndex from "../views/todos/TodosIndex.vue";
import CreateTodo from "../views/todos/CreateTodo.vue";
import store from "../store";

const routes = [
    {
        path: "/",
        name: "dashboard",
        component: Dashboard,
        meta: {
            requiresAuth: true,
        },
    },
    {
        path: "/todos",
        name: "todos.index",
        component: TodosIndex,
        meta: {
            requiresAuth: true,
        },
    },
    {
        path: "/todos/create",
        name: "todos.create",
        component: CreateTodo,
        meta: {
            requiresAuth: true,
        },
    },

    {
        path: "/login",
        name: "login",
        component: Login,
        meta: {
            requiresGuest: true,
        },
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach((to, from, next) => {
    if (to.meta.requiresAuth && !store.state.user.token) {
        next({ name: "login" });
    } else if (to.meta.requiresGuest && store.state.user.token) {
        next({ name: "dashboard" });
    } else {
        next();
    }
});

export default router;
