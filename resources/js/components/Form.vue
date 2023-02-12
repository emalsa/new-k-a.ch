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
            <h4 v-if="isStep1" class="max-w-xs font-heading text-3xl mt-2">Person 1</h4>
            <h4 v-if="isStep2" class="max-w-xs font-heading text-3xl mt-2">Partner</h4>
            <h4 v-if="isStep3" class="max-w-xs font-heading text-3xl mt-2">Kinder</h4>
            <h4 v-if="isStep4" class="max-w-xs font-heading text-3xl mt-2">Kirchgemeinde</h4>
            <h4 v-if="isStep5" class="max-w-xs font-heading text-3xl mt-2">Best&auml;tigung</h4>

            <div>
              <div v-if="errors.length">
                <b>Fehler gefunden:</b>
                <ul>
                  <li v-for="error in errors">{{ error }}</li>
                </ul>
              </div>
            </div>
          </div>

          <form @submit.prevent="checkForm" class="bg-red">

            <!-- Step 1 (Person)-->
            <Step1 :is-step1="isStep1" :person="person" :formData="formData"/>

            <!-- Step 2 (Partner)-->
            <Step2 :is-step2="isStep2" :partner="partner" :formData="formData"/>

            <!-- Step 3 (Kinder)-->
            <Step3 :is-step3="isStep3" :child="child" :children="children" :formData="formData"/>

            <!-- Step 4 (Buy or enter address) -->
            <div v-if="isStep4" class="step4">
              <div class="mb-6">
                <div class="mb-2">
                  <label>
                    <input
                        @click="optionClicked"
                        type="radio"
                        name="paymentOrNot"
                        value="unpaymentChecked">
                    <span class="ml-1">Ich werde die Kirchgemeinde erfassen (Gratis)</span>
                  </label>
                </div>
                <div class="my-8">
                  <label>
                    <input
                        @click="optionClicked"
                        type="radio"
                        name="paymentOrNot"
                        value="paymentChecked">
                    <span class="ml-1">Bitte suchen Sie mir die Kirchgemeinde heraus (15 Fr.)</span>
                  </label>
                </div>
              </div>

              <div v-if="formData.payment===false">

                <!-- catholic -->
                <div class="catholic" v-if="formData.isCatholic">
                  <div class="mb-4">
                    <label class="block text-md leading-6 mb-2" for="">Strasse und Nr.</label>
                    <input class="block w-full p-4 font-heading text-gray-900 placeholder-gray-300 bg-gray-50 rounded outline-none"
                           v-model="catholic.streetAddress"
                           type="text"
                           required
                           placeholder="Kath. Kirchenstrasse 13">
                  </div>
                  <div class="mb-6">
                    <label class="block text-md leading-6 mb-2" for="">Addresszusatz</label>
                    <input class="block w-full p-4 font-heading text-gray-900 placeholder-gray-300 bg-gray-50 rounded outline-none"
                           v-model="catholic.streetAdditionalAddress"
                           type="text">
                  </div>
                  <div class="mb-6 flex">
                    <div class="flex-grow w-1/12 pr-2">
                      <label class="block text-md leading-6 mb-2" for="">Postleitzahl</label>
                      <input class="block w-full p-4 font-heading text-gray-900 placeholder-gray-300 bg-gray-50 rounded outline-none"
                             v-model="catholic.postalAddress"
                             type="text"
                             required
                             placeholder="3000">
                    </div>
                    <div class="flex-grow">
                      <label class="block text-md leading-6 mb-2" for="">Ort</label>
                      <input class="block w-full p-4 font-heading text-gray-900 placeholder-gray-300 bg-gray-50 rounded outline-none"
                             v-model="catholic.locationAddress"
                             type="text"
                             required
                             placeholder="Bern">
                    </div>
                  </div>
                </div>

                <!-- Reform -->
                <div class="reform" v-if="formData.isReform">
                  <div class="mb-4">
                    <label class="block text-md leading-6 mb-2" for="">Strasse und Nr.</label>
                    <input class="block w-full p-4 font-heading text-gray-900 placeholder-gray-300 bg-gray-50 rounded outline-none"
                           v-model="reform.streetAddress"
                           type="text"
                           required
                           placeholder="Reform. Kirchenstrasse 13">
                  </div>
                  <div class="mb-6">
                    <label class="block text-md leading-6 mb-2" for="">Addresszusatz</label>
                    <input class="block w-full p-4 font-heading text-gray-900 placeholder-gray-300 bg-gray-50 rounded outline-none"
                           v-model="reform.streetAdditionalAddress"
                           type="text">
                  </div>
                  <div class="mb-6 flex">
                    <div class="flex-grow w-1/12 pr-2">
                      <label class="block text-md leading-6 mb-2" for="">Postleitzahl</label>
                      <input class="block w-full p-4 font-heading text-gray-900 placeholder-gray-300 bg-gray-50 rounded outline-none"
                             v-model="reform.postalAddress"
                             type="text"
                             required
                             placeholder="3000">
                    </div>
                    <div class="flex-grow">
                      <label class="block text-md leading-6 mb-2" for="">Ort</label>
                      <input class="block w-full p-4 font-heading text-gray-900 placeholder-gray-300 bg-gray-50 rounded outline-none"
                             v-model="reform.locationAddress"
                             type="text"
                             required
                             placeholder="Bern">
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <!-- Step 5 (Summary) -->
            <div v-if="isStep5" class="step5">
              <div class="px-10 pt-10">
                <div>
                  <h3 class="font-heading mt-2 text-2xl">Zusammenfassung</h3>
                </div>

                <PersonSummary class="border border-sky-500  bg-white" :element="person"/>
                <PersonSummary v-if="formData.hatEhepartner" class="border border-sky-500 " :element="partner"/>
                <div v-if="formData.hasChildren"
                     class="border border-sky-500"
                     v-for="(child, index) in children"
                     :key="index">
                  <PersonSummary :element="child"/>
                </div>
              </div>
            </div>


            <!-- Buttons -->
            <div class="flex mt-10">
              <!-- Zurück -->
              <div class="w-1/2 pr-32 text-left">
                <button class="w-full block py-4 px-6 text-center font-heading font-medium text-base text-white bg-green-500 hover:bg-green-600 border border-green-500 hover:border-green-600 rounded-sm transition duration-200"
                        name="back"
                        @click.prevent="prev">
                  Zurück
                </button>
              </div>
              <!-- Weiter -->
              <div v-if="!isStep5" class="w-1/2 text-right">
                <button class="w-full block py-4 px-6 text-center font-heading font-medium text-base text-white bg-green-500 hover:bg-green-600 border border-green-500 hover:border-green-600 rounded-sm transition duration-200"
                        name="next">
                  Weiter
                </button>
              </div>
              <div v-if="isStep5" class="w-1/2 text-right">
                <button class="w-full block py-4 px-6 text-center font-heading font-medium text-base text-white bg-green-500 hover:bg-green-600 border border-green-500 hover:border-green-600 rounded-sm transition duration-200"
                        name="next"
                        @click.prevent="submit">
                  Best&auml;tigen
                </button>
              </div>
            </div>


          </form>
        </div>
      </div>
    </section>


    <!-- Test -->
    <div class="test">
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
import Step1 from './Form/Step1.vue'
import Step2 from './Form/Step2.vue'
import Step3 from './Form/Step3.vue'
import PersonSummary from './Form/PersonSummary.vue';

export default {
  components: {
    Step1,
    Step2,
    Step3,
    PersonSummary,
  },
  data() {
    return {
      errors: [],
      currentStep: 1,
      formData: {
        isCatholic: false,
        isReform: false,
        hatEhepartner: false,
        hasChildren: false,
        payment: false,
      },
      person: {
        email: '',
        taufDatumBekanntPerson: false,
        vorname: '',
        nachname: '',
        geburtsdatum: '',
        konfession: '',
        taufdatum: '',
        taufort: '',
        streetAddress: '',
        streetAdditionalAddress: '',
        postalAddress: '',
        locationAddress: ''
      },
      partner: {
        taufDatumBekanntPartner: false,
        vorname: '',
        nachname: '',
        geburtsdatum: '',
        konfession: '',
        taufdatum: '',
        taufort: ''
      },
      child: {
        taufDatumBekanntChild: false,
        vorname: '',
        nachname: '',
        geburtsdatum: '',
        konfession: '',
        taufdatum: '',
        taufort: '',
        sign: true,
      },
      children: [],
      catholic: {
        streetAddress: '',
        streetAdditionalAddress: '',
        postalAddress: '',
        locationAddress: ''
      },
      reform: {
        streetAddress: '',
        streetAdditionalAddress: '',
        postalAddress: '',
        locationAddress: ''
      },
    }
  },
  computed: {
    isForm() {
      return this.$route.name === 'Form'
    },
    isStep1() {
      return this.currentStep === 1;
    },
    isStep2() {
      return this.currentStep === 2;
    },
    isStep3() {
      return this.currentStep === 3;
    },
    isStep4() {
      return this.currentStep === 4;
    },
    isStep5() {
      return this.currentStep === 5;
    }
  },
  methods: {
    optionClicked(event) {
      if (event.target.value === 'unpaymentChecked') {
        this.formData.payment = false;
      }
      if (event.target.value === 'paymentChecked') {
        this.formData.payment = true;
      }
      this.formData.isCatholic = false;
      this.formData.isReform = false;

      if (this.person.konfession === 'kath') {
        this.formData.isCatholic = true;
      }
      if (this.formData.hatEhepartner && this.partner.konfession === 'kath') {
        this.formData.isCatholic = true;
      }

      if (this.formData.hasChildren && !this.formData.isCatholic) {
        this.children.forEach(child => {
          this.formData.isCatholic = child.konfession === 'kath'
        });
      }

      if (this.person.konfession === 'ref') {
        this.formData.isReform = true;
      }
      if (this.formData.hatEhepartner && this.partner.konfession === 'ref') {
        this.formData.isReform = true;
      }
      if (this.formData.hasChildren && !this.formData.isReform) {
        this.children.forEach(child => {
          this.formData.isReform = child.konfession === 'ref'
        });
      }

    },
    prev() {
      this.errors = [];
      window.scrollTo(0, 0);
      this.formData.payment = null;
      this.currentStep--;
    },
    next() {
      this.errors = [];
      window.scrollTo(0, 0);
      this.currentStep++;
    },
    checkForm: function (e) {
      this.errors = [];
      console.log(this.isStep1)
      if (this.isStep1) {
        if (!this.person.email) {
          this.errors.push("Email erforderlich.");
        }

        if (this.person.email) {
          if (!/[^\s@]+@[^\s@]+\.[^\s@]+/.test(this.person.email)) {
            this.errors.push("Email nicht valide.");
          }
        }
        if (!this.person.vorname) {
          this.errors.push("Vorname erforderlich.");
        }
        if (!this.person.nachname) {
          this.errors.push("Nachname erforderlich.");
        }
        if (!this.person.geburtsdatum) {
          this.errors.push("Geburtsdatum erforderlich.");
        }
        if (this.person.geburtsdatum) {
          if (!/^\d{1,2}(\.)\d{1,2}(\.)\d{4}$/.test(this.person.geburtsdatum)) {
            this.errors.push("Geburtsdatum Format ist nicht korrekt. Format Tag.Monat.Jahr erforderlich.");
          }
        }

        if (!this.person.konfession) {
          this.errors.push("Bitte wähle deine Konfession.");
        }

        if (this.person.taufdatum) {
          if (!/^\d{1,2}(\.)\d{1,2}(\.)\d{4}$/.test(this.person.taufdatum)) {
            this.errors.push("Taufdatum Format ist nicht korrekt. Format Tag.Monat.Jahr erforderlich.");
          }
        }
        if (!this.person.streetAddress) {
          this.errors.push("Strasse erforderlich.");
        }

        if (!this.person.postalAddress) {
          this.errors.push("Postleitzahl erforderlich.");
        }

        if (this.person.postalAddress) {
          if (!/^\d+$/.test(this.person.postalAddress)) {
            this.errors.push("Postleitzahl darf nur Nummern enthalten.");
          }

          if (this.person.postalAddress.length !== 4) {
            this.errors.push("Postleitzahl darf nur vier Ziffern enthalten.");
          }
        }

        if (!this.person.locationAddress) {
          this.errors.push("Ort erforderlich.");
        }
      }

      // Ehepartner
      if (this.isStep2 && this.formData.hatEhepartner) {
        console.log("hatEhepartner")
        console.log(this.formData.hatEhepartner)

        if (!this.partner.vorname) {
          this.errors.push("Vorname erforderlich.");
        }
        if (!this.partner.nachname) {
          this.errors.push("Nachname erforderlich.");
        }
        if (!this.partner.geburtsdatum) {
          this.errors.push("Geburtsdatum erforderlich.");
        }
        if (this.partner.geburtsdatum) {
          console.log("hat geburtsdatum")
          console.log(this.partner.geburtsdatum)
          if (!/^\d{1,2}(\.)\d{1,2}(\.)\d{4}$/.test(this.partner.geburtsdatum)) {
            this.errors.push("Geburtsdatum Format ist nicht korrekt. Format Tag.Monat.Jahr erforderlich.");
          }
        }

        if (!this.partner.konfession) {
          this.errors.push("Bitte wähle die Konfession.");
        }

        if (this.partner.taufdatum) {
          if (!/^\d{1,2}(\.)\d{1,2}(\.)\d{4}$/.test(this.partner.taufdatum)) {
            this.errors.push("Taufdatum Format ist nicht korrekt. Format Tag.Monat.Jahr erforderlich.");
          }
        }
      }

      // Kinder
      if (this.isStep3 && this.formData.hasChildren) {
        for (let i = 0; i < this.children.length; i++) {
          if (!this.children[i].vorname) {
            this.errors.push(i + ". Kind: Vorname erforderlich.");
          }
          if (!this.children[i].nachname) {
            this.errors.push(i + ". Kind: Nachname erforderlich.");
          }
          if (!this.children[i].geburtsdatum) {
            this.errors.push(i + ". Kind: Geburtsdatum erforderlich.");
          }
          if (this.children[i].geburtsdatum) {
            if (!/^\d{1,2}(\.)\d{1,2}(\.)\d{4}$/.test(this.children[i].geburtsdatum)) {
              this.errors.push(i + ". Kind. Geburtsdatum Format ist nicht korrekt. Format Tag.Monat.Jahr erforderlich.");
            }
          }

          if (!this.children[i].konfession) {
            this.errors.push(i + ". Kind: Bitte wähle die Konfession.");
          }

          if (this.children[i].taufdatum) {
            if (!/^\d{1,2}(\.)\d{1,2}(\.)\d{4}$/.test(this.partner.taufdatum)) {
              this.errors.push(i + ". Kind: Taufdatum Format ist nicht korrekt. Format Tag.Monat.Jahr erforderlich.");
            }
          }
        }
      }


      if (this.errors.length === 0) {
        this.next();
      }
      window.scrollTo({
        top: 0,
        behavior: "smooth"
      });
      e.preventDefault();
    },
    submit() {
      console.log(this.person)
      axios.post('/api/create-person?XDEBUG_SESSION_START=PHPSTORM', {
            person: this.person,
            partner: this.partner,
            children: this.children,
            formData: this.formData,
            catholic: this.catholic,
            reform: this.reform,
            currentStep: this.currentStep,
          }
      )
          .then((response) => {
            console.log('Success:');
            console.log(response);
          })
          .catch(e => {
            console.log('Error:');
            console.log(e);
          });
    }
  }
}
</script>