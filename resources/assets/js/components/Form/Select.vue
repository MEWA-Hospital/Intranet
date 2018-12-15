<template>
    <select  :class="this.formClass">
        <option v-for="item in list" :value="item.id">{{ item.name }}</option>
    </select>

</template>

<script>
    export default {
        props: ['options', 'data-url', 'formClass', 'dispatch-id'],

        data() {
            return {
                list: []
            }
        },

        ready() {
            var options = $.extend({}, this.options);
            this.bind(options);
            console.log(this.dispatchId);
        },

        methods: {
            bind(options) {
                var self = this;
                var data = options.data;
                // Map any select2 "data" params to the list data array, so vue can bind the list data.
                if (data) {
                    this.$set('list', data);
                    options.data = undefined;
                }
                $(this.$el).find('select').select2(options).on('change', function () {
                    // Notify the listeners that the values have changed
                    self.notify($(this).val());
                });
                // Populate the list via ajax if "data-url" prop has been defined.
                if (this.dataUrl !== undefined) {
                    this.getList(this.dataUrl);
                }
            },
            getList(url) {
                var self = this;
                this.$http.get(url)
                    .then(response => {
                        self.$set('list', JSON.parse(response.data));
                    });
            },
            flattenArray(key) {
                var list = this.list;
                var flattened = [];
                for (let i = 0; i < list.length; i++) {
                    let value = list[i][key];
                    flattened[i] = value.toString();
                }
                return flattened;
            },
            filterSelected(filterArray) {
                var ids = this.flattenArray('id');
                // Return all selected values that were pre-loaded (i.e. are in this.list).
                return ids.filter(x => filterArray.indexOf(x) >= 0);
            },
            filterCreated(filterArray) {
                var ids = this.flattenArray('id');
                // Return all tags that have been created (i.e. are not in this.list)
                return filterArray.filter(x => ids.indexOf(x) < 0);
            },
            notify(value) {
                this.notifySelected(value);
                this.notifyTagCreated(value);
            },
            notifySelected(value) {
                this.$dispatch('select2-selected', this.filterSelected(value), this.dispatchId);
            },
            notifyTagCreated(tags) {
                this.$dispatch('select2-tag-created', this.filterCreated(tags), this.dispatchId);
            }
        },


    }
</script>

<style scoped>

</style>