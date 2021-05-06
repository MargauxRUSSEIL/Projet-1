<template>
  <form class="container w-auto">
    <div class="my-12 md:mx-6 sm:mx-6 xl:mx-56 lg:mx-56">
      <h1>Modifier un cours</h1>
      <div class="flex flex-wrap">
        <div class="w-full px-3 mb-6 md:mb-4">
          <br>
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                Libellé cours</label>
          <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2" type="text" v-model="formCours.libelle" required />
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Code APOGEE</label>
          <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2" type="text" v-model="formCours.codeAPOGEE" required />
          <!-- Form cours CM TP TD -->
        </div>
        <div class="w-full px-3 mb-6 md:mb-4">
          <br>
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
              Cours magistraux :</label>
          <input type="radio" value="Oui" name="magistraux" /> <label>Oui</label>
          <input type="radio" value="Non" name="magistraux" /> <label>Non</label>
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
            Nombre d'heure :</label>
          <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2" type="text" v-model="formHorTypeCours.horaireCM" />
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Coût estimé en HETD</label>
          <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2" type="text" v-model="formHETD.coutCM" />
        </div>
        <div class="w-full px-3 mb-6 md:mb-4">
          <br>
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Cours TD :</label>
          <input type="radio" value="Oui" name="td" /> <label>Oui</label>
          <input type="radio" value="Non" name="td" /> <label>Non</label
                    >
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Nombre d'heure :</label>
          <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2" type="text" v-model="formHorTypeCours.horaireTD" />
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Coût estimé en HETD</label>
          <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2" type="text" v-model="formHETD.coutTD" />
        </div>
        <div class="w-full px-3 mb-6 md:mb-4">
          <br>
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Cours TP :</label>
          <input type="radio" value="Oui" name="tp" /> <label>Oui</label>
          <input type="radio" value="Non" name="tp" /> <label>Non</label
                    >
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Nombre d'heure :</label>
          <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2" type="text" v-model="formHorTypeCours.horaireTP" />
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Coût estimé en HETD</label>
          <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2" type="text" v-model="formHETD.coutTP" />
        </div>
        <div class="w-full px-3 mb-6 md:mb-4">
          <br>
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Autres : </label>
          <input type="radio" value="Oui" name="autres" /> <label>Oui</label>
          <input type="radio" value="Non" name="autres" /> <label>Non</label>
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Nombre d'heure :</label>
          <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2" type="text" v-model="formHorTypeCours.horaireAutre" />
          <br>
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Coût estimé en HETD</label>
          <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2" type="text" v-model="formHETD.coutHETDcol" />
          <!-- Type d'épreuve -->
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Ce cours nécessite plusieurs sessions d'examen :</label>
          <input type="radio" value="Oui" name="session" /> <label>Oui</label>
          <input type="radio" value="Non" name="session" /> <label>Non</label>
          <!-- SI OUI, afficher les deux prochain forms, si NON, afficher seulement le premier -->
          <p>Première session</p>
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Session</label>
          <select v-model="formSessionUnique.session">
                      <option value="Première">Première</option>
                    </select>
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Type d'épreuve :</label>
          <select v-model="formSessionUnique.typeEpreuve">
                      <option value="Oral">Oral</option>
                      <option value="Écrit">Écrit</option>
                      <option value="Oral et Écrit">Oral et Écrit</option>
                    </select>
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Règle de calcul</label>
          <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2" type="text" v-model="formSessionUnique.regleCalcul" />
          <br>
          <p>Seconde session</p>
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Session</label>
          <select v-model="formSessionUniquev2.session">
                      <option value="Deuxième">Deuxième</option>
                    </select>
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Type d'épreuve :</label>
          <select v-model="formSessionUniquev2.typeEpreuve">
                      <option value="Oral">Oral</option>
                      <option value="Écrit">Écrit</option>
                      <option value="Oral et Écrit">Oral et Écrit</option>
                    </select>
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Règle de calcul</label>
          <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2" type="text" v-model="formSessionUniquev2.regleCalcul" />
          <br>
        </div>
        <br>
        <button class="bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded font-semibold text-sm" type="button" v-on:click="submit()">MODIFIER</button>
      </div>
    </div>
  </form>
</template>

<script>
  import http from "../../http-common"
  export default {
    name: "CoursUpdate",
    data() {
      return {
        stat: "",
        formCours: {
          libelle: "",
          codeAPOGEE: "",
        },
        formHorTypeCours: {
          horaireCM: "",
          horaireTP: "",
          horaireTD: "",
          horaireAutre: "",
        },
        formHETD: {
          coutCM: "",
          coutTP: "",
          coutTD: "",
          coutHETDcol: "",
        },
        formSessionUnique: {
          typeEpreuve: "",
          regleCalcul: "",
          session: "",
        },
        formSessionUniquev2: {
          typeEpreuve: "",
          regleCalcul: "",
          session: "",
        },
      };
    },
    mounted() {
      this.getCours();
      this.getSession();
      this.getHETD();
      this.getHoraire();
    },
    methods: {
      submit: function(id) {
        id = this.$route.params.id
        http
          .put('cours/' + id, this.formCours)
          .then(function(response) {
            this.stat = response.status
            if (this.stat === 200) {
              this.$toast.success(`Cours mis à jour avec succès`, {
                position: "top-right"
              })
              setTimeout(this.$toast.clear, 3500)
              this.$router.push({
                name: 'Cours'
              })
            }
          }.bind(this))
          .catch(function(error) {
            this.err = error.response.status
            if (this.err === 400) {
              this.$toast.error(`Champ invalide`, {
                position: "top-right"
              })
            } else if (this.err === 404) {
              this.$toast.error(`Ressource introuvable`, {
                position: "top-right"
              })
            } else if (this.err === 422) {
              this.$toast.error(`Entité impossible à traiter`, {
                position: "top-right"
              })
            }
          }.bind(this))
        http
          .put('session_uniques/' + id, this.formSessionUnique)
          .then(function(response) {
            this.stat = response.status
            if (this.stat === 200) {
              this.$toast.success(`Cours mis à jour avec succès`, {
                position: "top-right"
              })
              setTimeout(this.$toast.clear, 3500)
              this.$router.push({
                name: 'Cours'
              })
            }
          }.bind(this))
          .catch(function(error) {
            this.err = error.response.status
            if (this.err === 400) {
              this.$toast.error(`Champ invalide`, {
                position: "top-right"
              })
            } else if (this.err === 404) {
              this.$toast.error(`Ressource introuvable`, {
                position: "top-right"
              })
            } else if (this.err === 422) {
              this.$toast.error(`Entité impossible à traiter`, {
                position: "top-right"
              })
            }
          }.bind(this))
        http
          .put('session_uniques/' + id, this.formSessionUniquev2)
          .then(function(response) {
            this.stat = response.status
            if (this.stat === 200) {
              this.$toast.success(`Cours mis à jour avec succès`, {
                position: "top-right"
              })
              setTimeout(this.$toast.clear, 3500)
              this.$router.push({
                name: 'Cours'
              })
            }
          }.bind(this))
          .catch(function(error) {
            this.err = error.response.status
            if (this.err === 400) {
              this.$toast.error(`Champ invalide`, {
                position: "top-right"
              })
            } else if (this.err === 404) {
              this.$toast.error(`Ressource introuvable`, {
                position: "top-right"
              })
            } else if (this.err === 422) {
              this.$toast.error(`Entité impossible à traiter`, {
                position: "top-right"
              })
            }
          }.bind(this))
        http
          .put('cout_h_e_t_ds/' + id, this.formHETD)
          .then(function(response) {
            this.stat = response.status
            if (this.stat === 200) {
              this.$toast.success(`Cours mis à jour avec succès`, {
                position: "top-right"
              })
              setTimeout(this.$toast.clear, 3500)
              this.$router.push({
                name: 'Cours'
              })
            }
          }.bind(this))
          .catch(function(error) {
            this.err = error.response.status
            if (this.err === 400) {
              this.$toast.error(`Champ invalide`, {
                position: "top-right"
              })
            } else if (this.err === 404) {
              this.$toast.error(`Ressource introuvable`, {
                position: "top-right"
              })
            } else if (this.err === 422) {
              this.$toast.error(`Entité impossible à traiter`, {
                position: "top-right"
              })
            }
          }.bind(this))
        http
          .put('horaire_type_cours/' + id, this.formHorTypeCours)
          .then(function(response) {
            this.stat = response.status
            if (this.stat === 200) {
              this.$toast.success(`Cours mis à jour avec succès`, {
                position: "top-right"
              })
              setTimeout(this.$toast.clear, 3500)
              this.$router.push({
                name: 'Cours'
              })
            }
          }.bind(this))
          .catch(function(error) {
            this.err = error.response.status
            if (this.err === 400) {
              this.$toast.error(`Champ invalide`, {
                position: "top-right"
              })
            } else if (this.err === 404) {
              this.$toast.error(`Ressource introuvable`, {
                position: "top-right"
              })
            } else if (this.err === 422) {
              this.$toast.error(`Entité impossible à traiter`, {
                position: "top-right"
              })
            }
          }.bind(this))
      },
      getCours: function(id) {
        id = this.$route.params.id
        const self = this;
        http
          .get('cours/' + id)
          .then(res => {
            self.formCours = res.data
          })
      },
      getSession: function(id) {
        http
          .get('session_uniques/' + id)
          .then(res => {
            self.formSessionUnique = res.data
          })
      },
      getHETD: function(id) {
        http
          .get('cout_h_e_t_ds/' + id)
          .then(res => {
            self.formHETD = res.data
          })
      },
      getHoraire: function(id) {
        http
          .get('horaire_type_cours/' + id)
          .then(res => {
            self.formHorTypeCours = res.data
          })
      },
    },
  };
</script>