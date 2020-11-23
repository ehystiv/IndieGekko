<template>
  <v-row justify="center" align="start">
    <v-col cols="12" sm="12" md="10" lg="10">
      <v-card elevation="10">
        <v-carousel
          v-model="carousel"
          cycle
          interval="5000"
          :show-arrows="false"
          :show-arrows-on-hover="true"
          :height="customHeight"
        >
          <v-carousel-item
            v-for="photo in photos"
            :key="photo"
            :src="`/immagini/gechi/${photo}`"
          ></v-carousel-item>
        </v-carousel>
        <v-list two-line>
          <v-list-item>
            <v-list-item-content>
              <v-list-item-title>Alcuni dei nostri gechi 🦎</v-list-item-title>
              <v-list-item-subtitle>Prenotane subito uno!</v-list-item-subtitle>
            </v-list-item-content>
            <v-list-item-action>
              <v-btn to="disponibili" color="black" class="white--text"
                >Prenota</v-btn
              >
            </v-list-item-action>
          </v-list-item>
        </v-list>
      </v-card>
    </v-col>
    <v-col cols="12" sm="12" md="10" lg="10">
      <v-container fluid>
        <v-row align="start" justify="space-between">
          <v-col cols="12" sm="12" md="12" lg="12">
            <v-banner
              rounded="lg"
              sticky
              color="secondary"
              class="white--text gradient"
              elevation="10"
              >Su di noi</v-banner
            >
          </v-col>
          <v-col cols="12" sm="12" md="6" lg="5">
            <v-card color="primary" outlined rounded="xl" elevation="10">
              <v-card-title>Chi siamo 🔎</v-card-title>
              <v-card-text>
                <p>
                  IndieGekko è un allevamento amatoriale, concepito da due
                  ragazzi e il loro amore per gli animali, abbiamo deciso di
                  avviare il progetto nel 2020 e fra varie peripezie e
                  incertezze del caso, eccoci qui. Ovviamente non abbiamo fatto
                  di questo il nostro lavoro, ma lo abbiamo creato per
                  comunicare, informare e aprire le porte della terraristica
                  anche ai meno esperti.
                </p>
              </v-card-text>
            </v-card>
          </v-col>
          <v-col cols="12" sm="12" md="6" lg="7">
            <v-card
              color="secondary"
              class="white--text"
              outlined
              rounded="xl"
              elevation="10"
            >
              <v-card-title class="primary--text"
                >Perché IndieGekko? 🤔
              </v-card-title>
              <v-card-text>
                <p class="white--text">
                  Partiamo dal nome, IndieGekko, è stato poiché siamo amanti
                  dell’Indie italiano e difatti i nomi dei nostri gechi
                  corrispondono tutti a canzoni italiane del suddetto genere. Se
                  invece devo darvi una ragione per scegliere noi rispetto ad
                  altri allevamenti, il motivo è che siamo disponibili e che
                  amiamo ogni nostro esemplare dal più piccolo al più grande
                  dedicandogli attenzione e cura. Non solo a loro il nostro
                  discorso vale anche per i nostri clienti o followers, noi
                  vogliamo istruire e seguire le persone nelle loro esperienze
                  con questi animali quindi non esitate a chiederci consigli
                  tramite i social o e-mail e ad aggiornarci sulla crescita
                  degli esemplari acquistati da noi, perché alla fine anche loro
                  hanno fatto parte della famiglia IndieGekko.
                </p>
              </v-card-text>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
    </v-col>
    <v-col cols="12"><div class="mb-10"></div></v-col>
  </v-row>
</template>

<script>
export default {
  components: {},

  async asyncData({ $axios }) {
    const photos = await $axios.$get('/api/getNascite.php')

    if (process.env.NODE_ENV === 'production') return { photos }
    else
      try {
        Json.parse(photos)
        return { photos }
      } catch (e) {
        return { photos: [] }
      }
  },

  data() {
    return {
      carousel: 0,
    }
  },

  computed: {
    customHeight() {
      switch (this.$vuetify.breakpoint.name) {
        case 'xs':
          return 300
        case 'sm':
          return 400
        case 'md':
          return 500
        case 'lg':
          return 700
        case 'xl':
          return 800
      }
    },
  },

  head() {
    return {
      title: 'Home',
    }
  },
}
</script>

<style></style>
