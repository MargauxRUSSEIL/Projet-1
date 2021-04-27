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
        <div class="container " :class="{' container-update':isUpdate}">
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
          <div v-if="isUpdate" class="update ">
            <p class="font-semibold text-lg"> {{user.prenom}} {{ user.nom}}</p>
            <div class="flex flex-col">
              <label for="composanteUpdate">Composante </label>
              <select  name="role" id="composanteUpdate" >
                <option v-for="composante in composantes" :key="composante.id" :value="composante.id"> {{composante.libelleInstitut}}</option>
              </select>
            </div>
            <div class="flex flex-col">
              <label for="roleUpdate">Role </label>
              <select  name="role" id="roleUpdate">
                <option v-for="role in roles" :key="role.id" :value="role.id"> {{role.libelleRole}}</option>
              </select>
            </div>
          </div>
          <button v-if="isRole" class="valider" @click="addRole">Valider</button>
          <button v-if="isComposante" class="valider" @click="addComposante">Valider</button>
          <button v-if="isUpdate" class="valider" @click="updateUser">Modifier</button>

        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios'
const baseURL = 'http://localhost:8000/api/'
export default {
  props: {
    isRole: Boolean,
    isComposante: Boolean,
    isUpdate: Boolean,
    modalName: String,
    user: Object
  },
  data() {
    return {
      libelleRole: "",
      libelleComposante: "",
      roles: [],
      composantes: []
    };
  },
  async mounted() {
    this.roles = this.$parent.roles
    this.composantes = this.$parent.composantes

    console.log(this.user)
  },
  methods: {
    close() {
      this.$parent.isModalRole = false;
      this.$parent.isModalComposante = false;
      this.$parent.isModalUpdate = false;
    },
    addRole() {
      if (this.libelleRole == "") return
      var data = JSON.stringify({
        libelleRole: this.libelleRole,
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
        .then( (response) => {
          console.log(JSON.stringify(response.data));
          this.$parent.isModalRole = false;
          this.$parent.getRoles()
        })
        .catch( (error) => {
          console.log(error);
        });
    },
    addComposante() {
      if (this.libelleComposante == "") return
      var data = JSON.stringify({
        libelleInstitut: this.libelleComposante,
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
        .then( (response) => {
          console.log(JSON.stringify(response.data));
          this.$parent.isModalComposante = false;
          this.$parent.getComposantes()

        })
        .catch( (error) => {
          console.log(error);
        });
    },
    updateUser() {},

  },
};
</script>

<style lang="postcss" scoped>
.modal {
  background: rgba(87, 87, 87, 0.5);
}
.container-update{
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
  @apply px-10 py-6 flex flex-col justify-between ;
  min-height: 25vh;
}

.update {
  @apply flex flex-col space-y-3
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
</style>