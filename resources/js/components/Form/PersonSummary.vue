<template>
  <div>
    <table>
      <tr>
        <td>Vorname:</td>
        <td>{{ element.vorname }}</td>
      </tr>
      <tr>
        <td>Nachname:</td>
        <td>{{ element.nachname }}</td>
      </tr>
      <tr>
        <td>Geburtsdatum:</td>
        <td>{{ element.geburtsdatum }}</td>
      </tr>
      <tr>
        <td>Konfession:</td>
        <td>{{ konfessionName }}</td>
      </tr>
      <tr>
        <td>Taufdatum:</td>
        <td>{{ element.taufdatum }}</td>
      </tr>
      <tr>
        <td>Taufort:</td>
        <td>{{ element.taufort }}</td>
      </tr>
    </table>
  </div>

</template>

<script>
export default {
  props: ['element'],
  computed: {
    konfessionName() {
      return 'the conn';
    }
  }
}
</script>