<template>
  <div v-if="isStep1" class="step1">
    <div class="mb-12">Diese Daten werden benötigt um das Austrittschreiben korrekt zu erstellen.</div>
    <div class="mb-12">
      <label class="required block text-md leading-6 mb-2" for="">Email</label>
      <input
        class="block w-full p-4 mb-2 font-heading text-gray-900 placeholder-gray-300 bg-gray-50 rounded outline-none"
        v-model="person.email"
        name="email"
        type="email"
        placeholder="Deine Email">
      <!--            <span class="text-[15px] text-gray-500">Hierhin schicken wir das Austrittsschreiben.</span>-->
      <div class="mb-10">
        <label class="required block text-md leading-6 mb-2" for="">Geburtsdatum</label>
        <input
          class="block w-full p-4 mb-2 font-heading text-gray-900 placeholder-gray-300 bg-gray-50 rounded outline-none"
          v-model="person.geburtsdatum"
          type="text"
          placeholder="Dein Geburtsdatum, Beispiel: 4.12.1967">
        <span class="text-[15px] text-gray-500">Beispiel: <i>4.12.1966</i> oder <i>3.3.1922</i></span>
      </div>
      <div class="mb-6">
        <label class="required block text-md leading-6 mb-2" for="">Meine Konfession</label>
        <div class="relative">
          <select id="konfession"
                  class="appearance-none block w-full p-4 font-heading text-gray-900 placeholder-gray-300 bg-gray-50 rounded outline-none"
                  v-model="person.konfession">
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

    </div>
    <div class="mb-6">
      <label>
        <input type="checkbox"
               v-model="formData.adressDatenSpaeterEingeben"
               name="adressDatenSpaeterEingeben"
               value="example value">
        <span class="ml-1">Ich möchte meine Adresse später eingeben</span>
      </label>
    </div>

    <div v-if="formData.adressDatenSpaeterEingeben">
      <div class="mb-12">
        Du kannst deine Adresse auch später, nach Erhalt des Austrittsschreiben, in das Dokument einfügen.
        In der Email, welche du mit dem Schreiben erhalten wirst, wird beschrieben wie du das Dokument
        bearbeiten kannst.
      </div>

    </div>

    <div v-if="!formData.adressDatenSpaeterEingeben">
      <div class="mb-6">
        <label class="required block text-md leading-6 mb-2" for="">Vorname</label>
        <input
          class="block w-full p-4 font-heading text-gray-900 placeholder-gray-300 bg-gray-50 rounded outline-none"
          v-model="person.vorname"
          name="vorname"
          type="text"
          placeholder="Dein Vorname">
      </div>
      <div class="mb-6">
        <label class="required block text-md leading-6 mb-2" for="">Nachname</label>
        <input
          class="block w-full p-4 font-heading text-gray-900 placeholder-gray-300 bg-gray-50 rounded outline-none"
          v-model="person.nachname"
          type="text"

          placeholder="Dein Nachname">
      </div>

      <!-- Address -->
      <div class="address mt-16">
        <div class="mb-6">
          <label class="required block text-md leading-6 mb-2" for="">Strasse und Nr.</label>
          <input
            class="block w-full p-4 font-heading text-gray-900 placeholder-gray-300 bg-gray-50 rounded outline-none"
            v-model="person.streetAddress"
            type="text"
            placeholder="Musterstrasse 24b">
        </div>

        <div class="mb-6">
          <label class="block text-md leading-6 mb-2" for="">Addresszusatz</label>
          <input
            class="block w-full p-4 font-heading text-gray-900 placeholder-gray-300 bg-gray-50 rounded outline-none"
            v-model="person.streetAdditionalAddress"
            type="text">
        </div>

        <div class="mb-6 md:flex">
          <div class="flex-grow sm:w-1/12 pr-2">
            <label class="required block text-md leading-6 mb-2" for="">Postleitzahl</label>
            <input
              class="block w-full p-4 font-heading text-gray-900 placeholder-gray-300 bg-gray-50 rounded outline-none"
              v-model="person.postalAddress"
              type="text"
              placeholder="3000">
          </div>
          <div class="flex-grow">
            <label class="required block text-md leading-6 mb-2" for="">Ort</label>
            <input
              class="block w-full p-4 font-heading text-gray-900 placeholder-gray-300 bg-gray-50 rounded outline-none"
              v-model="person.locationAddress"
              type="text"
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
          <span class="ml-1">Taufdatum oder Taufort ist bekannt (optional)</span>
        </label>
        <!-- Taufort/datum -->
        <div v-if="person.taufDatumBekanntPerson" class="mt-12 mb-6">
          <div class="mb-6">
            <label class="block text-md leading-6 mb-2" for="">Taufdatum</label>
            <input
              class="block w-full p-4 font-heading placeholder-gray-300 bg-gray-50 rounded outline-none"
              v-model="person.taufdatum"
              name="taufdatum"
              type="text"
              placeholder="Taufdatum, Beispiel: 4.12.1967">
            <span
              class="block text-md w-full py-4 font-heading rounded outline-none">Beispiel: <i>4.12.1966</i> oder <i>3.3.1922</i></span>
          </div>
          <div class="mb-6">
            <label class="block text-md leading-6 mb-2" for="">Taufort</label>
            <input
              class="block w-full p-4 font-heading placeholder-gray-300 bg-gray-50 rounded outline-none"
              v-model="person.taufort"
              type="text"
              placeholder="Taufort">
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ['isStep1', 'person', 'formData'],
};

</script>
