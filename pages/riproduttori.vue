<template>
  <v-row align="start" justify="center">
    <v-col cols="12">
      <v-banner
        class="gradient white--text text-center"
        elevation="10"
        rounded="lg"
        >RIPRODUTTORI</v-banner
      >
    </v-col>
    <v-col
      cols="12"
      sm="12"
      md="6"
      lg="6"
      xl="6"
      v-for="riproduttore in riproduttori"
      :key="riproduttore.nome"
    >
      <v-card elevation="10" rounded="lg">
        <v-img
          alt="immagine"
          :src="`/immagini/riproduttori/${riproduttore.immagine}`"
          height="400"
        ></v-img>
        <v-card-title v-text="riproduttore.nome"></v-card-title>
        <v-card-subtitle class="black--text"
          ><span class="text-subtitle-1">Razza: </span
          >{{ riproduttore.razza }}</v-card-subtitle
        >
        <v-card-text class="black--text">
          <span class="text-subtitle-1">Sesso: </span
          ><span class="body-2">{{
            riproduttore.sesso + ' ' + getGenderEmoji(riproduttore.sesso)
          }}</span>
          <br />
          <span class="text-subtitle-1">Morph: </span
          ><span class="text-subtitle-1">{{ riproduttore.morph }}</span> <br />
          <p v-if="riproduttore.descrizione">
            <span class="text-subtitle-1">Descrizione: </span> <br />
            {{ riproduttore.descrizione }}
          </p>
        </v-card-text>
      </v-card>
    </v-col>
  </v-row>
</template>

<script>
export default {
  head() {
    return {
      title: 'Riproduttori',
    }
  },

  methods: {
    getGenderEmoji(gender) {
      if (gender.toLowerCase() === 'maschio') return '♂'
      else if (gender.toLowerCase() === 'femmina') return '♀️'
      else return ''
    },
  },

  async asyncData({ $axios }) {
    const riproduttori = await $axios.$get('/data/riproduttori.json')

    return { riproduttori }
  },
}
</script>

<style></style>
