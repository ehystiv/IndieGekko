<template>
  <v-row align="start" justify="center">
    <v-col cols="12" sm="12" md="10" lg="8" xl="6">
      <v-card rounded="lg" elevation="12">
        <v-card-title>Prenota un esemplare disponibile</v-card-title>
        <v-container flui>
          <v-form ref="form" @submit.prevent="onSubmit()">
            <v-row align="start" justify="center">
              <v-col cols="8">
                <v-text-field
                  v-model="prenotazione.nome"
                  label="Nome"
                  :rules="[rules.required]"
                  ref="nome"
                  :disabled="disabled"
                ></v-text-field>
              </v-col>
              <v-col cols="8">
                <v-text-field
                  v-model="prenotazione.cognome"
                  label="Cognome"
                  :rules="[rules.required]"
                  ref="cognome"
                  :disabled="disabled"
                ></v-text-field>
              </v-col>
              <v-col cols="8">
                <v-text-field
                  v-model="prenotazione.email"
                  label="Email"
                  type="email"
                  :rules="[rules.required]"
                  ref="email"
                  :disabled="disabled"
                ></v-text-field>
              </v-col>
              <v-col cols="8">
                <v-select
                  v-model="prenotazione.geco"
                  :items="list"
                  label="Seleziona geco"
                  :rules="[rules.required]"
                  ref="geco"
                  :disabled="disabled"
                ></v-select>
              </v-col>
              <v-col cols="8">
                <recaptcha
                  @error="onError"
                  @success="onSuccess"
                  @expired="onExpired"
              /></v-col>
            </v-row>
          </v-form>
        </v-container>
        <v-card-actions>
          <v-spacer />
          <v-btn color="black" class="white--text" @click="bookIt()">
            Prenota
            <v-icon right>far fa-edit</v-icon>
          </v-btn>
          <v-spacer />
        </v-card-actions>
      </v-card>
    </v-col>
  </v-row>
</template>

<script>
import * as qs from 'querystring'

export default {
  data() {
    return {
      list: ['Geko 1', 'Geko 2', 'Geko 3'],
      disabled: false,

      rules: {
        required: (v) => !!v || v.trim() !== '' || 'Campo obbligatorio',
      },

      prenotazione: {
        nome: '',
        cognome: '',
        email: '',
        geco: '',
        token: '',
      },
    }
  },

  methods: {
    async bookIt() {
      if (this.$refs.form.validate()) {
        this.disabled = true
        this.prenotazione.token = await this.$recaptcha.getResponse()

        this.$axios
          .$post('/api/prenota.php', qs.stringify(this.prenotazione), {
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded',
            },
          })
          .then((res) => {
            console.log(res)
            if (res.status === 'success') {
              this.disabled = false
              this.$toast.success(
                'Prenotazione avvenuta con successo! Riceverai un email di risposta a breve'
              )
              this.$refs.fomr.reset()
            } else if (res.status === 'failed') {
              console.error(res.error)
              this.$toast.error(
                'Impossibile completare la richiesta ora, riprova più tardi.'
              )
              this.disabled = false
            }

            this.$recaptcha.reset()
          })
          .catch((err) => console.error(err))
      }
    },

    async onSubmit() {
      console.log('submitted')
    },

    onSuccess(token) {
      this.prenotazione.token = token
    },

    onError(error) {
      console.log('Error happened:', error)
    },

    onExpired() {
      console.log('Token Expired')
    },
  },

  head() {
    return {
      title: 'Prenota',
    }
  },
}
</script>
