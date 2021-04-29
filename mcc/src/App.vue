<template>
  <v-header role="banner"></v-header>
  <router-view/>
</template>


<script>
  import VHeader from '../src/components/Header'

  export default {
    components: {
      VHeader
    }
  }
</script>


<style lang="postcss">
  .header {
    @apply flex justify-between;
    color: white;
    background: linear-gradient(91.71deg, #DD0E40 19.89%, #2B2463 108.53%);

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
    transition: all .5s ease-in-out;
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
  .nav>div:not(:last-child):hover {
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
  .nav>div:not(:last-child):hover .dropdown-content {
    @apply flex flex-col;
  }
  [aria-hidden="true"] {
  //display: none;
  }
  /* button {
      background-color: transparent;
      border: none;
      cursor: pointer;
      font-size: 1em;
  }
  button {
      outline: none;
  }
  svg {
      @apply mr-2;
  }*/
  #nav {
    padding: 30px;
  }
  #nav a {
    font-weight: bold;
    color: #2c3e50;
  }
  #nav a.router-link-exact-active {
    color: #42b983;
  }
</style>
