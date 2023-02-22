<template>
  <section>
    <nav class="px-4 sm:px-10 py-4 bg-white">
      <div class="relative flex items-center justify-between">
        <div class="w-auto flex justify-between">
          <a class="inline-block mr-3" href="/">
            <img width="48" height="48" src="../../assets/logo/logo-acros-black_alone.png" alt="">
          </a>
          <h3 class="py-2 text-2xl">kirche-austreten.ch</h3>
        </div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 hidden lg:block">
          <ul class="flex items-center">
            <li class="font-heading font-bold mr-12 text-gray-400"><a class="hover:text-black" href="/#wie-es-funktioniert">Funktionsweise</a></li>
            <li class="font-heading  font-bold mr-12 text-gray-400"><a class="hover:text-black" href="/#angebot">Formular</a></li>
            <li class="font-heading  font-bold mr-12 text-gray-400"><a class="hover:text-black" href="/#fragen-und-antworten">FAQ</a></li>
            <li class="font-heading font-bold mr-12 text-gray-400"><a class="hover:text-black" href="/#kontakt">Kontakt</a></li>
          </ul>
        </div>
        <div class="w-auto hidden lg:block">
          <a class="inline-block font-bold py-4 px-8 font-heading text-base text-white bg-green-500 hover:bg-green-600 border border-green-500 hover:border-green-600 rounded-sm transition duration-200"
             href="/formular">Start</a></div>
        <div class="w-auto lg:hidden">
          <a class="navbar-burger inline-flex w-14 h-14 justify-center items-center bg-gray-50 hover:bg-gray-100 rounded-full"
             href="/#">
            <svg width="20" height="10" viewbox="0 0 20 10" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M19 9H1M19 1H1"
                    stroke="black"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"></path>
            </svg>
          </a>

        </div>
      </div>
    </nav>
    <div class="hidden navbar-menu fixed top-0 left-0 bottom-0 w-5/6 max-w-sm z-50">
      <div class="navbar-backdrop fixed inset-0 backdrop-blur-xl backdrop-filter bg-gray-900 bg-opacity-80"></div>
      <nav class="relative pt-7 pb-8 bg-white h-full overflow-y-auto">
        <div class="flex flex-col px-6 h-full">
          <a class="inline-block ml-4 mb-7" href="/#">
            <img width="48" height="48" src="../../assets/logo/logo-acros-black_alone.png" alt="">
          </a>
          <ul class="w-full mb-auto pb-16">
            <li><a class="font-heading block text-base font-medium py-4 px-6 hover:bg-green-50 rounded-sm"
                   href="/">kirche-austreten.ch</a></li>
            <li><a class="font-heading font-bold text-gray-400 block text-base py-4 px-6 hover:bg-green-50 rounded-sm" href="/#wie-es-funktioniert">Vorgang</a></li>
            <li><a class="font-heading font-bold text-gray-400 block text-base py-4 px-6 hover:bg-green-50 rounded-sm" href="/#angebot">Kirchenaustritt</a></li>
            <li><a class="font-heading font-bold text-gray-400 block text-base py-4 px-6 hover:bg-green-50 rounded-sm" href="/#fragen-und-antworten">Fragen und Antworten</a>            </li>
            <li><a class="font-heading font-bold text-gray-400 block text-base py-4 px-6 hover:bg-green-50 rounded-sm" href="/#kontakt">Kontakt</a>
            </li>
          </ul>
          <div class="w-full">
            <a class="block font-bold w-full py-4 px-4 mb-8 text-center font-heading text-base text-white bg-green-500 hover:bg-green-600 border border-green-500 hover:border-green-600 rounded-sm transition duration-200"
                       href="/formular">Start</a>
            <p class="pl-2 text-sm">{{ currentYear }} © kirche-austreten.ch</p>
          </div>
        </div>
      </nav>
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