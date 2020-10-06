<template>
  <v-footer app dark shaped absolute>
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
          href: 'http://instagram.com',
        },
        {
          icon: 'fab fa-facebook',
          href: 'http://facebook.com',
        },
        {
          icon: 'fas fa-envelope',
          href: 'mailto:mail@sample.com',
        },
        {
          icon: 'fas fa-phone',
          href: 'tel:1234567894',
        },
      ],
    }
  },
}
</script>

<style></style>
