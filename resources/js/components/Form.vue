<template>
  <div v-if="isForm">

    <section class="py-16 bg-white">
      <div class="container px-4 mx-auto">

        <div class="max-w-3xl mx-auto">
          <div class="w-full mx-auto mb-14  max-w-2xl">
            <div class="bg-green-500  h-1 flex items-center justify-between">

              <div class="w-1/3 bg-green-500 h-1 flex items-center">
                <div class="bg-green-500 h-6 w-6 rounded-full shadow flex items-center justify-center">
                  <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/thin_with_steps-svg1.svg" alt="check"/>
                </div>
              </div>

              <div class="w-1/3 bg-green-500 h-1 flex items-center">
                <div class="bg-green-500 h-6 w-6 rounded-full shadow flex items-center justify-center">
                  <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/thin_with_steps-svg1.svg" alt="check"/>
                </div>
              </div>


              <div class="w-1/3 flex justify-between bg-green-500 h-1 items-center relative">
                <div class="absolute right-0 -mr-2">
                  <div class="relative bg-white dark:bg-green-500 shadow-lg px-2 py-1 rounded mt-16 -mr-12">
                    <svg class="absolute  top-0 -mt-1 w-full right-0 left-0 text-white dark:text-gray-800"
                         width="16px"
                         height="8px"
                         viewBox="0 0 16 8"
                         version="1.1"
                         xmlns="http://www.w3.org/2000/svg">
                      <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="Progress-Bars" transform="translate(-322.000000, -198.000000)" fill="bg-green-500 ">
                          <g id="Group-4" transform="translate(310.000000, 198.000000)">
                            <polygon id="Triangle" points="20 0 28 8 12 8"></polygon>
                          </g>
                        </g>
                      </g>
                    </svg>
                    <p tabindex="0" class="focus:outline-none text-white text-xs font-bold">
                      Step 3: Analyzing</p>
                  </div>
                </div>

                <div class="bg-green-500 h-6 w-6 rounded-full shadow flex items-center justify-center -ml-2">
                  <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/thin_with_steps-svg1.svg" alt="check"/>
                </div>

                <div class="bg-white dark:bg-green-500 h-6 w-6 rounded-full shadow flex items-center justify-center -mr-3 relative">
                  <div class="h-3 w-3 bg-green-500  rounded-full"></div>
                </div>

              </div>

              <div class="w-1/3 flex justify-end">
                <div class="bg-white dark:bg-green-100 h-6 w-6 rounded-full shadow"></div>
              </div>

            </div>
          </div>

          <div class="mb-6 mx-auto max-w-xl">
            <div class="mb-8">
              <span v-if="isStep1" class="text-md font-semibold uppercase">
                <span>LASS UNS</span>
                <span class="text-green-500">&nbsp;Starten</span>
              </span>
              <span v-if="isStep2" class="text-sm font-semibold uppercase">
                <span>Dein</span>
                <span class="text-green-500">&nbsp;Ehepartner?</span>
              </span>
              <span v-if="isStep3" class="text-sm font-semibold uppercase">
                <span>Und deine</span>
                <span class="text-green-500">&nbsp;Kinder?</span>
              </span>
              <span v-if="isStep4" class="text-sm font-semibold uppercase">
                <span>Bald</span>
                <span class="text-green-500">&nbsp;geschafft</span>
              </span>
              <span v-if="isStep5" class="text-sm font-semibold uppercase">
                <span>Pr&uuml;fe nochmal</span>
                <span class="text-green-500">&nbsp;alles</span>
              </span>
            </div>
            <div class="mb-10 max-w-xs text-2xl mt-2 uppercase">
              <h4 v-if="isStep1">Personalien</h4>
              <h4 v-if="isStep2">Partner</h4>
              <h4 v-if="isStep3">Kinder</h4>
              <h4 v-if="isStep4">Kirchgemeinde</h4>
              <h4 v-if="isStep5">&Uuml;bersicht</h4>
            </div>
            <div>
              <div v-if="errors.length">
                <b>Fehler gefunden:</b>
                <ul>
                  <li v-for="error in errors">{{ error }}</li>
                </ul>
              </div>
            </div>
          </div>

          <form @submit.prevent="checkForm" class="mx-auto max-w-xl">

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
                        class="mt-2 mr-2"
                        @click="optionClicked"
                        type="radio"
                        name="paymentOrNot"
                        value="paymentChecked">
                    <span class="ml-1 leading-7">Sucht ihr mir die Kirchgemeinde heraus, ich will nur unterschreiben (15 Fr.)</span>
                  </label>
                </div>

                <div class="my-8">
                  <label>
                    <input
                        class="mt-2 mr-2"
                        @click="optionClicked"
                        type="radio"
                        name="paymentOrNot"
                        value="unpaymentChecked">
                    <span class="ml-1 leading-7">Ich habe die Adresse der Kirchgemeinde bereits oder werde sie selbst suchen (Gratis)</span>
                  </label>
                </div>
              </div>

              <div v-if="formData.payment===false">


                <!-- Catholic -->
                <div class="catholic p-8 mt-4 border" v-if="formData.isCatholic">
                  <div class="mb-8">
                    <p>
                      Du kannst die Adressfelder leer lassen und nachtr&auml;glich hinzuf&uuml;gen, wenn du die Email
                      mit dem
                      Austrittsschreiben von uns erhalten hast.
                    </p>
                  </div>
                  <div class="mb-4">
                    <h5 class="uppercase mb-8">Katholische Kirchgemeinde</h5>
                    <label class="block text-md leading-6 mb-2" for="">Strasse und Nr.</label>
                    <input class="block w-full p-4 font-heading text-gray-900 placeholder-gray-300 bg-gray-50 rounded outline-none"
                           v-model="catholic.streetAddress"
                           type="text"
                           placeholder="Kath. Kirchenstrasse 13">
                  </div>
                  <div class="mb-6">
                    <label class="block text-md leading-6 mb-2" for="">Addresszusatz</label>
                    <input class="block w-full p-4 font-heading text-gray-900 placeholder-gray-300 bg-gray-50 rounded outline-none"
                           v-model="catholic.streetAdditionalAddress"
                           type="text">
                  </div>
                  <div class="mb-6 md:flex">
                    <div class="flex-grow w-1/12 pr-2">
                      <label class="block text-md leading-6 mb-2" for="">Postleitzahl</label>
                      <input class="block w-full p-4 font-heading text-gray-900 placeholder-gray-300 bg-gray-50 rounded outline-none"
                             v-model="catholic.postalAddress"
                             type="text"
                             placeholder="3000">
                    </div>
                    <div class="flex-grow">
                      <label class="block text-md leading-6 mb-2" for="">Ort</label>
                      <input class="block w-full p-4 font-heading text-gray-900 placeholder-gray-300 bg-gray-50 rounded outline-none"
                             v-model="catholic.locationAddress"
                             type="text"
                             placeholder="Bern">
                    </div>
                  </div>
                </div>

                <!-- Reform -->
                <div class="reform p-8 mt-8 border" v-if="formData.isReform">
                  <div class="mb-8">
                    <p>
                      Du kannst die Adressfelder leer lassen und nachtr&auml;glich hinzuf&uuml;gen, wenn du die Email
                      mit dem
                      Austrittsschreiben von uns erhalten hast.
                    </p>
                  </div>
                  <h5 class="uppercase mb-8">Reformierte Kirchgemeinde</h5>
                  <div class="mb-4">
                    <label class="block text-md leading-6 mb-2" for="">Strasse und Nr.</label>
                    <input class="block w-full p-4 font-heading text-gray-900 placeholder-gray-300 bg-gray-50 rounded outline-none"
                           v-model="reform.streetAddress"
                           type="text"
                           placeholder="Reform. Kirchenstrasse 13">
                  </div>
                  <div class="mb-6">
                    <label class="block text-md leading-6 mb-2" for="">Addresszusatz</label>
                    <input class="block w-full p-4 font-heading text-gray-900 placeholder-gray-300 bg-gray-50 rounded outline-none"
                           v-model="reform.streetAdditionalAddress"
                           type="text">
                  </div>
                  <div class="mb-6 md:flex">
                    <div class="flex-grow w-1/12  pr-2">
                      <label class="block text-md leading-6 mb-2" for="">Postleitzahl</label>
                      <input class="block w-full p-4 font-heading text-gray-900 placeholder-gray-300 bg-gray-50 rounded outline-none"
                             v-model="reform.postalAddress"
                             type="text"
                             placeholder="3000">
                    </div>
                    <div class="md:flex-grow">
                      <label class="block text-md leading-6 mb-2" for="">Ort</label>
                      <input class="block w-full p-4 font-heading text-gray-900 placeholder-gray-300 bg-gray-50 rounded outline-none"
                             v-model="reform.locationAddress"
                             type="text"
                             placeholder="Bern">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Step 5 (Summary) -->
            <div v-if="isStep5" class="step5">

              <div class="flex flex-wrap -mx-4 mt-16">
                <!--                <div class="w-full lg:w-1/3 px-4">-->
                <!--                  <ul>-->
                <!--                    <li class="flex items-center mb-4">-->
                <!--                      <div class="w-2 py-px bg-green-500 mr-4"></div>-->
                <!--                      <a class="font-heading text-lg font-medium text-green-500" href="#">Sheridan</a>-->
                <!--                    </li>-->
                <!--                    <li class="flex items-center mb-4"><a class="font-heading text-lg font-medium" href="#">Neonic</a>-->
                <!--                    </li>-->
                <!--                    <li class="flex items-center mb-4"><a class="font-heading text-lg font-medium" href="#">Torf</a>-->
                <!--                    </li>-->
                <!--                    <li class="flex items-center mb-4"><a class="font-heading text-lg font-medium" href="#">Klakier</a>-->
                <!--                    </li>-->
                <!--                  </ul>-->
                <!--                </div>-->


                <div class="w-full px-4 border">

                  <!-- Person -->
                  <div class="relative h-88 px-8 mx-auto sm:pl-10 py-8 border-b-1 mx-6">
                    <div class="relative max-w-xs">
                      <div class="mb-12">
                        <PersonSummary class=""
                                       :element="person"
                                       headline="Deine Daten"/>
                      </div>
                      <a class="group inline-flex items-center" href="#">
                        <span class="mr-4 text-sm" @click="prev(1)">Bearbeiten</span>
                        <div class="flex items-center justify-center w-5 h-5 rounded-full bg-green-500 group-hover:bg-green-600">
                          <svg width="12"
                               height="12"
                               viewbox="0 0 12 12"
                               fill="none"
                               xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.5 6H9.5M9.5 6L6.5 3M9.5 6L6.5 9"
                                  stroke="white"
                                  stroke-width="1.5"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"></path>
                          </svg>
                        </div>
                      </a>
                    </div>
                  </div>

                  <!-- Ehepartner -->
                  <div v-if="formData.hatEhepartner" class="relative h-88 px-8 mx-auto sm:pl-10 py-8 border-b-1 mx-6">
                    <div class="relative max-w-xs">
                      <div class="mb-12">
                        <PersonSummary :element="partner" headline="Ehepartner"/>
                      </div>
                    </div>
                    <a class="group inline-flex items-center" href="#">
                      <span class="mr-4 text-sm" @click="prev(2)">Bearbeiten</span>
                      <div class="flex items-center justify-center w-5 h-5 rounded-full bg-green-500 group-hover:bg-green-600">
                        <svg width="12"
                             height="12"
                             viewbox="0 0 12 12"
                             fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                          <path d="M2.5 6H9.5M9.5 6L6.5 3M9.5 6L6.5 9"
                                stroke="white"
                                stroke-width="1.5"
                                stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </svg>
                      </div>
                    </a>
                  </div>

                  <!-- Children -->
                  <div v-if="formData.hasChildren" class="relative h-88 px-8 mx-auto sm:pl-10 py-8 border-b-1 mx-6">
                    <div class="relative max-w-xs">
                      <h5 class="uppercase mb-6 font-heading text-2xl mb-4">Kinder</h5>
                      <div class="mb-12"
                           v-for="(child, index) in children"
                           :key="index">
                        <PersonSummary :element="child"/>
                      </div>
                    </div>
                    <a class="group inline-flex items-center" href="#">
                      <span class="mr-4 text-sm" @click="prev(3)">Bearbeiten</span>
                      <div class="flex items-center justify-center w-5 h-5 rounded-full bg-green-500 group-hover:bg-green-600">
                        <svg width="12"
                             height="12"
                             viewbox="0 0 12 12"
                             fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                          <path d="M2.5 6H9.5M9.5 6L6.5 3M9.5 6L6.5 9"
                                stroke="white"
                                stroke-width="1.5"
                                stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </svg>
                      </div>
                    </a>
                  </div>

                  <!-- Address -->
                  <div class="relative h-88 px-8 mx-auto sm:pl-10 py-8 border-b-1 mx-6">
                    <div class="relative max-w-xs">
                      <div class="mb-12">
                        <AddressSummary :element="person" headline="Deine Adresse"/>
                      </div>
                    </div>
                    <a class="group inline-flex items-center" href="#">
                      <span class="mr-4 text-sm" @click="prev(1)">Bearbeiten</span>
                      <div class="flex items-center justify-center w-5 h-5 rounded-full bg-green-500 group-hover:bg-green-600">
                        <svg width="12"
                             height="12"
                             viewbox="0 0 12 12"
                             fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                          <path d="M2.5 6H9.5M9.5 6L6.5 3M9.5 6L6.5 9"
                                stroke="white"
                                stroke-width="1.5"
                                stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </svg>
                      </div>
                    </a>
                  </div>

                  <!-- Catholic church -->
                  <div v-if="!formData.payment && formData.isCatholic"
                       class="relative h-88 px-8 mx-auto sm:pl-10 py-8 border-b-1 mx-6">
                    <div class="relative">
                      <div class="mb-12">
                        <AddressSummary :element="catholic" headline="Katholische Kirchgemeinde"/>
                      </div>
                    </div>
                    <a class="group inline-flex items-center" href="#">
                      <span class="mr-4 text-sm" @click="prev(null)">Bearbeiten</span>
                      <div class="flex items-center justify-center w-5 h-5 rounded-full bg-green-500 group-hover:bg-green-600">
                        <svg width="12"
                             height="12"
                             viewbox="0 0 12 12"
                             fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                          <path d="M2.5 6H9.5M9.5 6L6.5 3M9.5 6L6.5 9"
                                stroke="white"
                                stroke-width="1.5"
                                stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </svg>
                      </div>
                    </a>
                  </div>

                  <!-- Reform church -->
                  <div v-if="!formData.payment && formData.isReform"
                       class="relative h-88 px-8 mx-auto sm:pl-10 py-8 border-b-1 mx-6">
                    <div class="relative">
                      <div class="mb-12">
                        <AddressSummary :element="reform" headline="Reformierte Kirchgemeinde"/>
                      </div>
                    </div>
                    <a class="group inline-flex items-center" href="#">
                      <span class="mr-4 text-sm" @click="prev(null)">Bearbeiten</span>
                      <div class="flex items-center justify-center w-5 h-5 rounded-full bg-green-500 group-hover:bg-green-600">
                        <svg width="12"
                             height="12"
                             viewbox="0 0 12 12"
                             fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                          <path d="M2.5 6H9.5M9.5 6L6.5 3M9.5 6L6.5 9"
                                stroke="white"
                                stroke-width="1.5"
                                stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </svg>
                      </div>
                    </a>
                  </div>

                  <!-- Payment -->
                  <div class="relative h-88 px-8 mx-auto sm:pl-10 py-8 mx-6">
                    <div class="relative max-w-xs">
                      <div class="mb-4">
                        <h5 class=" mb-8 font-heading text-2xl mb-4">Kosten</h5>
                        <p v-if="!formData.payment">Gratis</p>
                        <div v-if="formData.payment">
                          <p>15 Franken</p>
                          <div class="mb-6 mt-6 ">
                            <div class="mb-2">
                              <label> <span>Bezahlen mit</span><br/>
                                <input
                                    class="mt-4 mr-2"
                                    @click="optionPaymentClicked"
                                    checked
                                    type="radio"
                                    name="paymentMethod"
                                    value="stripe">
                                <span class="ml-1">Kreditkarte, ApplePay, Google Pay etc.</span>
                              </label>
                            </div>

                            <!--                            <div class="my-8">-->
                            <!--                              <label>-->
                            <!--                                <input-->
                            <!--                                    @click="optionPaymentClicked"-->
                            <!--                                    type="radio"-->
                            <!--                                    name="paymentMethod"-->
                            <!--                                    value="Twint">-->
                            <!--                                <span class="ml-1">Twint</span>-->
                            <!--                              </label>-->
                            <!--                            </div>-->
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>

                </div>


              </div>
            </div>


            <!-- Buttons -->
            <div class="flex mt-14 mb-20">
              <!-- Zurück -->
              <div class="w-1/2 pr-32 text-left">
                <button class="w-full block py-4 px-6 text-center font-heading font-medium text-base text-white bg-green-500 hover:bg-green-600 border border-green-500 hover:border-green-600 rounded-sm transition duration-200"
                        name="back"
                        @click.prevent="prev(null)">
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
                  <span v-if="!formData.payment">Abschicken</span>
                  <span v-if="formData.payment">Bestellen</span>
                </button>
              </div>
            </div>


          </form>
        </div>
      </div>
    </section>

  </div>
</template>

<script>
import Step1 from './Form/Step1.vue'
import Step2 from './Form/Step2.vue'
import Step3 from './Form/Step3.vue'
import PersonSummary from './Form/PersonSummary.vue';
import AddressSummary from "./Form/AddressSummary.vue";

export default {
  components: {
    Step1,
    Step2,
    Step3,
    PersonSummary,
    AddressSummary
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
        payment: null,
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
    optionPaymentClicked(event) {
    },
    prev(goToStep) {
      this.errors = [];
      window.scrollTo({
        top: 0,
        behavior: "smooth"
      });
      this.formData.payment = null;
      if (goToStep) {
        this.currentStep = goToStep;
        return
      }
      this.currentStep--;
    },
    next() {
      this.errors = [];
      window.scrollTo({
        top: 0,
        behavior: "smooth"
      });
      this.currentStep++;
    },
    submit() {
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
    },
    optionClicked(event) {
      this.formData.payment = null;
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
    checkForm: function (e) {
      this.errors = [];
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
          this.person.geburtsdatum = this.person.geburtsdatum.trim();
          if (!/^\d{1,2}(\.)\d{1,2}(\.)\d{4}$/.test(this.person.geburtsdatum)) {
            this.errors.push("Geburtsdatum Format ist nicht korrekt. Format Tag.Monat.Jahr erforderlich.");
          }
        }

        if (!this.person.konfession) {
          this.errors.push("Bitte wähle deine Konfession.");
        }

        if (this.person.taufdatum) {
          this.person.taufdatum = this.person.taufdatum.trim();
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
          this.person.postalAddress = this.person.postalAddress.trim();
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
          this.partner.geburtsdatum = this.partner.geburtsdatum.trim();
          if (!/^\d{1,2}(\.)\d{1,2}(\.)\d{4}$/.test(this.partner.geburtsdatum)) {
            this.errors.push("Geburtsdatum Format ist nicht korrekt. Format Tag.Monat.Jahr erforderlich.");
          }
        }

        if (!this.partner.konfession) {
          this.errors.push("Bitte wähle die Konfession.");
        }

        if (this.partner.taufdatum) {
          this.partner.taufdatum = this.partner.taufdatum.trim();
          if (!/^\d{1,2}(\.)\d{1,2}(\.)\d{4}$/.test(this.partner.taufdatum)) {
            this.errors.push("Taufdatum Format ist nicht korrekt. Format Tag.Monat.Jahr erforderlich.");
          }
        }
      }

      // Kinder
      if (this.isStep3 && this.formData.hasChildren) {
        for (let i = 0; i < this.children.length; i++) {
          let childrenCount = i + 1;
          if (!this.children[i].vorname) {
            this.errors.push(childrenCount + ". Kind: Vorname erforderlich.");
          }
          if (!this.children[i].nachname) {
            this.errors.push(childrenCount + ". Kind: Nachname erforderlich.");
          }
          if (!this.children[i].geburtsdatum) {
            this.errors.push(childrenCount + ". Kind: Geburtsdatum erforderlich.");
          }
          if (this.children[i].geburtsdatum) {
            this.children[i].geburtsdatum = this.children[i].geburtsdatum.trim();
            if (!/^\d{1,2}(\.)\d{1,2}(\.)\d{4}$/.test(this.children[i].geburtsdatum)) {
              this.errors.push(childrenCount + ". Kind. Geburtsdatum Format ist nicht korrekt. Format Tag.Monat.Jahr erforderlich.");
            }
          }

          if (!this.children[i].konfession) {
            this.errors.push(childrenCount + ". Kind: Bitte wähle die Konfession.");
          }

          if (this.children[i].taufdatum) {
            this.children[i].taufdatum = this.children[i].taufdatum.trim();
            if (!/^\d{1,2}(\.)\d{1,2}(\.)\d{4}$/.test(this.partner.taufdatum)) {
              this.errors.push(childrenCount + ". Kind: Taufdatum Format ist nicht korrekt. Format Tag.Monat.Jahr erforderlich.");
            }
          }
        }
      }

      if (this.isStep4) {
        if (this.formData.payment === null || this.formData.payment === 'undefined') {
          this.errors.push("Wähle bitte eine Option.");
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
  }
}
</script>