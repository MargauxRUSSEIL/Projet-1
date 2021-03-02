<template>
    <div class=" flex justify-between h-5/6">
        <div class="flex flex-col justify-around h-full">
            <div>
                <p class="title montserrat font-semibold uppercase pl-16">
                    Gérez et créez les formations <br>
                    d’aujourd’hui et de demain
                </p>
            </div>
            <div>
                <button class="formation-button ">Accéder aux services formations </button>
            </div>
        </div>
        <div class="img-container w-96 mx-auto my-auto">
            <img src="@/assets/img/imgBody.png" alt="">
        </div>
    </div>
</template>

<script>
    export default {

    }
</script>

<style lang="postcss">
    .title {
        color: white;
        font-size: 30px;
        line-height: 44px;
    }

    .formation-button {
        @apply rounded-r-full px-14 uppercase py-6 text-theme-blue font-extrabold underline;
        background: white;
        font-size: 22px;
        line-height: 20px;
        letter-spacing: 0.1em;
        filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));
    }

    img {
        background-blend-mode: hard-light;
    }
</style>