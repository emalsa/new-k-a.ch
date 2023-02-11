<template>
  <Navigation/>
  <Form/>
  <Footer/>
</template>
<script>
import Form from "./components/Form.vue";
import Footer from "./components/Footer.vue";
import Navigation from "./components/Navigation.vue";

export default {
  components: {Form, Navigation, Footer},
}
</script>