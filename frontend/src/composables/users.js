import { ref } from "vue";
import axiosClient from "../axios";

export default function useUsers() {
  const user = ref([]);
  const users = ref([]);

  const errors = ref("");

  const getUsers = async () => {
    let response = await axiosClient.get("/users");
    users.value = response.data.data;
  };
  const getUser = async (id) => {
    let response = await axiosClient.get(`/users/${id}`);
    user.value = response.data;
  };
  return {
    errors,
    user,
    users,
    getUser,
    getUsers,
  };
}
