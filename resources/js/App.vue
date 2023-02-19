<template>
  <Navigation/>
  <Hero v-if="isHome"/>
  <HowItWorks v-if="isHome"/>
  <FAQ v-if="isHome"/>
  <Price v-if="isHome"/>
  <Contact v-if="isHome"/>
  <Form v-if="isForm"/>
  <Confirm v-if="isConfirm"/>
  <Agb v-if="isAgb"/>

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
import FAQ from "./components/FAQ.vue";
import Contact from "./components/Contact.vue";
import Agb from "./components/AGB.vue";

export default {
  components: {Price, HowItWorks, Form, Navigation, Footer, Confirm, Hero, Contact, FAQ, Agb},
  computed: {
    isForm() {
      return this.$route.name === 'Form'
    },
    isConfirm() {
      return this.$route.name === 'Confirm'
    },
    isHome() {
      return this.$route.name === 'App'
    },
    isAgb() {
      return this.$route.name === 'Agb'
    }
  }
}
</script>