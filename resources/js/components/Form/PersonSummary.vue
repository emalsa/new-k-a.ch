<template>
  <div>
    <h5 class="mb-6 font-heading text-2xl">{{ headline }}</h5>
    <table class="leading-7">
      <tr v-if="element.email">
        <td>Email</td>
        <td>{{ element.email }}</td>
      </tr>
      <tr v-if="element.vorname">
        <td>Vorname</td>
        <td>{{ element.vorname }}</td>
      </tr>
      <tr>
        <td>Nachname</td>
        <td>{{ element.nachname }}</td>
      </tr>
      <tr>
        <td>Geburtsdatum</td>
        <td>{{ element.geburtsdatum }}</td>
      </tr>
      <tr>
        <td>Konfession</td>
        <td>{{ konfessionName }}</td>
      </tr>

      <tr v-if="isChild">
        <td>Unterschreiben</td>
        <td>{{ element.sign ? 'Ja' : 'Nein' }}</td>
      </tr>

      <tr>
        <td>Taufdatum</td>
        <td>{{ element.taufdatum ? element.taufdatum : '-' }}</td>
      </tr>
      <tr>
        <td>Taufort</td>
        <td>{{ element.taufort ? element.taufort : '-' }}</td>
      </tr>
    </table>
  </div>

</template>

<script>
export default {
  props: ['element', 'headline'],
  computed: {
    konfessionName() {
      return this.$props.element.konfession === 'kath' ? 'Römisch-Katholisch' : 'Evangelisch-Reformiert';
    },
    isChild() {
      return this.$props.element.hasOwnProperty('sign');
    },
  }
}
</script>

<style>

.address span {
  color: white !important;
}

table td:first-child {
  padding-right: 25px;
  padding-bottom: 4px;
}

table td:last-child {
  font-style: italic;
}
</style>