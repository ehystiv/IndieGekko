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
            :src="`/immagini/nascite/${photo}`"
          ></v-carousel-item>
        </v-carousel>
        <v-list two-line>
          <v-list-item>
            <v-list-item-content>
              <v-list-item-title>{{ birth_title }}</v-list-item-title>
              <v-list-item-subtitle
                >Prenota uno dei piccoli!</v-list-item-subtitle
              >
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
              >Chi siamo</v-banner
            >
          </v-col>
          <v-col cols="12" sm="12" md="6" lg="5">
            <v-card color="primary" outlined rounded="xl" elevation="10">
              <v-card-title>Melissa</v-card-title>
              <v-card-text>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec
                  placerat diam vitae fringilla tempor. Phasellus tempor sapien
                  quis purus aliquet, a gravida ligula rutrum. Vivamus eget ex
                  diam. In volutpat urna at nisl sodales, at tincidunt tortor
                  aliquet. Etiam faucibus erat et commodo ultricies. Donec
                  aliquet arcu et tempor semper. Pellentesque congue, felis nec
                  interdum commodo, nulla ante tempor nunc, et porta lacus
                  libero in lacus. Mauris accumsan neque felis, sit amet
                  pharetra ipsum imperdiet nec. Quisque vehicula ipsum in
                  ultricies convallis. Nulla quis bibendum odio. Integer enim
                  quam, euismod at ligula ac, ullamcorper viverra augue. Donec
                  congue justo nec mi tempor ullamcorper.
                </p>
              </v-card-text>
            </v-card>
          </v-col>
          <v-col cols="12" sm="12" md="6" lg="5">
            <v-card
              color="secondary"
              class="white--text"
              outlined
              rounded="xl"
              elevation="10"
            >
              <v-card-title>Tommaso</v-card-title>
              <v-card-text>
                <p class="white--text">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec
                  placerat diam vitae fringilla tempor. Phasellus tempor sapien
                  quis purus aliquet, a gravida ligula rutrum. Vivamus eget ex
                  diam. In volutpat urna at nisl sodales, at tincidunt tortor
                  aliquet. Etiam faucibus erat et commodo ultricies. Donec
                  aliquet arcu et tempor semper. Pellentesque congue, felis nec
                  interdum commodo, nulla ante tempor nunc, et porta lacus
                  libero in lacus. Mauris accumsan neque felis, sit amet
                  pharetra ipsum imperdiet nec. Quisque vehicula ipsum in
                  ultricies convallis. Nulla quis bibendum odio. Integer enim
                  quam, euismod at ligula ac, ullamcorper viverra augue. Donec
                  congue justo nec mi tempor ullamcorper.
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
    return { photos }
  },

  data() {
    return {
      carousel: 0,
    }
  },

  computed: {
    birth_title() {
      return 'Nascite ' + new Date().getFullYear()
    },
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
