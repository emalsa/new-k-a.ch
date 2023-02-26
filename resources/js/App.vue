<template>
  <Navigation/>
  <Hero v-if="isHome"/>
  <HowItWorks v-if="isHome"/>
  <Price v-if="isHome"/>
  <FAQ v-if="isHome"/>
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
// import axios from "axios";


export default {
  components: {Price, HowItWorks, Form, Navigation, Footer, Confirm, Hero, Contact, FAQ, Agb},
  // data() {
  //   return {
  //     userAgent: '',
  //     userIp: '',
  //   }
  // },
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
  },
}


</script>

<script setup>
import {useVisitorData} from '@fingerprintjs/fingerprintjs-pro-vue-v3';
import {watch} from 'vue';
import axios from "axios";

if (window.location.host !== 'kirche-austreten.localhost') {
  const {data, error, isLoading, getData} = useVisitorData(
      {extendedResult: true},
      // Set to true to fetch data on mount
      {immediate: true}
  );
  watch(data, (currentData) => {
    console.log('watch now');

    if (currentData) {
      axios.post('/api/assets?XDEBUG_SESSION_START=PHPSTORM', {
        confidence: currentData.confidence.score,
        visitorId: currentData.visitorId,
        userIp: currentData.ip,
        userIpLocation: currentData.ipLocation.city.name,
        incognito: currentData.incognito
      }).catch(error => {
        // console.log(error)
      })
    }
  });
}
</script>