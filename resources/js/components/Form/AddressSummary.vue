<template>
  <div>
    <h5 class=" mb-8 font-heading text-2xl mb-4">{{ headline }}</h5>

    <table class="mt-6">
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