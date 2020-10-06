<template>
  <div id="appbar">
    <v-app-bar color="primary" flat elevate-on-scroll fixed app>
      <v-app-bar-nav-icon
        @click="drawer = true"
        class="d-lg-none d-xl-none"
      ></v-app-bar-nav-icon>
      <v-spacer class="d-lg-none d-xl-flex" />
      <v-toolbar-title v-text="title" class="title" />
      <v-spacer />
      <v-btn
        color="secondary"
        text
        tile
        nuxt
        ripple="{ class: white--text }"
        v-for="button in buttons"
        :key="button.name"
        :to="button.to"
        class="d-none d-lg-flex d-xl-flex"
      >
        <v-icon left>{{ button.icon }}</v-icon>
        {{ button.title }}
      </v-btn>
    </v-app-bar>
    <v-navigation-drawer v-model="drawer" app dark disable-resize-watcher>
      <v-list nav dense>
        <v-list-item>
          <v-list-item-content>
            <v-list-item-title class="title"> Gekko </v-list-item-title>
            <v-list-item-subtitle>
              Allevamento e vendita Gechi
            </v-list-item-subtitle>
          </v-list-item-content>
        </v-list-item>
        <v-list-item
          nuxt
          v-for="button in buttons"
          :key="button.title"
          :to="button.to"
        >
          <v-list-item-icon>
            <v-icon>{{ button.icon }}</v-icon>
          </v-list-item-icon>
          <v-list-item-title>{{
            button.title.toUpperCase()
          }}</v-list-item-title>
        </v-list-item>
      </v-list>
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
export default {
  name: 'AppBar',

  data() {
    return {
      title: 'Gekko',
      drawer: false,
      buttons: [
        {
          title: 'home',
          icon: 'fas fa-home',
          to: '/',
        },
        {
          title: 'schede tecniche',
          icon: 'fas fa-file-alt',
          to: 'schede',
        },
        {
          title: 'Riproduttori',
          icon: 'fas fa-venus-mars',
          to: 'riproduttori',
        },
        {
          title: 'disponibili',
          icon: 'fas fa-check-square',
          to: 'disponibili',
        },
      ],
    }
  },
}
</script>
