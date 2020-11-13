<template>
  <v-row align="start" justify="center">
    <v-col cols="12" sm="12" md="10" lg="8" xl="6">
      <v-card rounded="lg" elevation="12">
        <v-card-title>Prenota un esemplare disponibile</v-card-title>
        <v-container flui>
          <v-form ref="form">
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
      },
    }
  },

  methods: {
    bookIt() {
      if (this.$refs.form.validate()) {
        this.disabled = true
        this.$axios
          .$post('/prenota.php', this.prenotazione)
          .then((res) => {
            console.log(res)
            if (res === 'success') {
              this.disabled = false
            } else {
              this.$toast.error(
                'Impossibile completare ora, riprova più tardi.'
              )
              this.disabled = false
            }
          })
          .catch((err) => console.error(err))
      }
    },
  },
}
</script>
