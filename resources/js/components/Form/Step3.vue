<template>
  <div v-if="isStep3" class="step3">
    <div class="mb-6">
      <label>
        <input type="checkbox" v-model="formData.kirchgemeindeSpaeterEingeben" name="kirchgemeindeSpaeterEingeben"
               value="example value">
        <span class="ml-1">Adresse der Kirchgemeinde später eingeben</span>
      </label>
    </div>

    <div v-if="formData.kirchgemeindeSpaeterEingeben">
      <div class="mb-12">
        Falls dir die Adresse der Kirchgemeinde bereits bekannt ist, kannst du diese hier erfassen. Dann wird die
        Adresse bereits im Dokument hinterlegt sein. Du kannst jedoch die Adresse auch später, nach Erhalt des
        Austrittsschreiben, in das Dokument einfügen. In der Email welche du mit dem Schreiben erhältst wird beschrieben
        wie du das Dokument einfach bearbeiten kannst.
      </div>
    </div>

    <div v-if="!formData.kirchgemeindeSpaeterEingeben">
      <div class="mb-6">
        <label class="required block text-md leading-6 mb-2" for="">Anschrift</label>
        <input class="block w-full p-4 font-heading text-gray-900 placeholder-gray-300 bg-gray-50 rounded outline-none"
               v-model="church.anschrift" name="anschrift" type="text">
      </div>

      <div class="mb-6">
        <label class="block text-md leading-6 mb-2" for="">Addresszusatz</label>
        <input class="block w-full p-4 font-heading text-gray-900 placeholder-gray-300 bg-gray-50 rounded outline-none"
               v-model="church.streetAdditionalAddress" type="text">
      </div>

      <div class="address mb-6">
        <label class="required block text-md leading-6 mb-2" for="">Strasse und Nr.</label>
        <input class="block w-full p-4 font-heading text-gray-900 placeholder-gray-300 bg-gray-50 rounded outline-none"
               v-model="church.streetAddress" type="text" placeholder="Musterstrasse 24b">
      </div>

      <div class="mb-6 md:flex">
        <div class="flex-grow sm:w-1/12 pr-2">
          <label class="required block text-md leading-6 mb-2" for="">Postleitzahl</label>
          <input
            class="block w-full p-4 font-heading text-gray-900 placeholder-gray-300 bg-gray-50 rounded outline-none"
            v-model="church.postalAddress" type="text" placeholder="3000">
        </div>
        <div class="flex-grow">
          <label class="required block text-md leading-6 mb-2" for="">Ort</label>
          <input
            class="block w-full p-4 font-heading text-gray-900 placeholder-gray-300 bg-gray-50 rounded outline-none"
            v-model="church.locationAddress" type="text" placeholder="Bern">
        </div>
      </div>

    </div>
  </div>
</template>

<script>
export default {
  props: ['isStep3', 'church', 'formData'],
};

</script>
