<template>
  <v-row align="start" justify="center">
    <v-col cols="12">
      <v-banner
        class="gradient white--text text-center"
        elevation="10"
        rounded="lg"
        >DISPONIBILI</v-banner
      >
    </v-col>
    <v-col
      v-if="!disponibili || disponibili.length === 0"
      cols="12"
      sm="12"
      md="10"
      lg="6"
    >
      <v-card rounded="lg" elevation="10">
        <v-card-title>Nessun geco disponibile! 😢</v-card-title>
        <v-card-subtitle
          >Continua a seguirci per vedere quando torneranno disponbili!
          😄</v-card-subtitle
        >
      </v-card>
    </v-col>
    <v-col
      v-for="disponibile in disponibili"
      :key="disponibile.nome"
      cols="12"
      sm="12"
      md="6"
      lg="4"
    >
      <v-card elevation="10" rounded="lg">
        <v-img
          alt="immagine"
          :src="`/immagini/disponibili/${disponibile.immagine}`"
          height="300"
        ></v-img>
        <v-card-title>{{ disponibile.nome }}</v-card-title>
        <v-card-text>
          <p>Razza: {{ disponibile.razza }}</p>
          <p>Morph: {{ disponibile.morph }}</p>
        </v-card-text>
        <v-card-actions>
          <v-spacer />
          <v-btn
            color="primary"
            class="black--text"
            @click="bookThis(disponibile.nome)"
          >
            <v-icon left>far fa-edit</v-icon>Prenota</v-btn
          >
        </v-card-actions>
      </v-card>
    </v-col>
  </v-row>
</template>

<script>
export default {
  head() {
    return {
      title: 'Disponibili',
    }
  },

  methods: {
    bookThis(name) {
      this.$router.push({
        path: 'prenota?&geco=' + name,
      })
    },
  },

  async asyncData({ $axios }) {
    const disponibili = await $axios.$get('/data/disponibili.json')

    return { disponibili }
  },
}
</script>

<style></style>
