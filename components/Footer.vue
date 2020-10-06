<template>
  <v-footer app dark shaped fixed>
    <span>&copy; {{ new Date().getFullYear() }} - {{ title }}</span>
    <v-spacer />
    <v-btn icon v-for="button in social" :key="button.icon" :href="button.href">
      <v-icon> {{ button.icon }} </v-icon>
    </v-btn>
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
      ],
    }
  },
}
</script>

<style></style>
