<template>
  <AuthenticatedLayout>
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
      <!-- Breadcrumb Start -->
      <div
        class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between"
      >
        <h2 class="text-title-md2 font-semibold text-black dark:text-white">
          Todos
        </h2>

        <nav>
          <router-link
            :to="{ name: 'todos.create' }"
            class="inline-flex items-center justify-center rounded-md border border-primary px-10 py-2 text-center font-medium text-primary hover:bg-opacity-90 lg:px-8 xl:px-10"
          >
            Create Todo
          </router-link>
        </nav>
      </div>
      <div class="flex flex-col gap-10">
        <Table
          :tableRows="todos"
          :fields="[
            'ID',
            'TITLE',
            'DESCRIPTION',
            'STATUS',
            'DATE CREATED',
            'UPDATE',
          ]"
          :tableName="'tasks'"
          @statusChanged="handleUpdateStatus"
        ></Table>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "../../layouts/AuthenticatedLayout.vue";
import Table from "../../components/Table.vue";
import useTodos from "../../composables/todos";
import { onMounted } from "vue";

const { todos, getTodos, updateTodo } = useTodos();
const handleUpdateStatus = async (handleUpdateStatus) => {
  if (
    !window.confirm(
      "Are sure you want to update status to " + handleUpdateStatus.status
    )
  ) {
    return;
  }

  await updateTodo(handleUpdateStatus.id, handleUpdateStatus.status);
  await getTodos();
};
onMounted(getTodos);
</script>

<style lang="scss" scoped></style>
