<!--
  - Project: MEWA Hospital Intranet
  -  Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
  -  Last Modified: 10/27/18 4:19 PM.
  -
  -  Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0
  -   (https://opensource.org/licenses/AGPL-3.0).
  -->

<script>
    export default {
        props: ['attributes', 'news'],
        data() {
            return {
                editing: false,
                body: this.attributes.body
            }
        },
        methods: {
            update() {
                axios.patch('/comments/' + this.attributes.id, {
                    body: this.body,
                });

                this.editing = false;
            },
            deleteComment() {
                axios.delete('/comments/' + this.attributes.id);

            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
