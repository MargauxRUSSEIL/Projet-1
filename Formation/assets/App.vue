
<template>
    <div class="container">
        <h1>Ceci est notre composant de démo !</h1>
        <button @click="counter++">Click me ! {{counter}}</button>

    </div>
</template>

<script>
export default {
  name: "App",
  data: () => ({
      counter : 0
  })
};
</script> 