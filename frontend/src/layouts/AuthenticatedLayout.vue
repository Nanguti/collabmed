<template>
  <div>
    <Preloader></Preloader>
    <div class="flex h-screen overflow-hidden">
      <Sidebar></Sidebar>
      <div
        class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden"
      >
        <Header></Header>
        <main>
          <slot></slot>
        </main>
      </div>
    </div>
  </div>
</template>

<script setup>
import Header from "../components/Header.vue";
import Preloader from "../components/Preloader.vue";
import Sidebar from "../components/Sidebar.vue";
</script>

<style lang="scss" scoped></style>
