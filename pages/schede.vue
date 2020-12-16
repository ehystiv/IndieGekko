<template>
  <v-row align="start" justify="center">
    <v-col cols="12">
      <v-banner elevation="10" rounded="lg" class="text-center gradient"
        ><span class="white--text">SCHEDE ALLEVAMENTO</span></v-banner
      >
    </v-col>
    <v-col cols="12">
      <v-row
        align="center"
        justify="center"
        v-for="scheda in schede"
        :key="scheda.tipo"
      >
        <v-col cols="12" sm="12" md="12" lg="4" xl="4">
          <v-img
            alt="immagine"
            :src="`/immagini/schede/${scheda.immagine}`"
          ></v-img>
        </v-col>
        <v-col cols="12" sm="12" md="12" lg="8" xl="8">
          <v-card rounded="lg" elevation="10" color="black">
            <v-card-title>{{ scheda.razza }}</v-card-title>
            <v-card-text>
              <p>
                <span class="title primary--text">Origini</span> <br />
                <span class="body-2 white--text" v-html="scheda.origini"></span>
              </p>
              <p>
                <span class="title primary--text">Descrizione fisica</span>
                <br />
                <span
                  class="body-2 white--text"
                  v-html="scheda.descrizione_fisica"
                ></span>
              </p>
              <p>
                <span class="title primary--text">Terrario</span> <br />
                <span
                  class="body-2 white--text"
                  v-html="scheda.terrario"
                ></span>
              </p>
              <p>
                <span class="title primary--text">Alimentazione</span> <br />
                <span
                  class="body-2 white--text"
                  v-html="scheda.alimentazione"
                ></span>
              </p>
            </v-card-text>
          </v-card>
        </v-col>
      </v-row>
    </v-col>
  </v-row>
</template>

<script>
export default {
  head() {
    return {
      title: 'Schede tecniche',
    }
  },

  async asyncData({ $axios }) {
    const schede = await $axios.$get('/data/schede.json')
    return { schede }
  },
}
</script>

<style></style>
