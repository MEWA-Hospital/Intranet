<!--
  -   Project: MEWA Hospital Intranet
  -   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
  -
  -    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
  -
  -->

<template>
    <div class="form-check">
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input">
            Activate account
        </label>
    </div>
</template>

<script>
    export default {
        props: ['value'],

        methods: {
            toggle() {
                this.value = !this.value
            }
        }
    }
</script>

<style scoped>

</style>
