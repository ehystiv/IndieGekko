<template>
  <v-card rounded="lg" elevation="12" v-if="links && links.length > 0">
    <v-row align="start" justify="start" class="px-3">
      <v-col cols="2" v-for="link in links" :key="link">
        <iframe
          title="shop"
          style="width: 120px; height: 240px"
          marginwidth="0"
          marginheight="0"
          scrolling="no"
          frameborder="0"
          :src="link"
        ></iframe>
      </v-col>
    </v-row>
    <v-card-text>
      <h3>Disclaimer</h3>
      <p>
        Grazie per aver scelto IndieGekko, tramite i nostri link dei nostri
        prodotti consigliati potrete comprare direttamente da Amazon ciò che vi
        serve per la cura dei vostri animali. Comprando dai nostri link ci
        aiutate a sostenere la nostra attività, i prodotti hanno il medesimo
        costo sia che li compriate dai nostri link sia da Amazon, ma tramite
        questi link Amazon ci fornisce un piccolo rimborso spese ad ogni vostro
        acquisto. Speriamo nel vostro aiuto per sostenere la pagina, ve ne
        saremo grati.
      </p>
    </v-card-text>
  </v-card>
</template>

<script>
export default {
  props: {
    links: {
      type: Array,
      default: () => [],
    },
  },
}
</script>

<style></style>
