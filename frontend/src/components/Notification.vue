<template>
  <div
    v-if="notification.show"
    class="animate-fade-in-down fixed bottom-4 left-4 w-[300px] px-4 py-2 text-white"
    :class="[notification.type === 'success' ? 'bg-emerald-500' : 'bg-red-500']"
  >
    {{ notification.message }}
  </div>
</template>

<script setup>
import { computed } from "vue";
import { useStore } from "vuex";

const store = useStore();

const notification = computed(() => store.state.notification);
</script>

<style></style>
