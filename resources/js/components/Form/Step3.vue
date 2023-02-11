<template>
  <div v-if="isStep3" class="step3">
    <!--Taufdatum checkbox -->
    <div class="my-12">
      <label>
        <!--               @click="clickHasChildren"-->
        <input type="checkbox"
               v-model="hasChildren"
               name="hasChildren"
               value="example value">
        <span class="ml-1">Meine Kinder wollen auch austreten. (Unter 16 Jahre)</span>
      </label>
    </div>

    <div v-if="hasChildren">
      <div class="border border-sky-500 px-10 pt-10"
           v-for="(childElement, childrenCount) in children"
           v-bind:key="childrenCount">
        <div>
          <h3 class="font-heading mt-2 text-3xl float-left">{{ childrenCount + 1 }}. Kind</h3>
          <button @click="removeChild(childrenCount)"
                  class="mt-1.5 py-1 px-2  text-base text-white bg-red-500 hover:bg-red-600 border border-red-500 hover:border-red-600 rounded-sm transition duration-200 float-right">
            Entfernen
          </button>
        </div>
        <div class="mb-4 pt-20">
          <label class="block text-md leading-6 mb-2" for="">Vorname</label>
          <input class="block w-full p-4 font-heading text-gray-900 placeholder-gray-300 bg-gray-50 rounded outline-none"
                 v-model="children[childrenCount].vorname"
                 type="text"
                 required
                 placeholder="Vorname">
        </div>
        <div class="mb-4">
          <label class="block text-md leading-6 mb-2" for="">Nachname</label>
          <input class="block w-full p-4 font-heading text-gray-900 placeholder-gray-300 bg-gray-50 rounded outline-none"
                 v-model="children[childrenCount].nachname"
                 type="text"
                 required
                 placeholder="Nachname">
        </div>
        <div class="mb-6">
          <label class="block text-md leading-6 mb-2" for="">Geburtsdatum</label>
          <input class="block w-full p-4 font-heading text-gray-900 placeholder-gray-300 bg-gray-50 rounded outline-none"
                 v-model="children[childrenCount].geburtsdatum"
                 type="text"
                 required
                 placeholder="Geburtsdatum, Beispiel: 4.12.1967">
          <span class="block text-md w-full py-4 font-heading rounded outline-none">Beispiel: <i>4.12.1966</i> oder <i>3.3.1922</i></span>
        </div>
        <div class="mb-6">
          <label class="block text-md leading-6 mb-2" for="">Konfession</label>
          <div class="relative">
            <select class="appearance-none block w-full p-4 font-heading text-gray-900 placeholder-gray-300 bg-gray-50 rounded outline-none"
                    v-model="children[childrenCount].konfession"
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
                   v-model="children[childrenCount].taufDatumBekanntChild"
                   name="taufDatumBekanntPartner"
                   value="example value">
            <span class="ml-1">Das Taufdatum oder Taufort ist bekannt</span>
          </label>
        </div>
        <!-- Taufort/datum -->
        <div v-if="children[childrenCount].taufDatumBekanntChild" class="mt-12 mb-6">
          <div class="mb-6">
            <label class="block text-md leading-6 mb-2" for="">Taufdatum</label>
            <input class="block w-full p-4 font-heading text-gray-300 placeholder-gray-300 bg-gray-50 rounded outline-none"
                   v-model="children[childrenCount].taufdatum"
                   type="text"
                   placeholder="Taufdatum, Beispiel: 4.12.1967">
            <span class="block text-md w-full py-4 font-heading rounded outline-none">Beispiel: <i>4.12.1966</i> oder <i>3.3.1922</i></span>
          </div>
          <div class="mb-6">
            <label class="block text-md leading-6 mb-2" for="">Taufort</label>
            <input class="block w-full p-4 font-heading text-gray-300 placeholder-gray-300 bg-gray-50 rounded outline-none"
                   v-model="children[childrenCount].taufort"
                   type="text"
                   placeholder="Taufort">
          </div>
        </div>
      </div>
      <button @click="addChild"
              class="mt-10 w-full block py-4 px-6 text-center text-base text-white bg-blue-400 hover:bg-blue-600 border border-blue-400 hover:border-blue-600 rounded-sm transition duration-200 ">
        Weiteres Kind hinzuf&uuml;gen
      </button>
    </div>

  </div>
</template>

<script>
export default {
  props: ['isStep3', 'children', 'hasChildren'],
  methods: {
    removeChild(count) {
      console.log('Remove' + count)
      this.children.splice(count, 1)
    },
    addChild() {
      this.children.push({});
    },
    clickHasChildren() {
      this.children.push({});
    },
  }
}

</script>