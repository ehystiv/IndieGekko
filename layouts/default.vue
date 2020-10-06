<template>
  <v-app>
    <AppBar />
    <v-main>
      <nuxt />
    </v-main>
    <Footer />
  </v-app>
</template>

<script>
import AppBar from './../components/AppBar'
import Footer from './../components/Footer'

export default {
  data() {
    return {
      fixed: false,
      title: 'Gekko',
    }
  },

  components: {
    AppBar,
    Footer,
  },
}
</script>
