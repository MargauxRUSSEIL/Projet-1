<template>
  <div class="header">
    <div class="container-logo montserrat text-white">
      <router-link to="/">
        <img
          src="@/assets/img/CYLogo.png"
          alt="Logo de l'université de Cergy"
        />
      </router-link>
    </div>
    <div
      class="nav inter uppercase flex ml-auto items-center justify-between expandCollapse"
    >
      <div class="outils">
        <div class="dropbtn">
          <svg
            width="36"
            height="36"
            viewBox="0 0 36 36"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M18 16.35C17.085 16.35 16.35 17.085 16.35 18C16.35 18.915 17.085 19.65 18 19.65C18.915 
                            19.65 19.65 18.915 19.65 18C19.65 17.085 18.915 16.35 18 16.35ZM18 3C9.72 3 3 9.72 3 18C3 
                            26.28 9.72 33 18 33C26.28 33 33 26.28 33 18C33 9.72 26.28 3 18 3ZM21.285 21.285L9 27L14.715 
                            14.715L27 9L21.285 21.285Z"
              fill="white"
            />
          </svg>
          <p class="">Outils</p>
        </div>
        <transition name="dropdown-fade">
          <div ref="dropdownContent" class="dropdown-content">
            <router-link ref="letsgo" to="/"> Mes formations </router-link>
            <router-link to="/">Demandes en attente</router-link>
            <router-link to="/">Gestion des composantes</router-link>
          </div>
        </transition>
      </div>
      <div class="formations">
        <div class="dropbtn">
          <svg
            width="36"
            height="36"
            viewBox="0 0 36 36"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M22.4233 10.5V29.955L16.1297 27.24L14.9487 26.73L13.7678 27.24L7.47419 29.955V10.5H22.4233ZM28.4029 1.5H13.4389C11.7945 1.5 10.464 2.85 10.464 4.5H25.4131C27.0575 4.5 28.4029 5.85 28.4029 7.5V27L31.3927 28.5V4.5C31.3927 2.85 30.0473 1.5 28.4029 1.5ZM22.4233 7.5H7.47419C5.82979 7.5 4.48438 8.85 4.48438 10.5V34.5L14.9487 30L25.4131 34.5V10.5C25.4131 8.85 24.0677 7.5 22.4233 7.5Z"
              fill="white"
            />
          </svg>
          <p>formations</p>
        </div>
        <div class="dropdown-content">
          <router-link to="/">Offre de formation</router-link>
          <router-link to="/">M.C.C.</router-link>
          <router-link to="/">Archives</router-link>
        </div>
      </div>
      <div class="parametres py-auto">
        <div class="dropbtn">
          <svg
            width="37"
            height="36"
            viewBox="0 0 37 36"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M29.1726 19.47C29.2326 18.99 29.2777 18.51 29.2777 18C29.2777 17.49 29.2326 17.01 29.1726 16.53L32.3406 14.055C32.6258 13.83 32.7009 13.425 32.5207 13.095L29.5179 7.90501C29.4294 7.75025 29.2886 7.63204 29.1208 7.57157C28.9529 7.51109 28.769 7.51232 28.602 7.57501L24.8635 9.07501C24.0827 8.47501 23.2419 7.98001 22.3261 7.60501L21.7555 3.63001C21.7307 3.45352 21.6423 3.29215 21.5068 3.17616C21.3714 3.06018 21.1982 2.99754 21.0198 3.00001H15.0142C14.6388 3.00001 14.3235 3.27001 14.2785 3.63001L13.7079 7.60501C12.7921 7.98001 11.9513 8.49001 11.1705 9.07501L7.43198 7.57501C7.34493 7.5455 7.25366 7.53031 7.16173 7.53001C6.90649 7.53001 6.65125 7.66501 6.51612 7.90501L3.51328 13.095C3.31809 13.425 3.40818 13.83 3.69345 14.055L6.86144 16.53C6.80139 17.01 6.75634 17.505 6.75634 18C6.75634 18.495 6.80139 18.99 6.86144 19.47L3.69345 21.945C3.40818 22.17 3.33311 22.575 3.51328 22.905L6.51612 28.095C6.60463 28.2498 6.74541 28.368 6.91324 28.4285C7.08107 28.4889 7.26497 28.4877 7.43198 28.425L11.1705 26.925C11.9513 27.525 12.7921 28.02 13.7079 28.395L14.2785 32.37C14.3235 32.73 14.6388 33 15.0142 33H21.0198C21.3952 33 21.7105 32.73 21.7555 32.37L22.3261 28.395C23.2419 28.02 24.0827 27.51 24.8635 26.925L28.602 28.425C28.6921 28.455 28.7822 28.47 28.8723 28.47C29.1275 28.47 29.3828 28.335 29.5179 28.095L32.5207 22.905C32.7009 22.575 32.6258 22.17 32.3406 21.945L29.1726 19.47ZM26.1997 16.905C26.2598 17.37 26.2748 17.685 26.2748 18C26.2748 18.315 26.2448 18.645 26.1997 19.095L25.9895 20.79L27.3258 21.84L28.9473 23.1L27.8963 24.915L25.9895 24.15L24.4281 23.52L23.0768 24.54C22.4312 25.02 21.8156 25.38 21.2 25.635L19.6085 26.28L19.3683 27.975L19.068 30H16.966L16.6807 27.975L16.4405 26.28L14.849 25.635C14.2034 25.365 13.6028 25.02 13.0023 24.57L11.636 23.52L10.0445 24.165L8.13765 24.93L7.08666 23.115L8.70819 21.855L10.0445 20.805L9.83426 19.11C9.78921 18.645 9.75919 18.3 9.75919 18C9.75919 17.7 9.78921 17.355 9.83426 16.905L10.0445 15.21L8.70819 14.16L7.08666 12.9L8.13765 11.085L10.0445 11.85L11.6059 12.48L12.9572 11.46C13.6028 10.98 14.2184 10.62 14.834 10.365L16.4255 9.72001L16.6657 8.02501L16.966 6.00001H19.053L19.3383 8.02501L19.5785 9.72001L21.17 10.365C21.8156 10.635 22.4162 10.98 23.0167 11.43L24.383 12.48L25.9745 11.835L27.8813 11.07L28.9323 12.885L27.3258 14.16L25.9895 15.21L26.1997 16.905ZM18.017 12C14.6989 12 12.0113 14.685 12.0113 18C12.0113 21.315 14.6989 24 18.017 24C21.3351 24 24.0227 21.315 24.0227 18C24.0227 14.685 21.3351 12 18.017 12ZM18.017 21C16.3654 21 15.0142 19.65 15.0142 18C15.0142 16.35 16.3654 15 18.017 15C19.6686 15 21.0198 16.35 21.0198 18C21.0198 19.65 19.6686 21 18.017 21Z"
              fill="white"
            />
          </svg>
          <p>paramètres</p>
        </div>
        <div class="dropdown-content">
          <router-link to="/">Mon compte</router-link>
          <router-link to="/roles">Gestion des utilisateurs</router-link>
        </div>
      </div>
      <div class="login-logout my-auto">
        <button class="uppercase bg-theme-red px-4 py-2 rounded-full ml-2 mr-2">
          Déconnexion
        </button>
      </div>
    </div>
  </div>
</template>

<script>
// import Button from './Button.vue'
export default {
  //   components: { Button },
  mounted() {},
  methods: {},
};
</script>

<style lang="postcss">
.header {
  @apply flex justify-between;
  color: white;
}

.container-logo {
  @apply flex my-auto mx-6;
}

.text-logo {
  @apply font-bold ml-1 pl-0.5;
  font-size: 18px;
  line-height: 24px;
  border-left: solid 2px white;
  letter-spacing: 0.135em;
}

.dropdown-fade-enter-active,
.dropdown-fade-leave-active {
  transition: all 0.5s ease-in-out;
}

.dropdown-fade-enter,
.dropdown-fade-leave-to {
  opacity: 0;
  transform: translateY(-12px);
}

.dropbtn {
  @apply flex items-center justify-center mb-auto mx-auto h-16;
  width: 200px;
  padding: 0px;
}

.nav {
  font-size: 16px;
  line-height: 26px;
  min-width: 50rem;
}

.nav div {
  @apply pr-4;
}

.nav > div:not(:last-child):hover {
  @apply font-bold;
  background: rgba(255, 255, 255, 0.4);
}

.nav svg {
  @apply mr-2;
}

.dropdown-content {
  @apply max-w-sm flex flex-col;
  display: none;
  position: absolute;
  background-color: #fff;
  min-width: 300px;
  box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
  z-index: 1;
}

.dropdown-content a {
  @apply text-sm font-medium;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
}

.dropdown-content a:hover {
  background-color: whitesmoke;
}

.nav > div:not(:last-child):hover .dropdown-content {
  @apply flex flex-col;
}

[aria-hidden="true"] {
  //display: none;
}

</style>