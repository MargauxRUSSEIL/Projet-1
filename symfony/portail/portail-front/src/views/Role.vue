<template>
  <div>
    <v-header role="banner" class="header" ></v-header>
    <v-body-role ></v-body-role>
  </div>
</template>

<script>
    import VHeader from '@/components/Header.vue'
    import VBodyRole from '@/components/BodyRole.vue'

export default {
    components: {
        VHeader,
        VBodyRole
    }
}
</script>

<style lang="postcss" scoped>

    .header {
        background: linear-gradient(91.71deg, #DD0E40 19.89%, #2B2463 108.53%);
    }
</style>