<template>
  <form action="" class="container w-auto">
    <label for="">Libellé cours</label>
    <input type="text" v-model="formCours.libelle" required />
    <br />
    <label for="">Code APOGEE</label>
    <input type="text" v-model="formCours.codeAPOGEE" required />

    <!-- Form cours CM TP TD -->
    <br />
    <label for="">Cours magistraux :</label>
    <br />
    <input type="radio" value="Oui" name="magistraux" /> <label>Oui</label>
    <input type="radio" value="Non" name="magistraux" /> <label>Non</label
    ><br />

    <label for="">Nombre d'heure :</label>
    <input type="text" v-model="formHorTypeCours.horaireCM" />
    <br />
    <label for="">Coût estimé en HETD</label>
    <input type="text" v-model="formHETD.coutCM" />
    <br />
    <label for="">Nombre de groupe d'étudiants :</label>
    <input type="text" v-model="formNbGroupe.CM" />

    <br />
    <label for="">Cours TD :</label>
    <br />
    <input type="radio" value="Oui" name="magistraux" /> <label>Oui</label>
    <input type="radio" value="Non" name="magistraux" /> <label>Non</label
    ><br />

    <label for="">Nombre d'heure :</label>
    <input type="text" v-model="formHorTypeCours.horaireTD" />
    <br />
    <label for="">Coût estimé en HETD</label>
    <input type="text" v-model="formHETD.coutTD" />
    <br />
    <label for="">Nombre de groupe d'étudiants :</label>
    <input type="text" v-model="formNbGroupe.TD" />

    <br />
    <label for="">Cours TP :</label>
    <br />
    <input type="radio" value="Oui" name="magistraux" /> <label>Oui</label>
    <input type="radio" value="Non" name="magistraux" /> <label>Non</label
    ><br />

    <label for="">Nombre d'heure :</label>
    <input type="text" v-model="formHorTypeCours.horaireTP" />
    <br />
    <label for="">Coût estimé en HETD</label>
    <input type="text" v-model="formHETD.coutTP" />
    <br />
    <label for="">Nombre de groupe d'étudiants :</label>
    <input type="text" v-model="formNbGroupe.TP" />

    <br />
    <label for="">Autres : </label>
    <br />
    <input type="radio" value="Oui" name="magistraux" /> <label>Oui</label>
    <input type="radio" value="Non" name="magistraux" /> <label>Non</label
    ><br />

    <label for="">Nombre d'heure :</label>
    <input type="text" v-model="formHorTypeCours.horaireAutre" />
    <br />
    <label for="">Nombre de groupe d'étudiants :</label>
    <input type="text" v-model="formNbGroupe.Autre" />
    <!-- Pas trouvé dans la db -->
    <!-- <label for="">Coût estimé en HETD</label>
    <input type="text" /> -->
    <!-- <br />
    <label for="">Veuillez préciser</label>
    <input type="text" /> -->

    <!-- Type d'épreuve -->
    <br />

    <label for="">Ce cours nécessite plusieurs sessions d'examen :</label>
    <br />
    <input type="radio" value="Oui" name="session" /> <label>Oui</label>
    <input type="radio" value="Non" name="session" /> <label>Non</label>

    <!-- SI OUI, afficher les deux prochain forms, si NON, afficher seulement le premier -->
    <br />
     <p>Première session</p>
    <label for="">Session</label>
    <select v-model="formSessionUnique.session">
        <option value="Première">Première</option>
    </select>
    <br />
    <label for="">Type d'épreuve :</label>
    <select v-model="formSessionUnique.typeEpreuve">
      <option value="Oral">Oral</option>
      <option value="Écrit">Écrit</option>
      <option value="Oral et Écrit">Oral et Écrit</option>
    </select>
    <br />

    <label for="">Règle de calcul</label>
    <input type="text" v-model="formSessionUnique.regleCalcul" />

    <br />
    <p>Seconde session</p>
    <label for="">Session</label>
    <select v-model="formSessionUniquev2.session">
      <option value="Deuxième">Deuxième</option>
    </select>
    <br />
    <label for="">Type d'épreuve :</label>
    <select v-model="formSessionUniquev2.typeEpreuve">
      <option value="Oral">Oral</option>
      <option value="Écrit">Écrit</option>
      <option value="Oral et Écrit">Oral et Écrit</option>
    </select>
    <br />

    <label for="">Règle de calcul</label>
    <input type="text" v-model="formSessionUniquev2.regleCalcul" />

    <!-- ----------------------------------------------------- -->
    <!-- pas compris la partie des compétences et des UE -->
    <!-- ----------------------------------------------------- -->
    <br />
    <button
      class="bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded font-semibold text-sm"
      type="button"
      v-on:click="
        submit()
      "
    >
      AJOUTER
    </button>
  </form>
</template>

<script>
import http from "../../http-common";

export default {
  name: "CoursForm",
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
      formNbGroupe: {
        CM: "",
        TP: "",
        TD: "",
        Autre: "",
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
  methods: {
    submit: function () {
      this.submitFormCours();
      this.submitFromHTC();
      this.submitFromNbGroupe();
      this.submitFromHETD();
      this.submitFirstFromSessionUnique();
      this.submitSecondFromSessionUnique();

      setTimeout(() => this.submitHasCours(), 1000);
      setTimeout(() => this.submitHasConnaissance(), 1000);
    },
    submitHasCours: function () {
      const result = {
        cours: sessionStorage.cours,
        horaireTypeCours: sessionStorage.horaire,
        nbGroupeTypeCours: sessionStorage.nb,
        coutHETD: sessionStorage.hetd
      };

      http
        .post(
          "nb_groupe_type_cours_has_cours",
          result
        )
        .then(
          function (response) {
            this.stat = response.status;
            if (this.stat === 201) {
              this.$toast.success(
                `La relation a été créée avec succès`,
                {
                  position: "top-right",
                }
              );
              setTimeout(this.$toast.clear, 3500);
              this.$router.push({ name: "Cours" });
            }
          }.bind(this)
        )
        .catch(
          function (error) {
            this.err = error.response.status;
            if (this.err === 400) {
              this.$toast.error(`Champ invalide`, {
                position: "top-right",
              });
            } else if (this.err === 422) {
              this.$toast.error(`Entité impossible à traiter`, {
                position: "top-right",
              });
            }
          }.bind(this)
        );

        sessionStorage.removeItem('horaire');
        sessionStorage.removeItem('nb');
        sessionStorage.removeItem('hetd');
    },
  submitHasConnaissance: function () {
      const result = {
        cours: sessionStorage.cours,
        sessionUniques: [
          sessionStorage.session1,
          sessionStorage.session2
        ]
      };

      http
        .post(
          "controle_connaissances",
          result
        )
        .then(
          function (response) {
            this.stat = response.status;
            if (this.stat === 201) {
              this.$toast.success(
                `La relation a été créée avec succès`,
                {
                  position: "top-right",
                }
              );
              setTimeout(this.$toast.clear, 3500);
              this.$router.push({ name: "Cours" });
            }
          }.bind(this)
        )
        .catch(
          function (error) {
            this.err = error.response.status;
            if (this.err === 400) {
              this.$toast.error(`Champ invalide`, {
                position: "top-right",
              });
            } else if (this.err === 422) {
              this.$toast.error(`Entité impossible à traiter`, {
                position: "top-right",
              });
            }
          }.bind(this)
        );

        sessionStorage.removeItem('cours');
        sessionStorage.removeItem('session1');
        sessionStorage.removeItem('session2');
    },
    submitFormCours: function () {
      http
        .post("cours", this.formCours)
        .then(
          function (response) {
            this.stat = response.status;
            sessionStorage.setItem('cours', response.data['@id']);

            if (this.stat === 201) {
              this.$toast.success(`Cours créé avec succès`, {
                position: "top-right",
              });
              setTimeout(this.$toast.clear, 3500);
            }
          }.bind(this)
        )
        .catch(
          function (error) {
            this.err = error.response.status;
            if (this.err === 400) {
              this.$toast.error(`Champ invalide`, {
                position: "top-right",
              });
            } else if (this.err === 422) {
              this.$toast.error(`Entité impossible à traiter`, {
                position: "top-right",
              });
            }
          }.bind(this)
        );
    },
    submitFromHTC: function () {
      http
        .post("horaire_type_cours", this.formHorTypeCours)
        .then(
          function (response) {
            this.stat = response.status;
            sessionStorage.setItem('horaire', response.data['@id']);

            if (this.stat === 201) {
              this.$toast.success(`HTC créés avec succès`, {
                position: "top-right",
              });
              setTimeout(this.$toast.clear, 3500);
            }
          }.bind(this)
        )
        .catch(
          function (error) {
            this.err = error.response.status;
            if (this.err === 400) {
              this.$toast.error(`Champ invalide`, {
                position: "top-right",
              });
            } else if (this.err === 422) {
              this.$toast.error(`Entité impossible à traiter`, {
                position: "top-right",
              });
            }
          }.bind(this)
        );
    },
    submitFromNbGroupe: function () {
      http
        .post("nb_groupe_type_cours", this.formNbGroupe)
        .then(
          function (response) {
            this.stat = response.status;
            sessionStorage.setItem('nb', response.data['@id']);

            if (this.stat === 201) {
              this.$toast.success(`NbGroupe créés avec succès`, {
                position: "top-right",
              });
              setTimeout(this.$toast.clear, 3500);
            }
          }.bind(this)
        )
        .catch(
          function (error) {
            this.err = error.response.status;
            if (this.err === 400) {
              this.$toast.error(`Champ invalide`, {
                position: "top-right",
              });
            } else if (this.err === 422) {
              this.$toast.error(`Entité impossible à traiter`, {
                position: "top-right",
              });
            }
          }.bind(this)
        );
    },
    submitFromHETD: function () {
      http
        .post("cout_h_e_t_ds", this.formHETD)
        .then(
          function (response) {
            this.stat = response.status;
            sessionStorage.setItem('hetd', response.data['@id']);

            if (this.stat === 201) {
              this.$toast.success(`HETD créés avec succès`, {
                position: "top-right",
              });
              setTimeout(this.$toast.clear, 3500);
            }
          }.bind(this)
        )
        .catch(
          function (error) {
            this.err = error.response.status;
            if (this.err === 400) {
              this.$toast.error(`Champ invalide`, {
                position: "top-right",
              });
            } else if (this.err === 422) {
              this.$toast.error(`Entité impossible à traiter`, {
                position: "top-right",
              });
            }
          }.bind(this)
        );
    },
    submitFirstFromSessionUnique: function () {
      http
        .post(
          "session_uniques",
          this.formSessionUnique
        )
        .then(
          function (response) {
            this.stat = response.status;
            sessionStorage.setItem('session1', response.data['@id']);
            if (this.stat === 201) {
              this.$toast.success(
                `Les sessions uniques ont été créées avec succès`,
                {
                  position: "top-right",
                }
              );
              setTimeout(this.$toast.clear, 3500);
            }
          }.bind(this)
        )
        .catch(
          function (error) {
            this.err = error.response.status;
            if (this.err === 400) {
              this.$toast.error(`Champ invalide`, {
                position: "top-right",
              });
            } else if (this.err === 422) {
              this.$toast.error(`Entité impossible à traiter`, {
                position: "top-right",
              });
            }
          }.bind(this)
        );
    },
    submitSecondFromSessionUnique: function () {
      http
        .post(
          "session_uniques",
          this.formSessionUniquev2
        )
        .then(
          function (response) {
            this.stat = response.status;
            sessionStorage.setItem('session2', response.data['@id']);
            if (this.stat === 201) {
              this.$toast.success(
                `Les sessions uniques ont été créées avec succès`,
                {
                  position: "top-right",
                }
              );
              setTimeout(this.$toast.clear, 3500);
            }
          }.bind(this)
        )
        .catch(
          function (error) {
            this.err = error.response.status;
            if (this.err === 400) {
              this.$toast.error(`Champ invalide`, {
                position: "top-right",
              });
            } else if (this.err === 422) {
              this.$toast.error(`Entité impossible à traiter`, {
                position: "top-right",
              });
            }
          }.bind(this)
        );
    }
  },
};
</script>