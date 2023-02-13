<template>
  <Navigation/>
  <Form v-if="isForm"/>
  <Confirm v-if="isConfirm"/>
  <Footer/>
</template>
<script>
import Form from "./components/Form.vue";
import Footer from "./components/Footer.vue";
import Navigation from "./components/Navigation.vue";
import Confirm from "./components/Confirm.vue";

export default {
  components: {Form, Navigation, Footer, Confirm},
  computed: {
    isForm() {
      return this.$route.name === 'Form'
    },
    isConfirm() {
      return this.$route.name === 'Confirm'
    },
  }
}
</script>