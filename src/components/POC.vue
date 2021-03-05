<template>
    <v-app>
        <div v-for="(currency, index) in datafacker" :key="index">
            <template v-if="currency.type_field === 'inputText'">
                <v-flex xs5>
                    <v-text-field
                            :label="currency.label_field"
                            outlined
                    ></v-text-field>
                </v-flex>
            </template>
            <template v-else-if="currency.type_field === 'inputNumber'">
                <v-flex xs5>
                    <v-text-field
                            :label="currency.label_field"
                            type="number"
                            outlined
                    ></v-text-field>
                </v-flex>
            </template>
            <template v-else-if="currency.type_field === 'select'">
                    <v-flex xs5>
                        <v-select
                                :items="options"
                                :label="currency.label_field"
                                outlined
                                chips
                                deletable-chips
                        ></v-select>
                    </v-flex>
            </template>
        </div>
    </v-app>
</template>

<script>
    export default {
        name: "POC",
        data() {
            return {
                datafacker: [
                    { label_field:"Nom du diplôme", type_field:"inputText", value_field:"string" },
                    { label_field:"Nombre ECCTS", type_field:"inputNumber", value_field:"number" },
                    { label_field:"Composante", type_field:"select", value_field:"string"},
                ],
                options: [ "science", "droit" ]
            }
        }
    }
</script>

<style scoped>

</style>