<template>
  <span>
    <v-btn icon v-for="button in social" :key="button.icon" :href="button.href">
      <v-icon :color="orange ? 'primary' : ''"> {{ button.icon }} </v-icon>
    </v-btn>
  </span>
</template>

<script>
export default {
  name: 'SocialIcon',

  props: {
    orange: {
      type: Boolean,
      default: () => false,
    },
  },

  data() {
    return {
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
