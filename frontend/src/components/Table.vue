<template>
  <div
    class="rounded-sm border border-stroke bg-white px-5 pb-2.5 pt-6 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1"
  >
    <div class="max-w-full overflow-x-auto">
      <table class="w-full table-auto">
        <thead>
          <tr class="bg-gray-2 text-left dark:bg-meta-4">
            <th
              v-for="(thead, index) in fields"
              :key="'thead_' + index"
              class="px-4 py-4 font-medium text-black dark:text-white"
            >
              {{ thead }}
            </th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(row, index) in tableRows" :key="'row_' + index">
            <td
              v-for="(col, index) in row"
              :key="'col_' + index"
              class="border-b border-[#eee] px-2 py-3 pl-4 dark:border-strokedark"
            >
              <h5 class="font-small text-black dark:text-white">
                {{ col }}
              </h5>
            </td>

            <td
              class="border-b border-[#eee] px-2 py-3 pl-4 dark:border-strokedark"
            >
              <select
                v-model="row.status"
                @change="changeStatus(row)"
                class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent px-5 py-3 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
              >
                <option value="Pending">Pending</option>
                <option value="Completed">Completed</option>
                <option value="In Progress">In Progress</option>
                <option value="Cancelled">Cancelled</option>
                <option value="Deferred">Deferred</option>
                <option value="On Hold">On Hold</option>
              </select>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script setup>
import { defineEmits } from "vue";
defineProps({
  tableRows: [],
  fields: [],
  tableName: "",
});
const emit = defineEmits();
const changeStatus = (row) => {
  emit("statusChanged", { id: row.todo_id, status: row.status });
};
</script>
