//Ce composant est la pop-up de la page de gestion des utilisateurs.
//Ce composant permet d'ajouter des rôles ou des composantes et de modifier
//le rôle et/ou la composante d'un utilisateur.
<template >
  <div class="fixed top-0 left-0 m-0">
    <div
      class="modal w-screen h-screen flex justify-center items-center text-black"
    >
      <div
        role="dialog"
        :aria-labelledby="modalName"
        aria-modal="true"
        class="dialog-container"
      >
        <div class="title-container">
          <h1 id="modal-role" v-if="isRole">
            Création d’un nouveau role administratif
          </h1>
          <h1 id="modal-composante" v-if="isComposante">
            Création d'une nouvelle composante
          </h1>
          <h1 id="modal-update-role" v-if="isUpdate" class="pr-6">
            Édition des rôles et composantes des utilisateurs
          </h1>
          <button ref="closebtn" class="close" @click="close">
            <p class="sr-only">close</p>
            <svg
              width="16"
              height="16"
              viewBox="0 0 16 16"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M15.1312 2.63127L13.3687 0.868774L7.9999 6.23752L2.63115 0.868774L0.868652 2.63127L6.2374 8.00002L0.868652 13.3688L2.63115 15.1313L7.9999 9.76252L13.3687 15.1313L15.1312 13.3688L9.7624 8.00002L15.1312 2.63127Z"
                fill="white"
              />
            </svg>
          </button>
        </div>
        <div class="container" :class="{ ' container-update': isUpdate }">
          <!-- Partie ajout rôles/composantes -->
          <div v-if="isRole || isComposante" class="add">
            <label v-if="isRole" for="role">Intitulé du role : </label>
            <label v-if="isComposante" for="composante"
              >Intitulé de la composante :
            </label>
            <input
              v-if="isRole"
              v-model="libelleRole"
              aria-label="ajout d'un role"
              id="role"
              type="text"
              placeholder="Rôle"
            />
            <input
              v-if="isComposante"
              v-model="libelleComposante"
              aria-label="ajout d'une composante"
              id="composante"
              type="text"
              placeholder="Composante"
            />
          </div>
          <!-- Partie update user -->
          <div v-if="isUpdate" class="update">
            <p class="font-semibold text-lg">
              {{ user.prenom }} {{ user.nom }}
            </p>
            <div class="flex flex-col">
              <label for="composanteUpdate">Composante </label>
              <select
                ref="selectComposante"
                name="composante"
                id="composanteUpdate"
              >
                <option :value="user.composantes[0].id" selected>
                  {{ user.composantes[0].libelle }}
                </option>
                <option
                  v-for="composante in composantes"
                  :key="composante.id"
                  :value="composante.id"
                >
                  {{ composante.libelle }}
                </option>
              </select>
            </div>
            <div class="flex flex-col">
              <label for="roleUpdate">Role </label>
              <select ref="selectRole" name="role" id="roleUpdate">
                <option :value="user.roles[0].id" selected>
                  {{ user.roles[0].libelle }}
                </option>
                <option v-for="role in roles" :key="role.id" :value="role.id">
                  {{ role.libelle }}
                </option>
              </select>
            </div>
          </div>
          <!-- Message d'erreur en cas de problème à l'injection dans la bdd -->
          <div class="error" v-if="isError">
            <p>{{ errorMsg }}</p>
          </div>
          <button v-if="isRole" class="valider" @click="addRole">
            Valider
          </button>
          <button v-if="isComposante" class="valider" @click="addComposante">
            Valider
          </button>
          <button v-if="isUpdate" class="valider" @click="updateUser">
            Modifier
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
const baseURL = "http://localhost:8000/api/";
export default {
  /**
   * isRole, isComposante, isUpdate permet de savoir quelle pop-up est demandé
   * On récupère  les information de l'utilisateur avec user pour la modification du user
   */
  props: {
    isRole: Boolean,
    isComposante: Boolean,
    isUpdate: Boolean,
    modalName: String,
    user: Object,
  },
  /**
   * libelleRole, libelleComposante stocke le nouveau rôle composante à ajouter dans la bdd
   * roles, composante contient la liste des rôles et des composantes
   */
  data() {
    return {
      libelleRole: "",
      libelleComposante: "",
      roles: [],
      composantes: [],
      isError: false,
      errorMsg: "",
    };
  },
  async mounted() {
    /**
     * Ici on stocke les rôles et composantes qui ont été appelé 
     * dans BodyRole.vue avec getUsers() et getComposantes()
     */
    this.roles = this.$parent.roles;
    this.composantes = this.$parent.composantes;
    // console.log(this.user);
  },
  methods: {
    /**
     * La fonction close ferme la modal qui est ouverte
     * Elle est appelée sur le bouton <button ref="closebtn" class="close" @click="close">
     */
    close() {
      this.$parent.isModalRole = false;
      this.$parent.isModalComposante = false;
      this.$parent.isModalUpdate = false;
    },

    /**
     * Cette fonction vérifie que libelleRole n'est pas vide 
     * et ajoute un rôle à la bdd, ferme la modal, et met à jour le tableau de roles,
     * en cas d'erreur affiche le message d'erreur
     * <button v-if="isRole" class="valider" @click="addRole">
     */
    addRole() {
      if (this.libelleRole == "") return;
      var data = JSON.stringify({
        libelle: this.libelleRole,
      });
      var config = {
        method: "post",
        url: `${baseURL}roles`,
        headers: {
          "Content-Type": "application/json",
        },
        data: data,
      };
      axios(config)
        .then(() => {
          // console.log(JSON.stringify(response.data));
          this.$parent.isModalRole = false;
          this.$parent.getRoles();
        })
        .catch((error) => {
          this.isError = true;
          this.errorMsg = "Une erreur c'est produite lors de l'ajout du rôle";
          console.log(error);
        });
    },
    /**
     * Cette fonction vérifie que libelleComposante n'est pas vide 
     * et ajoute une composante à la bdd, ferme la modal, et met à jour le tableau de roles,
     * en cas d'erreur affiche le message d'erreur
     * <button v-if="isComposante" class="valider" @click="addComposante">
     */
    addComposante() {
      if (this.libelleComposante == "") return;
      var data = JSON.stringify({
        libelle: this.libelleComposante,
      });
      var config = {
        method: "post",
        url: `${baseURL}composantes`,
        headers: {
          "Content-Type": "application/json",
        },
        data: data,
      };
      axios(config)
        .then(() => {
          // console.log(JSON.stringify(response.data));
          this.$parent.isModalComposante = false;
          this.$parent.getComposantes();
        })
        .catch((error) => {
          console.log(error);
          this.isError = true;
          this.errorMsg =
            "Une erreur c'est produite lors de l'ajout de la composante";
        });
    },
    /**
     * updateUser vérifie si le rôle/composante du user est différent du rôle/composante sélectionné
     * elle modifie les champs nécessaire, met à jour la table des users et ferme la modal, 
     * en cas d'erreur affiche le message d'erreur
     * <button v-if="isUpdate" class="valider" @click="updateUser">
     */
    updateUser() {
      const selectRole = this.$refs.selectRole;
      const selectComposante = this.$refs.selectComposante;
      const userId = this.user.id;
      const self = this;
      if (
        selectComposante.value != this.user.composantes[0].id &&
        selectRole.value != this.user.roles[0].id
      ) {
        // console.log("update de la role et compo");
        const data = JSON.stringify({
          roles: [`/api/roles/${selectRole.value}`],
          composantes: [`/api/composantes/${selectComposante.value}`],
        });

        const config = {
          method: "put",
          url: `http://127.0.0.1:8000/api/users/${userId}`,
          headers: {
            "Content-Type": "application/json",
          },
          data: data,
        };
        axios(config)
          .then(function () {
            // console.log(JSON.stringify(response.data));
            self.$parent.getUsers();
            self.$parent.isModalUpdate = false;
          })
          .catch(function (error) {
            console.log(error);
            self.isError = true;
            self.errorMsg =
              "Une erreur c'est produite lors de l'édition de l'utilisateur";
          });
      } else if (selectComposante.value != this.user.composantes[0].id) {
        console.log("update de la table composanteUser");
        const data = JSON.stringify({
          // roles: [`/api/roles/${selectRole.value}`],
          composantes: [`/api/composantes/${selectComposante.value}`],
        });

        const config = {
          method: "put",
          url: `http://127.0.0.1:8000/api/users/${userId}`,
          headers: {
            "Content-Type": "application/json",
          },
          data: data,
        };
        axios(config)
          .then(function () {
            // console.log(JSON.stringify(response.data));
            self.$parent.getUsers();
            self.$parent.isModalUpdate = false;
          })
          .catch(function (error) {
            console.log(error);
            self.isError = true;
            self.errorMsg =
              "Une erreur c'est produite lors de l'édition de l'utilisateur";
          });
        // this.$parent.getUsers()
      } else if (selectRole.value != this.user.roles[0].id) {
        // console.log("update de la table rolesUser");
        const data = JSON.stringify({
          roles: [`/api/roles/${selectRole.value}`],
          // composantes: [`/api/composantes/${selectComposante.value}`],
        });

        const config = {
          method: "put",
          url: `http://127.0.0.1:8000/api/users/${userId}`,
          headers: {
            "Content-Type": "application/json",
          },
          data: data,
        };
        axios(config)
          .then(function () {
            // console.log(JSON.stringify(response.data));
            self.$parent.getUsers();
            self.$parent.isModalUpdate = false;
          })
          .catch(function (error) {
            console.log(error);
            self.isError = true;
            self.errorMsg =
              "Une erreur c'est produite lors de l'édition de l'utilisateur";
          });
        // this.$parent.getUsers()
      }
    },
  },
};
</script>

<style lang="postcss" scoped>
.modal {
  background: rgba(87, 87, 87, 0.5);
}
.container-update {
  /* height: 100%; */
  @apply space-y-6;
}
.dialog-container {
  @apply min-w-1/2  bg-white rounded-xl;
  min-height: 33%;
}
.title-container {
  @apply text-white flex justify-between font-bold text-2xl px-6 py-3 rounded-t-xl;
  background: linear-gradient(91.71deg, #dd0e40 19.89%, #2b2463 108.53%);
}
.container {
  @apply px-10 py-6 flex flex-col justify-between;
  min-height: 25vh;
}

.update {
  @apply flex flex-col space-y-3;
}
.update select {
  @apply py-1 px-3 rounded-md font-medium border border-black;
}

input {
  @apply border border-black rounded-lg px-3 py-1;
}

.valider {
  @apply bg-theme-bleu-marine text-white mx-auto px-16 py-2 font-bold text-xl rounded-lg;
  box-shadow: -2px 2px 2px rgba(0, 41, 107, 0.25),
    2px -2px 2px rgba(255, 255, 255, 0.4), 2px 2px 2px rgba(0, 41, 107, 0.4),
    -2px -2px 2px rgba(255, 255, 255, 0.4),
    inset 1px 1px 2px rgba(0, 0, 0, 0.25);
}

.error {
  @apply bg-red-400 rounded-lg py-2 px-2 text-center my-4;
}
</style>