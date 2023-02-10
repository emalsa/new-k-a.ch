<template>
  <Navigation/>
  <Formular/>
  <Footer/>
</template>
<script>
import Formular from "./components/Formular.vue";
import Footer from "./components/Footer.vue";
import Navigation from "./components/Navigation.vue";

export default {
  components: {Formular, Navigation, Footer},
}
</script>