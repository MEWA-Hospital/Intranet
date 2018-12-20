<!--
  -  Project: MEWA Hospital Intranet
  -  Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
  -  Last Modified: 10/27/18 4:19 PM.
  -
  -   Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
  -->

<template>
    <div>
         <input id="x" type="hidden" :name="name" :value="value">
          <trix-editor ref="trix" input="x"></trix-editor>
    </div>

</template>

<script>
    import Trix from 'trix';

    export default {
        props: ['name', 'value'],

        mounted() {
            this.$refs.trix.addEventListener('trix-change', e => {
                console.log('handling')
                this.$emit('input', e.target.innerHTML)
            })
        }
    }
</script>
