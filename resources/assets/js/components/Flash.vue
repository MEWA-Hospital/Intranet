<!--
  -   Project: MEWA Hospital Intranet
  -   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
  -
  -    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
  -
  -->

<template>
    <div class="alert alert-flash"
         :class="'alert-'+level"
         role="alert"
         v-show="show"
         v-text="body">
    </div>
</template>

<script>
    export default {
        props: ['message'],

        data() {
            return {
                body: this.message,
                level: 'success',
                show: false
            }
        },

        created() {
            if (this.message) {
                this.flash();
            }

            window.events.$on(
                'flash', data => this.flash(data)
            );
        },

        methods: {
            flash(data) {
                if (data) {
                    this.body = data.message;
                    this.level = data.level;
                }

                this.show = true;

                this.hide();
            },

            hide() {
                setTimeout(() => {
                    this.show = false;
                }, 3000);
            }
        }
    };
</script>

<style>
    .alert-flash {
        position: fixed;
        right: 25px;
        bottom: 25px;
    }
</style>
