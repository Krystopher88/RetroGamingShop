<script>
  import { onMounted } from "vue";
  import { Tooltip, initTE } from "tw-elements";

  onMounted(() => {
    initTE({ Tooltip });
  });
import ProductsList from "./components/ProductsList.vue";

export default {
  name: "App",
  components: {
    ProductsList,
  },
};

</script>

<template>
  <div id="app">
    <ProductsList />
  </div>
</template>