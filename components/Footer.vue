<template>
  <v-footer app dark absolute rounded="lg">
    <v-row justify="center" align="center" no-gutters>
      Contattaci:
      <SocialIcon />
      <v-col cols="12" class="text-center">
        <span>&copy; {{ new Date().getFullYear() }} - {{ title }}</span>
      </v-col>
    </v-row>
  </v-footer>
</template>

<script>
import SocialIcon from '~/components/SocialIcon'

export default {
  name: 'Footer',

  data() {
    return {
      title: 'IndieGekko',
    }
  },

  components: {
    SocialIcon,
  },
}
</script>

<style></style>
