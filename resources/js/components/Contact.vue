<template>
  <section id="kontakt" class="">
    <div class="container px-4 mx-auto">
      <div class="flex flex-wrap -mx-4">
        <div class="w-full lg:w-1/2 px-4 mb-16 lg:mb-0">
          <div class="max-w-md">
                <span class="text-sm font-semibold uppercase">
                  <span>Einfach</span>
                  <span class="text-green-500">&nbsp;Fragen</span>
                </span>
            <h4 class="font-heading text-3xl sm:text-4xl mt-2 mb-6">Eine Frage oder ein Problem?</h4>
            <p class="text-lg leading-8 mb-12">Kontaktiere uns bei Fragen oder Unklarheiten. Oder gib uns Feedback. Dar&uuml;ber
              freuen wir uns.</p>

          </div>
        </div>
        <div class="w-full lg:w-1/2 px-4">
          <div>
            <h4 class="font-heading text-lg font-medium mb-4 text-gray-400">Kontakt</h4>
            <div v-if="this.successSubmitted" class="font-heading text-lg font-medium mb-4 text-gray-400">
              <p>Vielen Dank für deine Nachricht. Wir melden uns.</p>
            </div>
            <form v-if="!this.successSubmitted">
              <div class="mb-4">
                <label class="block text-sm leading-6 mb-2" for="">Name</label>
                <input class="block w-full p-4 font-heading text-gray-900 placeholder-gray-300 bg-gray-50 rounded outline-none"
                       type="text"
                       required
                       v-model="vorname"
                       placeholder="Dein Name">
              </div>
              <div style="position: absolute; left: -9999px" class="mb-4">
                <label class="block text-sm leading-6 mb-2" for="">Nachname</label>
                <input class="block w-full p-4 font-heading text-gray-900 placeholder-gray-300 bg-gray-50 rounded outline-none"
                       type="text"
                       tabindex="-1"
                       v-model="nachname"
                       placeholder="Dein Nachname">
              </div>

              <div class="mb-4">
                <label class="block text-sm leading-6 mb-2" for="">Email</label>
                <input class="block w-full p-4 font-heading text-gray-900 placeholder-gray-300 bg-gray-50 rounded outline-none"
                       type="email"
                       required
                       name="email"
                       v-model="email"
                       placeholder="Deine Email">
              </div>
              <div class="mb-6">
                <label class="block text-sm leading-6 mb-2" for="">Nachricht</label>
                <textarea class="block w-full h-40 p-4 font-heading text-gray-900 placeholder-gray-300 bg-gray-50 rounded outline-none resize-none"
                          type="text"

                          v-model="message"
                          placeholder="Deine Nachricht"></textarea>
              </div>
              <div v-if="errored" class="pb-4">
                <p class="text-red-500 font-bold">{{ statusMessage }}</p>
              </div>

              <div class="text-right">
                <button class="inline-block w-full sm:w-auto py-4 px-6 mb-4 sm:mb-0 sm:mr-4 text-center font-heading font-medium text-base text-white bg-green-500 hover:bg-green-600 border border-green-500 hover:border-green-600 rounded-sm transition duration-200"
                        type="submit"
                        @click.prevent="contactSubmit">Senden
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

</template>
<script>
export default {
  data() {
    return {
      errored: false,
      successSubmitted: false,
      statusMessage: '',
      vorname: '',
      nachname: '',
      email: '',
      message: ''
    }
  },
  methods: {
    contactSubmit() {
      this.errored = false
      if (this.vorname === '') {
        this.errored = true
        this.statusMessage = 'Vorname erforderlich.'
        return
      }
      if (!this.email) {
        this.errored = true
        this.statusMessage = 'Email erforderlich.'
        return;
      }
      if (!/^[^@]+@\w+(\.\w+)+\w$/.test(this.email)) {
        this.errored = true
        this.statusMessage = 'Bitte gebe eine gültige Email Adresse an.'
        return;
      }

      if (!this.message) {
        this.errored = true
        this.statusMessage = 'Nachricht erforderlich.'
        return;
      }

      axios
          .post('/api/contact?XDEBUG_SESSION_START=PHPSTORM', {
            'vorname': this.vorname,
            'nachname': this.nachname,
            'email': this.email,
            'message': this.message,
          })
          .then(response => {
            this.responseFromController = response.data
            if (this.responseFromController && this.responseFromController.status === 'ok') {
              this.successSubmitted = true;
              setTimeout(() => {
                this.successSubmitted = true;
              }, 1500)
            }
            // Error
            if (this.responseFromController && this.responseFromController.status === 'error') {
              this.errored = true
              this.statusMessage = 'Es ist ein Fehler aufgetreten. Bitte später versuchen'
            }
          })
          .catch(error => {
            this.errored = true
            this.statusMessage = 'Es ist ein Fehler aufgetreten. Bitte später erneut versuchen.'
          })
    }
  }
}
</script>