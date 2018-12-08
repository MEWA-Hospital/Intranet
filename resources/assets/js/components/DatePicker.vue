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