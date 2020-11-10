<template>
  <v-app>
    <AppBar />
    <v-main class="bg">
      <v-container fluid>
        <nuxt />
      </v-container>
    </v-main>
    <Footer />
  </v-app>
</template>

<style scoped>
.bg {
  background-color: #eeeeee;
}
</style>

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
