<!--
  -   Project: MEWA Hospital Intranet
  -   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
  -
  -    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
  -
  -->

<template>
    <div class="btn-group">
        <a class="btn btn-default btn-rounded calendar-picker"
           data-toggle="collapse"
           aria-expand="true">
            <span class="date-range-label">{{ dateRange }}</span>
            <span class="caret"></span>
        </a>
    </div>
</template>

<script>
    import moment from 'moment';

    export default {

        props: {
            showRanges: {
                type: Boolean,
                default: false
            },
            startDate: {
                default: function () {
                    return moment().subtract(30, 'days');
                }
            },
            endDate: {
                default: function () {
                    return moment();
                }
            },
            minDate: {
                default: false
            },
            opens: {
                default: 'right'
            },
            maxDate: {
                default: false
            },
            autoApply: {
                default: false
            },
        },

        data() {
            return {
                start: this.startDate,
                end: this.endDate
            };
        },

        computed: {
            dateRange: function () {
                let start = moment(this.start);
                let end = moment(this.end);

                return start.format('LL') + ' - ' + end.format('LL');
            }
        },

        mounted() {
            let vm = this;
            this.start = moment(this.start);
            this.end = moment(this.end);
            this.$nextTick(function () {
                let options = {
                    opens: this.opens,
                    startDate: this.start,
                    endDate: this.end,
                    autoApply: this.autoApply,
                    alwaysShowCalendars: true
                };

                if (this.minDate) {
                    options.minDate = this.minDate;
                }
                if (this.maxDate) {
                    options.maxDate = this.maxDate;
                }
                if (this.showRanges) {
                    options.ranges = {
                        Today: [moment(), moment()],
                        Yesterday: [
                            moment().subtract(1, 'days'),
                            moment().subtract(1, 'days')
                        ],
                        'Last 7 Days': [
                            moment().subtract(6, 'days'),
                            moment()
                        ],
                        'Last 30 Days': [
                            moment().subtract(30, 'days'),
                            moment()
                        ],
                        'This Month': [
                            moment().startOf('month'),
                            moment().endOf('month')
                        ],
                        'Last Month': [
                            moment().subtract(1, 'month').startOf('month'),
                            moment().subtract(1, 'month').endOf('month')
                        ]
                    };
                }
                window.$(this.$el)
                    .daterangepicker(options)
                    .on('apply.daterangepicker', function (e, picker) {
                        vm.$emit('apply', picker.startDate, picker.endDate);
                        vm.start = picker.startDate;
                        vm.end = picker.endDate;
                    });
            });
        }
    }
</script>

<style scoped>

</style>
