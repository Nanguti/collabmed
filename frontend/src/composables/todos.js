import { ref } from "vue";
import axiosClient from "../axios";
import { useRouter } from "vue-router";

export default function useTodos() {
  const todo = ref([]);
  const todos = ref([]);
  const todosCount = ref([]);

  const errors = ref("");
  const router = useRouter();

  const getTodos = async () => {
    let response = await axiosClient.get("/todos");
    todos.value = response.data.data;
  };

  const getTodo = async (id) => {
    let response = await axiosClient.get(`/todos/${id}`);
    todo.value = response.data;
  };

  const storeTodo = async (data) => {
    errors.value = "";
    try {
      await axiosClient.post("/todos", data);
      await router.push({ name: "todos.index" });
    } catch (e) {
      if (e.response.status === 422) {
        for (const key in e.response.data.errors) {
          errors.value = e.response.data.errors;
          console.log("log here " + errors);
        }
      }
    }
  };

  const updateTodo = async (id, status) => {
    errors.value = "";
    try {
      await axiosClient.patch(`/todos/${id}?status=${status}`);
      await router.push({ name: "todos.index" });
    } catch (e) {
      if (e.response.status === 422) {
        for (const key in e.response.data.errors) {
          errors.value = e.response.data.errors;
        }
      }
    }
  };

  return {
    errors,
    todo,
    todos,
    todosCount,
    getTodo,
    getTodos,
    storeTodo,
    updateTodo,
  };
}
