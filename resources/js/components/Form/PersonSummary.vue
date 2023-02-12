<template>
  <div>
    <h5 class="uppercase mb-6">{{ headline }}</h5>
    <table>
      <tr>
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
      <tr>
        <td>Taufdatum</td>
        <td>{{ element.taufdatum ? element.taufdatum : '-' }}</td>
      </tr>
      <tr>
        <td>Taufort</td>
        <td>{{ element.taufort ? element.taufort : '-' }}</td>
      </tr>
    </table>

    <table v-if="element.streetAddress" class="mt-6">
      <tr>
        <td class="address">Adresse<span>Adree</span></td>
        <td>
          {{ element.streetAddress }}
          <br v-if="element.streetAdditionalAddress" />
          {{ element.streetAdditionalAddress }}
          <br />
          {{ element.postalAddress }}&nbsp;{{element.locationAddress}}
        </td>
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
    }
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