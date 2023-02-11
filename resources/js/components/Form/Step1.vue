<template>
  <div v-if="isStep1" class="step1">
    <div class="mb-4">
      <label class="block text-md leading-6 mb-2" for="">Email</label>
      <input class="block w-full p-4 font-heading text-gray-900 placeholder-gray-300 bg-gray-50 rounded outline-none"
             v-model="person.email"
             name="email"
             type="email"
             required
             placeholder="Deine Email">
      <span class="block text-md w-full py-4 font-heading rounded outline-none">An diese Email schicken wir das Austrittsschreiben.</span>

    </div>
    <div class="mb-4">
      <label class="block text-md leading-6 mb-2" for="">Vorname</label>
      <input class="block w-full p-4 font-heading text-gray-900 placeholder-gray-300 bg-gray-50 rounded outline-none"
             v-model="person.vorname"
             name="vorname"
             type="text"
             required
             placeholder="Dein Vorname">
    </div>
    <div class="mb-4">
      <label class="block text-md leading-6 mb-2" for="">Nachname</label>
      <input class="block w-full p-4 font-heading text-gray-900 placeholder-gray-300 bg-gray-50 rounded outline-none"
             v-model="person.nachname"
             type="text"
             required
             placeholder="Dein Nachname">
    </div>
    <div class="mb-6">
      <label class="block text-md leading-6 mb-2" for="">Geburtsdatum</label>
      <input class="block w-full p-4 font-heading text-gray-900 placeholder-gray-300 bg-gray-50 rounded outline-none"
             v-model="person.geburtsdatum"
             type="text"
             required
             placeholder="Dein Geburtsdatum, Beispiel: 4.12.1967">
      <span class="block text-md w-full py-4 font-heading rounded outline-none">Beispiel: <i>4.12.1966</i> oder <i>3.3.1922</i></span>
    </div>
    <div class="mb-6">
      <label class="block text-md leading-6 mb-2" for="">Meine Konfession</label>
      <div class="relative">
        <select id="konfession"
                class="appearance-none block w-full p-4 font-heading text-gray-900 placeholder-gray-300 bg-gray-50 rounded outline-none"
                v-model="person.konfession"
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

    <!-- Address -->
    <div class="address mt-16">
      <h4 class="mb-6 max-w-xs font-heading text-3xl mt-2">Deine Adresse</h4>
      <div class="mb-6">
        <label class="block text-md leading-6 mb-2" for="">Strasse und Nr.</label>
        <input class="block w-full p-4 font-heading text-gray-900 placeholder-gray-300 bg-gray-50 rounded outline-none"
               v-model="person.streetAddress"
               type="text"
               required
               placeholder="Musterstrasse 24b">
      </div>

      <div class="mb-6">
        <label class="block text-md leading-6 mb-2" for="">Addresszusatz</label>
        <input class="block w-full p-4 font-heading text-gray-900 placeholder-gray-300 bg-gray-50 rounded outline-none"
               v-model="person.streetAdditionalAddress"
               type="text">
      </div>

      <div class="mb-6 flex">
        <div class="flex-grow w-1/12 pr-2">
          <label class="block text-md leading-6 mb-2" for="">Postleitzahl</label>
          <input class="block w-full p-4 font-heading text-gray-900 placeholder-gray-300 bg-gray-50 rounded outline-none"
                 v-model="person.postalAddress"
                 type="text"
                 required
                 placeholder="3000">
        </div>
        <div class="flex-grow">
          <label class="block text-md leading-6 mb-2" for="">Ort</label>
          <input class="block w-full p-4 font-heading text-gray-900 placeholder-gray-300 bg-gray-50 rounded outline-none"
                 v-model="person.locationAddress"
                 type="text"
                 required
                 placeholder="Bern">
        </div>
      </div>

    </div>
    <!--Taufdatum checkbox -->
    <div class="my-12">
      <label>
        <input type="checkbox"
               v-model="person.taufDatumBekanntPerson"
               name="taufDatumBekanntPerson"
               value="example value">
        <span class="ml-1">Ich kenne mein Taufdatum oder Taufort</span>
      </label>
      <!-- Taufort/datum -->
      <div v-if="person.taufDatumBekanntPerson" class="mt-12 mb-6">
        <div class="mb-6">
          <label class="block text-md leading-6 mb-2" for="">Taufdatum</label>
          <input class="block w-full p-4 font-heading text-gray-300 placeholder-gray-300 bg-gray-50 rounded outline-none"
                 v-model="person.taufdatum"
                 name="taufdatum"
                 type="text"
                 placeholder="Taufdatum, Beispiel: 4.12.1967">
          <span class="block text-md w-full py-4 font-heading rounded outline-none">Beispiel: <i>4.12.1966</i> oder <i>3.3.1922</i></span>
        </div>
        <div class="mb-6">
          <label class="block text-md leading-6 mb-2" for="">Taufort</label>
          <input class="block w-full p-4 font-heading text-gray-300 placeholder-gray-300 bg-gray-50 rounded outline-none"
                 v-model="person.taufort"
                 type="text"
                 placeholder="Taufort">
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ['isStep1', 'person', 'formData']
}

</script>