<template>
  <div class="flex border-b border-40">
    <div class="w-1/4 py-4">
      <h4 class="font-normal text-80">{{ name }} </h4>
    </div>
    <div class="w-3/4 py-4 break-words">
      <p>{{ value }}</p>
    </div>
  </div>
</template>

<script>
export default {
  props: ["name", "value"],
  mouted() {
      console.log("test");
  }
};
</script>
