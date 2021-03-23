<template>
    <div class="px-10">
        <div class="flex justify-between mt-12">
            <div class="flex items-center ">
                <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M20.8333 25C25.4357 25 29.1667 21.2691 29.1667 16.6667C29.1667 12.0643 25.4357 8.33337 20.8333 8.33337C16.231 8.33337 12.5 12.0643 12.5 16.6667C12.5 21.2691 16.231 25 20.8333 25Z"
                        fill="#362A66" />
                    <path
                        d="M22.229 29.2083C21.7707 29.1875 21.3123 29.1667 20.8332 29.1667C15.7915 29.1667 11.0832 30.5625 7.06234 32.9583C5.229 34.0417 4.1665 36.0833 4.1665 38.2292V43.75H23.4582C21.9867 41.6509 21.0977 39.1994 20.8818 36.645C20.6659 34.0906 21.1307 31.5246 22.229 29.2083ZM43.229 35.4167C43.229 34.9583 43.1665 34.5417 43.104 34.1042L45.479 32L43.3957 28.3958L40.3748 29.4167C39.7082 28.8542 38.9582 28.4167 38.1248 28.1042L37.4998 25H33.3332L32.7082 28.1042C31.8748 28.4167 31.1248 28.8542 30.4582 29.4167L27.4373 28.3958L25.354 32L27.729 34.1042C27.6665 34.5417 27.604 34.9583 27.604 35.4167C27.604 35.875 27.6665 36.2917 27.729 36.7292L25.354 38.8333L27.4373 42.4375L30.4582 41.4167C31.1248 41.9792 31.8748 42.4167 32.7082 42.7292L33.3332 45.8333H37.4998L38.1248 42.7292C38.9582 42.4167 39.7082 41.9792 40.3748 41.4167L43.3957 42.4375L45.479 38.8333L43.104 36.7292C43.1665 36.2917 43.229 35.875 43.229 35.4167ZM35.4165 39.5833C33.1248 39.5833 31.2498 37.7083 31.2498 35.4167C31.2498 33.125 33.1248 31.25 35.4165 31.25C37.7082 31.25 39.5832 33.125 39.5832 35.4167C39.5832 37.7083 37.7082 39.5833 35.4165 39.5833Z"
                        fill="#362A66" />
                </svg>
                <h1 class="montserrat font-bold text-2xl text-theme-bleu-marine">Gestion des rôles</h1>
            </div>
            <div class="pr-10 inter font-bold text-xl text-white space-x-10">
                <button class="add-composante-role">Ajouter une composante</button>
                <button class="add-composante-role">Ajouter un rôle</button>
            </div>
        </div>
        <div class="mt-10 mb-5 space-x-6">
            <input type="text" placeholder="recherche" class="input-recherche shadow-box">
            <select name="composante" id="" class="shadow-box select-composante-poste">
                <option value="">Trie par composante</option>
                <option value="option1">Option 1</option>
                <option value="option2">Option 2</option>
                <option value="option3">Option 3</option>
            </select>
            <select name="poste" id="" class="shadow-box select-composante-poste">
                <option value="">Trie par poste</option>
                <option value="option1">Option 1</option>
                <option value="option2">Option 2</option>
                <option value="option3">Option 3</option>
            </select>
        </div>
        <div>
            <table role="presentation" class="shadow-box w-full rounded-lg">
                <caption>Tableau de gestion des rôles</caption>
                <thead>
                    <tr class="text-theme-bleu-marine inter font-semibold text-xl border-b my-3">
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Courriel</th>
                        <th>Composante</th>
                        <th>Poste</th>
                        <th>Edition</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th><input type="text" value="Marchand"></th>
                        <th><input type="text" value="Aline"></th>
                        <th><input type="text" value="a.marchand@mail.com"></th>
                        <th>
                            <select name="composante" id="">
                                <option value="">Sélectionner une composante</option>
                                <option value="CY">CY</option>
                            </select>
                        </th>
                        <th>
                            <select name="poste" id="">
                                <option value="">Sélectionner un poste</option>
                                <option value="admin">Administrateur</option>
                            </select>
                        </th>
                        <th class="flex justify-around items-center">
                            <button>
                                <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M13.1632 0.793091C6.32997 0.793091 0.78418 6.33888 0.78418 13.1721C0.78418 20.0053 6.32997 25.5511 13.1632 25.5511C19.9964 25.5511 25.5422 20.0053 25.5422 13.1721C25.5422 6.33888 19.9964 0.793091 13.1632 0.793091ZM10.6874 19.3616L4.49788 13.1721L6.24332 11.4267L10.6874 15.8583L20.083 6.46267L21.8285 8.22049L10.6874 19.3616Z"
                                        fill="#38BB6C" />
                                </svg>
                            </button>
                            <button>
                                <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12.7179 0.793213C5.89395 0.793213 0.338867 6.34829 0.338867 13.1722C0.338867 19.9961 5.89395 25.5512 12.7179 25.5512C19.5418 25.5512 25.0969 19.9961 25.0969 13.1722C25.0969 6.34829 19.5418 0.793213 12.7179 0.793213ZM18.9074 17.1799L16.7256 19.3617L12.7179 15.354L8.71017 19.3617L6.52837 17.1799L10.5361 13.1722L6.52837 9.16451L8.71017 6.98271L12.7179 10.9904L16.7256 6.98271L18.9074 9.16451L14.8997 13.1722L18.9074 17.1799Z"
                                        fill="#DD0E27" />
                                </svg>
                            </button>
                        </th>

                    </tr>
                    <tr>
                        <th><input type="text" value="Marchand" readonly aria-readonly=""></th>
                        <th><input type="text" value="Aline" readonly aria-readonly=""></th>
                        <th><input type="text" value="a.marchand@mail.com" readonly aria-readonly=""></th>
                        <th><input type="text" value="CY" readonly aria-readonly=""></th>
                        <th><input type="text" value="Administrateur" readonly aria-readonly=""></th>
                        <th class="flex justify-around items-center">
                            <button>
                                <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <ellipse cx="12.9405" cy="12.7347" rx="12.379" ry="12.3522" fill="#362A66" />
                                    <g clip-path="url(#clip0)">
                                        <path
                                            d="M21.4932 23.9457H4.61279V20.5769H21.4932V23.9457ZM13.9477 8.10395L17.1127 11.2622L9.46591 18.8925H6.30083V15.7343L13.9477 8.10395ZM18.0158 10.361L14.8508 7.2028L16.3953 5.66158C16.4734 5.58351 16.5661 5.52157 16.6682 5.4793C16.7704 5.43704 16.8798 5.41529 16.9903 5.41529C17.1009 5.41529 17.2103 5.43704 17.3124 5.4793C17.4145 5.52157 17.5073 5.58351 17.5854 5.66158L19.5604 7.63232C19.8896 7.96078 19.8896 8.49136 19.5604 8.81982L18.0158 10.361Z"
                                            fill="white" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0">
                                            <rect width="20.2565" height="20.2127" fill="white"
                                                transform="translate(2.92432 0.328369)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </button>
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {

    }
</script>

<style scoped lang="postcss">
    .add-composante-role {
        @apply bg-theme-bleu-marine py-3 px-6 rounded-md;
        box-shadow: -2px 2px 2px rgba(0, 41, 107, 0.25), 2px -2px 2px rgba(255, 255, 255, 0.4), 2px 2px 2px rgba(0, 41, 107, 0.4), -2px -2px 2px rgba(255, 255, 255, 0.4), inset 1px 1px 2px rgba(0, 0, 0, 0.25);
    }
    .input-recherche {
        @apply rounded-full pl-6 py-1;
    }
    .shadow-box {
        box-shadow: -1.46429px 1.46429px 1.46429px rgba(0, 41, 107, 0.25), 1.46429px -1.46429px 1.46429px rgba(255, 255, 255, 0.4), 1.46429px 1.46429px 1.46429px rgba(0, 41, 107, 0.4), -1.46429px -1.46429px 1.46429px rgba(255, 255, 255, 0.4), inset 0.732143px 0.732143px 1.46429px rgba(0, 0, 0, 0.25);
    }
    .select-composante-poste {
        @apply py-1 px-3 rounded-md font-semibold;
    }
    table tr th input {
        @apply text-center;
    }
    table tr:not(:last-child) {
        @apply border-b;
    }
    tbody tr:hover {
        background: #D6D6D6;
    }
    thead tr th {
        @apply py-1;
    }
    tbody tr th {
        @apply py-2;
    }
</style>