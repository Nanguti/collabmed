<template>
  <AuthenticatedLayout>
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
      <!-- Breadcrumb Start -->
      <div
        class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between"
      >
        <h2 class="text-title-md2 font-bold text-black dark:text-white">
          Create Todo
        </h2>
      </div>
      <div class="grid grid-cols-1 gap-9 sm:grid-cols-2">
        <div class="flex flex-col gap-9">
          <!-- Contact Form -->
          <div
            class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark"
          >
            <form @submit.prevent="saveTodo">
              <Alert v-if="errors" :errors="errors" @clearErrors="errors = ''">
              </Alert>
              <div class="p-6.5">
                <div class="mb-4.5">
                  <label class="mb-2.5 block text-black dark:text-white">
                    Title <span class="text-meta-1">*</span>
                  </label>
                  <input
                    type="text"
                    v-model="form.title"
                    placeholder="Enter todo title"
                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                  />
                </div>

                <div class="mb-6">
                  <label class="mb-2.5 block text-black dark:text-white">
                    Description
                  </label>
                  <textarea
                    rows="5"
                    v-model="form.description"
                    placeholder="Type todo description"
                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                  ></textarea>
                </div>

                <div class="mb-4.5">
                  <label class="mb-2.5 block text-black dark:text-white">
                    Status
                  </label>
                  <div class="relative z-20 bg-transparent dark:bg-form-input">
                    <select
                      v-model="form.status"
                      class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent px-5 py-3 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                    >
                      <option v-bind:value="Pending">Pending</option>
                      <option v-bind:value="Completed">Completed</option>
                      <option v-bind:value="'In Progress'">In Progress</option>
                      <option v-bind:value="Cancelled">Cancelled</option>
                      <option v-bind:value="Deferred">Deferred</option>
                      <option v-bind:value="'On Hold'">On Hold</option>
                    </select>
                    <span
                      class="absolute right-4 top-1/2 z-30 -translate-y-1/2"
                    >
                      <svg
                        class="fill-current"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <g opacity="0.8">
                          <path
                            fill-rule="evenodd"
                            clip-rule="evenodd"
                            d="M5.29289 8.29289C5.68342 7.90237 6.31658 7.90237 6.70711 8.29289L12 13.5858L17.2929 8.29289C17.6834 7.90237 18.3166 7.90237 18.7071 8.29289C19.0976 8.68342 19.0976 9.31658 18.7071 9.70711L12.7071 15.7071C12.3166 16.0976 11.6834 16.0976 11.2929 15.7071L5.29289 9.70711C4.90237 9.31658 4.90237 8.68342 5.29289 8.29289Z"
                            fill=""
                          ></path>
                        </g>
                      </svg>
                    </span>
                  </div>
                </div>
                <button
                  type="submit"
                  class="flex w-full justify-center rounded bg-primary p-3 font-medium text-gray"
                >
                  Save
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- ====== Form Layout Section End -->
    </div></AuthenticatedLayout
  >
</template>

<script setup>
import AuthenticatedLayout from "../../layouts/AuthenticatedLayout.vue";
import useTodos from "../../composables/todos";
import { reactive } from "vue";
import Alert from "../../components/Alert.vue";

const form = reactive({
  title: "",
  description: "",
  status: "",
});

const { errors, storeTodo } = useTodos();

const saveTodo = async () => {
  await storeTodo({ ...form });
};
</script>
<style scoped>
.v3dp__popout[data-v-2e128338] {
  background-color: #ddd;
}
</style>
