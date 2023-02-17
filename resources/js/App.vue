<template>
  <Navigation/>
  <Hero v-if="isHome"/>
  <HowItWorks v-if="isHome"/>
  <Price v-if="isHome"/>
  <Contact v-if="isHome"/>
  <Form v-if="isForm"/>
  <Confirm v-if="isConfirm"/>
  <Footer/>
</template>
<script>
import Form from "./components/Form.vue";
import Footer from "./components/Footer.vue";
import Navigation from "./components/Navigation.vue";
import Confirm from "./components/Confirm.vue";
import Hero from "./components/Hero.vue";
import HowItWorks from "./components/HowItWorks.vue";
import Price from "./components/Price.vue";
import Contact from "./components/Contact.vue";

export default {
  components: {Price, HowItWorks, Form, Navigation, Footer, Confirm, Hero, Contact},
  computed: {
    isForm() {
      return this.$route.name === 'Form'
    },
    isConfirm() {
      return this.$route.name === 'Confirm'
    },
    isHome() {
      return this.$route.name === 'App'
    }
  }
}
</script>