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