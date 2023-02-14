<template>
  <section class="pt-18 pb-14 bg-gray-900">
    <div class="container px-4 mx-auto">
      <div class="relative flex flex-wrap justify-center md:justify-between items-center mb-20">
        <div class="text-center w-full md:hidden mb-12 text-center">
          <a class="inline-block" href="/">
            <img width="40" height="45" src="../../assets/logo/logo-acros-column-white_alone.png" alt=""></a>
          <h2 class="text-white text-bold text-heading">kirche-austreten.ch</h2>

        </div>
        <div class="w-full sm:w-auto mb-6 sm:mb-0 sm:mr-16 text-center">
          <a class="inline-block mr-16 font-heading text-white" href="#wie-es-funktioniert">Wie es funktioniert</a>
          <a class="inline-block font-heading text-white" href="#angebot">Angebot</a>

        </div>
        <div class="text-center hidden md:block absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-auto">
          <a class="inline-block" href="/">
            <img width="40" height="45" src="../../assets/logo/logo-acros-column-white_alone.png" alt=""></a>
          <h2 class="text-white text-bold text-heading">kirche-austreten.ch</h2>
        </div>
        <div class="w-full sm:w-auto text-center">
          <a class="inline-block mr-16 font-heading text-white" href="#fragen-und-antworten">Fragen und Antworten</a>
          <a
              class="inline-block font-heading text-white"
              href="#kontakt">Kontakt</a></div>
      </div>
      <div class="relative flex justify-between items-center">
        <div class="w-auto">
          <span class="mt-6 sm:mt-0 text-gray-300">{{ currentYear }} © kirche-austreten.ch</span>
        </div>
        <div class="hidden md:block absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-auto">

        </div>
        <div class="w-auto"><a class="text-gray-300" href="#">Privacy Policy</a></div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  computed: {
    currentYear() {
      let now = new Date();
      return now.getFullYear();
    }
  }
}
</script>