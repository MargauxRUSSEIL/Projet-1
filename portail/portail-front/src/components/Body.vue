<template>
    <div class="body h-screen">
        <v-header role="banner"></v-header>
        <v-test></v-test>
        <v-body-container role="main"></v-body-container>
    </div>
</template>

<script>
    import VHeader from '@/components/Header.vue'
    import VBodyContainer from '@/components/BodyContainer.vue'
    import VTest from '@/components/Test.vue'


    export default {
        components: {
            VHeader,
            VBodyContainer,
            VTest
        }
    }
</script>

<style>
    .body {
        background: linear-gradient(119.51deg, #DD0E40 12.06%, #00296B 81.29%);
    }

    
</style>