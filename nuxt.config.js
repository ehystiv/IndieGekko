import colors from 'vuetify/es5/util/colors'

export default {
  // Disable server-side rendering (https://go.nuxtjs.dev/ssr-mode)
  ssr: false,

  globalName: 'Gekko',

  // Target (https://go.nuxtjs.dev/config-target)
  target: 'static',

  // Global page headers (https://go.nuxtjs.dev/config-head)
  head: {
    titleTemplate: '%s - IndieGekko',
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'description', name: 'description', content: '' },
    ],
    link: [{ rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' }],
  },

  // Global CSS (https://go.nuxtjs.dev/config-css)
  css: ['~/assets/toast-theme.scss'],

  // Plugins to run before rendering page (https://go.nuxtjs.dev/config-plugins)
  plugins: [],

  // Auto import components (https://go.nuxtjs.dev/config-components)
  components: true,

  // Modules for dev and build (recommended) (https://go.nuxtjs.dev/config-modules)
  buildModules: [
    // https://go.nuxtjs.dev/vuetify
    '@nuxtjs/vuetify',
  ],

  // Modules (https://go.nuxtjs.dev/config-modules)
  modules: [
    // https://go.nuxtjs.dev/axios
    '@nuxtjs/axios',
    // https://www.npmjs.com/package/@nuxtjs/toast
    '@nuxtjs/toast',
    // https://www.npmjs.com/package/@nuxtjs/robots
    '@nuxtjs/robots',
    // https://www.npmjs.com/package/@nuxtjs/sitemap
    '@nuxtjs/sitemap',
  ],

  // Axios module configuration (https://go.nuxtjs.dev/config-axios)
  axios: {
    baseURL:
      process.env.NODE_ENV === 'production' ? '/' : 'http://localhost:3000',
    retry: {
      retries: 3,
    },
  },

  // Vuetify module configuration (https://go.nuxtjs.dev/config-vuetify)
  vuetify: {
    customVariables: ['~/assets/variables.scss'],
    defaultAssets: { icons: 'fa' },
    theme: {
      dark: false,
      themes: {
        light: {
          primary: '#FF5A0A',
          accent: colors.orange.darken4,
          secondary: colors.grey.darken4,
          info: colors.cyan.accent1,
          warning: colors.yellow.lighten1,
          error: colors.orange.darken4,
          success: colors.green.darken2,
        },
      },
    },
  },

  toast: {
    position: 'bottom-center',
    duration: 3000,
    className: 'toast',
  },

  robots: [
    {
      UserAgent: '*',
      Allow: '/',
    },
  ],

  sitemap: {
    hostname: 'https://www.indiegekko.it',
    gzip: true,
  },

  // Build Configuration (https://go.nuxtjs.dev/config-build)
  build: {},
}
