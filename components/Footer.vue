<template>
  <v-footer app dark absolute rounded="lg">
    <v-row justify="center" align="center" no-gutters>
      Contattaci:
      <v-btn
        icon
        v-for="button in social"
        :key="button.icon"
        :href="button.href"
      >
        <v-icon> {{ button.icon }} </v-icon>
      </v-btn>
      <v-col cols="12" class="text-center">
        <span>&copy; {{ new Date().getFullYear() }} - {{ title }}</span>
      </v-col>
    </v-row>
  </v-footer>
</template>

<script>
export default {
  name: 'Footer',

  data() {
    return {
      title: 'Gekko',
      social: [
        {
          icon: 'fab fa-instagram',
          href: '',
        },
        {
          icon: 'fab fa-facebook',
          href: '',
        },
        {
          icon: 'fas fa-envelope',
          href: '',
        },
        {
          icon: 'fas fa-phone',
          href: '',
        },
      ],
    }
  },

  methods: {
    async getContact() {
      let contatti = await this.$axios.$get('/data/contatti.json')

      this.social[0].href = contatti.instagram
      this.social[1].href = contatti.facebook
      this.social[2].href = 'mailto:' + contatti.email
      this.social[3].href = 'tel:' + contatti.telefono
    },
  },

  mounted() {
    this.getContact()
  },
}
</script>

<style></style>
