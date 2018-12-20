<!--
  -  Project: MEWA Hospital Intranet
  -  Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
  -  Last Modified: 10/27/18 4:19 PM.
  -
  -   Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
  -->

<template>
    <div class="form-group">
        <label>{{ this.label }} </label>
        <input type="text" class="form-control " name="" placeholder="Date" ref="input"
               :value="value">
    </div>
</template>

<script>
    import Pikaday from 'pikaday';

    export default {
        props: {
            label: {required: true},
            value: {required: true},
            format: {default: 'YYYY-MM-DD'},
        },

        mounted() {
            const picker = new Pikaday({
                    field: this.$refs.input,
                    format: this.format,
                    onSelect: () => {
                        this.$emit('input', picker.toString())
                    },

                })
                }
    }
</script>

<style scoped>

</style>