<template>
  <div class="application-logo">
    <img :src="logoSrc" alt="Application Logo" />
  </div>
</template>

<script>
import logo from '@/../images/beer.png'; 

export default {
  name: "AppLogo",
  data() {
    return {
      logoSrc: logo,
    };
  },
};
</script>

<style scoped>
.application-logo img {
  width: 50px; 
  height: auto;
}
</style>

