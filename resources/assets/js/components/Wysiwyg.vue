<template>
    <div>
         <input id="x" type="hidden" :name="name">
          <trix-editor input="x"></trix-editor>
    </div>

</template>

<script>
    import Trix from 'trix';

    export default {
        props: ['name']
    }
</script>
