<template>
  <div v-if="isStep2" class="step2">
    <!--Taufdatum checkbox -->
    <div class="my-12">
      <label>
        <input type="checkbox"
               v-model="formData.hatEhepartner"
               name="hatEhepartner"
               value="example value">
        <span class="ml-1">Mein Ehepartner möchte auch austreten</span>
      </label>
    </div>
    <div v-if="formData.hatEhepartner">
      <div class="mb-4">
        <label class="required block text-md leading-6 mb-2" for="">Vorname</label>
        <input class="block w-full p-4 font-heading text-gray-900 placeholder-gray-300 bg-gray-50 rounded outline-none"
               v-model="partner.vorname"
               type="text"
               placeholder="Vorname">
      </div>
      <div class="mb-4">
        <label class="required block text-md leading-6 mb-2" for="">Nachname</label>
        <input class="block w-full p-4 font-heading text-gray-900 placeholder-gray-300 bg-gray-50 rounded outline-none"
               v-model="partner.nachname"
               type="text"
               placeholder="Nachname">
      </div>
      <div class="mb-6">
        <label class="required block text-md leading-6 mb-2" for="">Geburtsdatum</label>
        <input class="block w-full p-4 font-heading text-gray-900 placeholder-gray-300 bg-gray-50 rounded outline-none"
               v-model="partner.geburtsdatum"
               type="text"
               placeholder="Geburtsdatum, Beispiel: 4.12.1967">
        <span class="block text-md w-full py-4 font-heading rounded outline-none">Beispiel: <i>4.12.1966</i> oder <i>3.3.1922</i></span>
      </div>


      <div class="mb-6">
        <label class="required block text-md leading-6 mb-2" for="">Konfession</label>
        <div class="relative">
          <select class="appearance-none block w-full p-4 font-heading text-gray-900 placeholder-gray-300 bg-gray-50 rounded outline-none"
                  v-model="partner.konfession">
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
                 v-model="partner.taufDatumBekanntPartner"
                 name="taufDatumBekanntPartner"
                 value="example value">
          <span class="ml-1">Taufdatum oder Taufort ist bekannt</span>
        </label>
      </div>

      <!-- Taufort/datum -->
      <div v-if="partner.taufDatumBekanntPartner" class="mt-12 mb-6">
        <div class="mb-6">
          <label class="block text-md leading-6 mb-2" for="">Taufdatum</label>
          <input class="block w-full p-4 font-heading placeholder-gray-300 bg-gray-50 rounded outline-none"
                 v-model="partner.taufdatum"
                 type="text"
                 placeholder="Taufdatum, Beispiel: 4.12.1967">
          <span class="block text-md w-full py-4 font-heading rounded outline-none">Beispiel: <i>4.12.1966</i> oder <i>3.3.1922</i></span>
        </div>
        <div class="mb-6">
          <label class="block text-md leading-6 mb-2" for="">Taufort</label>
          <input class="block w-full p-4 font-heading placeholder-gray-300 bg-gray-50 rounded outline-none"
                 v-model="partner.taufort"
                 type="text"
                 placeholder="Taufort">
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ['isStep2', 'partner', 'formData']
}

</script>