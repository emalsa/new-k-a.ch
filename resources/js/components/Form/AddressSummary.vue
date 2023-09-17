<template>
  <div v-if="element.postalAddress">
    <h5 class="mb-6 font-heading text-2xl">{{ headline }}</h5>

    <table class="mt-4">
      <tr>
        <td v-if="element.streetAddress">
          {{ element.streetAddress ? element.streetAddress : '-' }}
          <br v-if="element.streetAdditionalAddress"/>
          {{ element.streetAdditionalAddress }}
          <br/>
          {{ element.postalAddress }}&nbsp;{{ element.locationAddress }}
        </td>
        <td v-if="!element.streetAddress">
          Nicht angegeben
        </td>
      </tr>
    </table>
  </div>

</template>

<script>
export default {
  props: ['element', 'headline'],
  computed: {},
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
