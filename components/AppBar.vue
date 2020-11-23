<template>
  <div id="appbar">
    <v-app-bar color="primary" dense elevate-on-scroll fixed app>
      <v-app-bar-nav-icon
        @click="drawer = true"
        v-if="$vuetify.breakpoint.mobile"
      ></v-app-bar-nav-icon>
      <img
        v-if="!$vuetify.breakpoint.mobile"
        src="/logos/logo_testa.png"
        height="100%"
        alt="logo"
      />
      <v-spacer v-if="$vuetify.breakpoint.mobile" />
      <v-toolbar-title v-text="title" class="title" />
      <v-spacer />
      <span v-if="!$vuetify.breakpoint.mobile">
        <v-btn
          text
          tile
          nuxt
          v-for="button in buttons"
          :key="button.name"
          :to="button.to"
        >
          <v-icon left>{{ button.icon }}</v-icon>
          {{ button.title }}
        </v-btn>
      </span>
      <img
        v-if="$vuetify.breakpoint.mobile"
        src="/logos/logo_testa.png"
        height="100%"
        alt="logo"
      />
    </v-app-bar>
    <v-navigation-drawer v-model="drawer" app dark disable-resize-watcher>
      <v-img src="/logos/logo_full.png" />
      <v-list nav dense>
        <v-list-item
          nuxt
          v-for="button in buttons"
          :key="button.title"
          :to="button.to"
        >
          <v-list-item-icon>
            <v-icon color="primary">{{ button.icon }}</v-icon>
          </v-list-item-icon>
          <v-list-item-title>{{
            button.title.toUpperCase()
          }}</v-list-item-title>
        </v-list-item>
      </v-list>
      <template v-slot:append>
        <div class="ml-15 mb-2">
          <SocialIcon orange />
        </div>
      </template>
    </v-navigation-drawer>
  </div>
</template>

<style scoped>
.title {
  text-transform: uppercase;
  font-weight: 800;
}
</style>

<script>
import SocialIcon from '~/components/SocialIcon'

export default {
  name: 'AppBar',

  components: {
    SocialIcon,
  },

  data() {
    return {
      title: 'IndieGekko',
      drawer: false,

      buttons: [
        {
          title: 'home',
          icon: 'fas fa-home',
          to: '/',
        },
        {
          title: 'schede allevamento',
          icon: 'fas fa-file-alt',
          to: '/schede',
        },
        {
          title: 'Riproduttori',
          icon: 'fas fa-venus-mars',
          to: '/riproduttori',
        },
        {
          title: 'disponibili',
          icon: 'fas fa-check-square',
          to: '/disponibili',
        },
        {
          title: 'prenota',
          icon: 'far fa-edit',
          to: '/prenota',
        },
      ],

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
}
</script>
