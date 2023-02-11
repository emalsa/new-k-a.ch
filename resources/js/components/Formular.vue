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
                <b>Please correct the following error(s):</b>
                <ul>
                  <li v-for="error in errors">{{ error }}</li>
                </ul>
              </div>
            </div>
          </div>

          <form @submit.prevent="checkForm" class="bg-red">

            <!-- Step 1 (Person)-->
            <Step1 :is-step1="isStep1" :person="person"/>

            <!-- Step 2 (Partner)-->
            <Step2 :is-step2="isStep2" :partner="partner"/>

            <!-- Step 3 (Kinder)-->
            <Step3 :is-step3="isStep3" :children="children"/>

            <!-- Step 4 (Buy or enter address) -->
            <div v-if="isStep4" class="step4">
              <div class="mb-6">
                <div class="mb-2">
                  <label>
                    <input
                        @click="optionClicked"
                        type="radio"
                        name="paidOrNot"
                        value="unpaidChecked">
                    <span class="ml-1">Ich werde die Kirchgemeinde erfassen (Gratis)</span>
                  </label>
                </div>
                <div class="my-8">
                  <label>
                    <input
                        @click="optionClicked"
                        type="radio"
                        name="paidOrNot"
                        value="paidChecked">
                    <span class="ml-1">Bitte suchen Sie mir die Kirchgemeinde heraus (15 Fr.)</span>
                  </label>
                </div>
              </div>

              <div v-if="paid===false">

                <!-- catholic -->
                <div class="catholic" v-if="isCatholic">
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
                <div class="reform" v-if="isReform">
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


            <!-- Step 5 (Buy or enter address) -->
            <div v-if="isStep5" class="step5">
              <div class="px-10 pt-10">
                <div>
                  <h3 class="font-heading mt-2 text-2xl">Zusammenfassung</h3>
                </div>

                <PersonSummary class="border border-sky-500  bg-white" :element="person"/>
                <PersonSummary class="border border-sky-500 " :element="partner"/>
                <div class="border border-sky-500" v-for="(child, index) in children" :key="index">
                  <PersonSummary :element="child"/>
                </div>
              </div>
            </div>


            <!-- Buttons -->
            <div class="flex mt-10 bg-yellow-500">
              <!-- Zurück -->
              <div class="w-1/2 pr-32 text-left">
                <button class="w-full block py-4 px-6 text-center font-heading font-medium text-base text-white bg-green-500 hover:bg-green-600 border border-green-500 hover:border-green-600 rounded-sm transition duration-200"
                        name="back"
                        @click.prevent="prev">
                  Zurück
                </button>
              </div>
              <!-- Weiter -->
              <div class="w-1/2 text-right">
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
    PersonSummary,
    Step3,
    Step1,
    Step2
  },
  data() {
    return {
      errors: [],
      isCatholic: false,
      isReform: false,
      hatEhepartner: false,
      hasChildren: false,
      currentStep: 1,
      paid: null,
      person: {
        taufDatumBekanntPerson: false,
        vorname: null,
        nachname: null,
        geburtsdatum: null,
        konfession: null,
        taufdatum: null,
        taufort: null,
        streetAddress: null,
        streetAdditionalAddress: null,
        postalAddress: null,
        locationAddress: null
      },
      partner: {
        taufDatumBekanntPartner: false,
        vorname: null,
        nachname: null,
        geburtsdatum: null,
        konfession: null,
        taufdatum: null,
        taufort: null
      },
      catholic: {
        streetAddress: null,
        streetAdditionalAddress: null,
        postalAddress: null,
        locationAddress: null
      },
      reform: {
        streetAddress: null,
        streetAdditionalAddress: null,
        postalAddress: null,
        locationAddress: null
      },
      child: {
        taufDatumBekanntChild: null,
        vorname: null,
        nachname: null,
        geburtsdatum: null,
        konfession: null,
        taufdatum: null,
        taufort: null
      },
      children: [],
    }
  },
  computed: {
    isForm() {
      // console.log(this.$route.name === 'Formular')
      // name = this.$route.name;
      return this.$route.name === 'Formular'
    },
    // isCatholic() {
    //   console.log('isCatholic')
    //
    // },
    // isReform() {
    //   console.log('isReform')
    //
    // },
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
      if (event.target.value === 'unpaidChecked') {
        this.paid = false;
      }
      if (event.target.value === 'paidChecked') {
        this.paid = true;
      }
      this.isCatholic = null;
      this.isReform = null;
      console.log('optionClicked')
      if (this.person.konfession === 'kath' || this.partner.konfession === 'kath') {
        this.isCatholic = true;
      }
      if (!this.isCatholic) {
        this.children.forEach(child => {
          this.isCatholic = child.konfession === 'kath'
        });
      }

      if (this.person.konfession === 'ref' || this.partner.konfession === 'ref') {
        this.isReform = true;
      }
      this.children.forEach(child => {
        this.isReform = child.konfession === 'ref'
      });

    },
    prev() {
      this.paid = null;
      this.currentStep--;
    },
    next() {
      this.currentStep++;
    },
    checkForm: function (e) {
      this.next();
      // this.errors = [];
      //
      // console.log(!this.person.vorname)
      // console.log(this.person.vorname)
      //
      // if (!this.person.vorname) {
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
}
</script>