<template>
  <div v-if="isForm">

    <section class="py-16 bg-white">
      <div class="container px-4 mx-auto">
        <div class="container ">
          <a class="font-medium hover:underline" href="#">Home -&gt; Schritt 1</a>
        </div>
        <div class="max-w-xl mx-auto">

          <div class="mb-6">
            <div class="mb-12">
              <span v-if="isStep1" class=" text-sm font-semibold uppercase ">
                <span>LASS UNS</span>
                <span class="text-green-500">&nbsp;Starten</span>
              </span>
            </div>
            <h4 v-if="isStep1" class="max-w-xs font-heading text-3xl sm:text-4xl mt-2">Person 1</h4>
            <h4 v-if="isStep2" class="max-w-xs font-heading text-3xl sm:text-4xl mt-2">Partner</h4>
            <div>
              <div v-if="errors.length">
                <b>Please correct the following error(s):</b>
                <ul>
                  <li v-for="error in errors">{{ error }}</li>
                </ul>
              </div>
            </div>
          </div>

          <form @submit.prevent="checkForm" class="bg-red">
            <div v-if="isStep1" class="step1">
              <div class="mb-4">
                <label class="block text-md leading-6 mb-2" for="">Vorname</label>
                <input class="block w-full p-4 font-heading text-gray-900 placeholder-gray-300 bg-gray-50 rounded outline-none"
                       v-model="person.vornamePerson"
                       name="vornamePerson"
                       type="text"
                       required
                       placeholder="Dein Vorname">
              </div>
              <div class="mb-4">
                <label class="block text-md leading-6 mb-2" for="">Nachname</label>
                <input class="block w-full p-4 font-heading text-gray-900 placeholder-gray-300 bg-gray-50 rounded outline-none"
                       name="nachnamePerson"
                       type="text"
                       required
                       placeholder="Dein Nachname">
              </div>
              <div class="mb-6">
                <label class="block text-md leading-6 mb-2" for="">Geburtsdatum</label>
                <input class="block w-full p-4 font-heading text-gray-900 placeholder-gray-300 bg-gray-50 rounded outline-none"
                       name="geburtsdatumPerson"
                       type="text"
                       required
                       placeholder="Dein Geburtsdatum, Beispiel: 4.12.1967">
                <span class="block text-md w-full py-4 font-heading rounded outline-none">Beispiel: <i>4.12.1966</i> oder <i>3.3.1922</i></span>
              </div>
              <div class="mb-6">
                <label class="block text-md leading-6 mb-2" for="">Meine Konfession</label>
                <div class="relative">
                  <select id="konfessionPerson"
                          class="appearance-none block w-full p-4 font-heading text-gray-900 placeholder-gray-300 bg-gray-50 rounded outline-none"
                          name="konfessionPerson"
                          required>
                    <option value="">Bitte auswählen</option>
                    <option value="kath">R&ouml;misch-Katholisch (Kath.)</option>
                    <option value="ref">Evangelisch-Reformiert (Ref.)</option>
                  </select>
                  <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20">
                      <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                    </svg>
                  </div>
                </div>
              </div>

              <!--Taufdatum checkbox -->
              <div class="my-12">
                <label>
                  <input type="checkbox"
                         v-model="person.taufdatumBekanntPerson"
                         name="taufdatumBekanntPerson"
                         value="example value">
                  <span class="ml-1">Ich kenne mein Taufdatum oder Taufort</span>
                </label>
              </div>

              <!-- Taufort/datum -->
              <div v-if="person.taufdatumBekanntPerson" class="mt-12 mb-6">
                <div class="mb-6">
                  <label class="block text-md leading-6 mb-2" for="">Taufdatum</label>
                  <input class="block w-full p-4 font-heading text-gray-300 placeholder-gray-300 bg-gray-50 rounded outline-none"
                         name="taufdatumPerson"
                         type="text"
                         placeholder="Taufdatum, Beispiel: 4.12.1967">
                  <span class="block text-md w-full py-4 font-heading rounded outline-none">Beispiel: <i>4.12.1966</i> oder <i>3.3.1922</i></span>
                </div>
                <div class="mb-6">
                  <label class="block text-md leading-6 mb-2" for="">Taufort</label>
                  <input class="block w-full p-4 font-heading text-gray-300 placeholder-gray-300 bg-gray-50 rounded outline-none"
                         name="taufortPerson"
                         type="text"
                         placeholder="Taufort">
                </div>
              </div>
            </div>


            <div v-if="isStep2" class="step2">
              <!--Taufdatum checkbox -->
              <div class="my-12">
                <label>
                  <input type="checkbox"
                         v-model="hatEhepartner"
                         name="hatEhepartner"
                         value="example value">
                  <span class="ml-1">Mein Ehepartner möchte auch austreten</span>
                </label>
              </div>
              <div v-if="hatEhepartner">
                <div class="mb-4">
                  <label class="block text-md leading-6 mb-2" for="">Vorname</label>
                  <input class="block w-full p-4 font-heading text-gray-900 placeholder-gray-300 bg-gray-50 rounded outline-none"
                         name="vornamePartner"
                         type="text"
                         required
                         placeholder="Vorname">
                </div>
                <div class="mb-4">
                  <label class="block text-md leading-6 mb-2" for="">Nachname</label>
                  <input class="block w-full p-4 font-heading text-gray-900 placeholder-gray-300 bg-gray-50 rounded outline-none"
                         name="nachnamePartner"
                         type="text"
                         required
                         placeholder="Nachname">
                </div>
                <div class="mb-6">
                  <label class="block text-md leading-6 mb-2" for="">Geburtsdatum</label>
                  <input class="block w-full p-4 font-heading text-gray-900 placeholder-gray-300 bg-gray-50 rounded outline-none"
                         name="geburtsdatumPartner"
                         type="text"
                         required
                         placeholder="Geburtsdatum, Beispiel: 4.12.1967">
                  <span class="block text-md w-full py-4 font-heading rounded outline-none">Beispiel: <i>4.12.1966</i> oder <i>3.3.1922</i></span>
                </div>

                <div class="mb-6">
                  <label class="block text-md leading-6 mb-2" for="">Konfession</label>
                  <div class="relative">
                    <select class="appearance-none block w-full p-4 font-heading text-gray-900 placeholder-gray-300 bg-gray-50 rounded outline-none"
                            name="konfessionPartner"
                            required>
                      <option disabled selected value>Bitte auswählen</option>
                      <option value="kath">R&ouml;misch-Katholisch (Kath.)</option>
                      <option value="ref">Evangelisch-Reformiert (Ref.)</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                      <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                      </svg>
                    </div>
                  </div>
                </div>

                <!--Taufdatum checkbox -->
                <div class="my-12">
                  <label>
                    <input type="checkbox"
                           v-model="partner.taufdatumBekanntPartner"
                           name="taufdatumBekanntPartner"
                           value="example value">
                    <span class="ml-1">Der Partner kennt sein Taufdatum oder Taufort</span>
                  </label>
                </div>

                <!-- Taufort/datum -->
                <div v-if="partner.taufdatumBekanntPartner" class="mt-12 mb-6">
                  <div class="mb-6">
                    <label class="block text-md leading-6 mb-2" for="">Taufdatum</label>
                    <input class="block w-full p-4 font-heading text-gray-300 placeholder-gray-300 bg-gray-50 rounded outline-none"
                           name="taufdatumPartner"
                           type="text"
                           placeholder="Taufdatum, Beispiel: 4.12.1967">
                    <span class="block text-md w-full py-4 font-heading rounded outline-none">Beispiel: <i>4.12.1966</i> oder <i>3.3.1922</i></span>
                  </div>
                  <div class="mb-6">
                    <label class="block text-md leading-6 mb-2" for="">Taufort</label>
                    <input class="block w-full p-4 font-heading text-gray-300 placeholder-gray-300 bg-gray-50 rounded outline-none"
                           name="taufortPartner"
                           type="text"
                           placeholder="Taufort">
                  </div>
                </div>
              </div>
            </div>

            <div v-if="isStep3" class="step2">
              <!--Taufdatum checkbox -->
              <div class="my-12">
                <label>
                  <input type="checkbox"
                         v-model="hatKinder"
                         name="hatKinder"
                         value="example value">
                  <span class="ml-1">Meine Kinder wollen auch austreten. (Unter 16 Jahre)</span>
                </label>
              </div>
              <div v-if="hatKinder">
                <div class="mb-4">
                  <label class="block text-md leading-6 mb-2" for="">Vorname</label>
                  <input class="block w-full p-4 font-heading text-gray-900 placeholder-gray-300 bg-gray-50 rounded outline-none"
                         name="vornamePartner"
                         type="text"
                         required
                         placeholder="Vorname">
                </div>
                <div class="mb-4">
                  <label class="block text-md leading-6 mb-2" for="">Nachname</label>
                  <input class="block w-full p-4 font-heading text-gray-900 placeholder-gray-300 bg-gray-50 rounded outline-none"
                         name="nachnamePartner"
                         type="text"
                         required
                         placeholder="Nachname">
                </div>
                <div class="mb-6">
                  <label class="block text-md leading-6 mb-2" for="">Geburtsdatum</label>
                  <input class="block w-full p-4 font-heading text-gray-900 placeholder-gray-300 bg-gray-50 rounded outline-none"
                         name="geburtsdatumPartner"
                         type="text"
                         required
                         placeholder="Geburtsdatum, Beispiel: 4.12.1967">
                  <span class="block text-md w-full py-4 font-heading rounded outline-none">Beispiel: <i>4.12.1966</i> oder <i>3.3.1922</i></span>
                </div>

                <div class="mb-6">
                  <label class="block text-md leading-6 mb-2" for="">Konfession</label>
                  <div class="relative">
                    <select class="appearance-none block w-full p-4 font-heading text-gray-900 placeholder-gray-300 bg-gray-50 rounded outline-none"
                            name="konfessionPartner"
                            required>
                      <option disabled selected value>Bitte auswählen</option>
                      <option value="kath">R&ouml;misch-Katholisch (Kath.)</option>
                      <option value="ref">Evangelisch-Reformiert (Ref.)</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                      <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                      </svg>
                    </div>
                  </div>
                </div>

                <!--Taufdatum checkbox -->
                <div class="my-12">
                  <label>
                    <input type="checkbox"
                           v-model="partner.taufdatumBekanntPartner"
                           name="taufdatumBekanntPartner"
                           value="example value">
                    <span class="ml-1">Der Partner kennt sein Taufdatum oder Taufort</span>
                  </label>
                </div>

                <!-- Taufort/datum -->
                <div v-if="partner.taufdatumBekanntPartner" class="mt-12 mb-6">
                  <div class="mb-6">
                    <label class="block text-md leading-6 mb-2" for="">Taufdatum</label>
                    <input class="block w-full p-4 font-heading text-gray-300 placeholder-gray-300 bg-gray-50 rounded outline-none"
                           name="taufdatumPartner"
                           type="text"
                           placeholder="Taufdatum, Beispiel: 4.12.1967">
                    <span class="block text-md w-full py-4 font-heading rounded outline-none">Beispiel: <i>4.12.1966</i> oder <i>3.3.1922</i></span>
                  </div>
                  <div class="mb-6">
                    <label class="block text-md leading-6 mb-2" for="">Taufort</label>
                    <input class="block w-full p-4 font-heading text-gray-300 placeholder-gray-300 bg-gray-50 rounded outline-none"
                           name="taufortPartner"
                           type="text"
                           placeholder="Taufort">
                  </div>
                </div>
              </div>
            </div>

            <!-- Weiter -->
            <div class="flex">
              <div class="w-1/2  pr-36  text-left">
                <button class="w-full block py-4 px-6 text-center font-heading font-medium text-base text-white bg-green-500 hover:bg-green-600 border border-green-500 hover:border-green-600 rounded-sm transition duration-200"
                        name="back"
                        @click.prevent="prev">
                  Zurück
                </button>
              </div>

              <!-- Weiter -->
              <div class="w-1/2  text-right">
                <button class="w-full block py-4 px-6 text-center font-heading font-medium text-base text-white bg-green-500 hover:bg-green-600 border border-green-500 hover:border-green-600 rounded-sm transition duration-200"
                        name="next">
                  Weiter
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>


    <!-- Test -->
    <div>
      <div class="mb-6">
        <label class="block text-sm leading-6 mb-2" for="">Label for select</label>
        <div class="relative">
          <select class="appearance-none block w-full p-4 font-heading text-gray-300 placeholder-gray-300 bg-gray-50 rounded outline-none"
                  name="field-name">
            <option>Option 1</option>
            <option>Option 2</option>
            <option>Option 3</option>
            <option>Option 4</option>
          </select>
          <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20">
              <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
            </svg>
          </div>
        </div>
      </div>

      <div class="mb-6">
        <div class="mb-1">
          <label>
            <input type="radio" name="radio-name" value="option 1" checked>
            <span class="ml-1">Radio option 1</span>
          </label>
        </div>
        <div>
          <label>
            <input type="radio" name="radio-name" value="option 2">
            <span class="ml-1">Radio option 2</span>
          </label>
        </div>
      </div>


      <div class="mb-6">
        <label class="mr-2">
          <input type="radio" name="inline-radio" value="option 1" checked>
          <span class="ml-1">Radio option 1</span>
        </label>
        <label>
          <input type="radio" name="inline-radio" value="option 2">
          <span class="ml-1">Radio option 2</span>
        </label>
      </div>

      <div class="mb-6">
        <label>
          <input type="checkbox" name="field-name" value="example value" checked>
          <span class="ml-1">Check me out</span>
        </label>
      </div>

      <div class="mb-6">
        <label class="block text-sm leading-6 mb-2" for="">Label for textarea</label>
        <textarea class="block w-full p-4 font-heading text-gray-300 placeholder-gray-300 bg-gray-50 rounded outline-none"
                  name="field-name"
                  rows="3"
                  placeholder="Write something..."></textarea>
      </div>
    </div>


  </div>
</template>

<script>

export default {
  data() {
    return {
      errors: [],
      hatEhepartner: false,
      hatKinder: false,
      currentStep: 1,
      person: {
        taufdatumBekanntPerson: false,
        vornamePerson: null,
        nachnamePerson: null,
        geburtsdatumPerson: null,
        konfessionPerson: null,
        taufdatumPerson: null,
        taufortPerson: null
      },
      partner: {
        taufdatumBekanntPartner: false,
        vornamePartner: null,
        nachnamePartner: null,
        geburtsdatumPartner: null,
        konfessionPartner: null,
        taufdatumPartner: null,
        taufortPartner: null
      },
      child: {
        vornameChild: null,
        nachnameChild: null,
        geburtsdatumChild: null,
        konfessionChild: null,
        taufdatumChild: null,
        taufortChild: null
      },
      children: {}
    }
  },
  computed: {
    isForm() {
      // console.log(this.$route.name === 'Formular')
      // name = this.$route.name;
      return this.$route.name === 'Formular'
    },
    isStep1() {
      return this.currentStep === 1;
    },
    isStep2() {
      return this.currentStep === 2;
    },
    isStep3() {
      return this.currentStep === 3;
    }
  },
  methods: {
    prev() {
      this.currentStep--;
    },
    next() {
      this.currentStep++;
    },
    checkForm: function (e) {
      this.next();
      // this.errors = [];
      //
      // console.log(!this.person.vornamePerson)
      // console.log(this.person.vornamePerson)
      //
      // if (!this.person.vornamePerson) {
      //   this.errors.push("Vorname required.");
      // }
      //
      // console.log(!this.errors)
      //
      // if (this.errors.length === 0) {
      //   this.next();
      // }
      // e.preventDefault();
    },
    submit() {
      alert('Submit to blah and show blah and etc.');
    }
  }
  // data() {
  //   return {}
  // }
}
</script>