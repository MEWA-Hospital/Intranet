<!--
  -  Project: MEWA Hospital Intranet
  -  Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
  -  Last Modified: 10/27/18 4:19 PM.
  -
  -   Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
  -->

<template>
    <div v-else class="card">
        <div class="card-header bg-transparent header-elements-inline">
            <span class="text-uppercase font-size-sm font-weight-semibold">Event countdown</span>

        </div>

        <div class="card-body">

            <div class="d-flex justify-content-center text-center mb-2">
                <div class="timer-number font-weight-light">
                    {{ remaining.days }} <span class="d-block font-size-base mt-2">Days</span>
                </div>
                <div class="timer-dots mx-1">:</div>
                <div class="timer-number font-weight-light">
                    {{ remaining.hours }} <span class="d-block font-size-base mt-2">hours</span>
                </div>
                <div class="timer-dots mx-1">:</div>
                <div class="timer-number font-weight-light">
                    {{ remaining.minutes }} <span class="d-block font-size-base mt-2">minutes</span>
                </div>
                <div class="timer-dots mx-1">:</div>
                <div class="timer-number font-weight-light">
                    {{ remaining.seconds }} <span class="d-block font-size-base mt-2">seconds</span>
                </div>
            </div>
        </div>

        <div class="card-footer d-flex align-items-center">

        </div>
    </div>
</template>

<script>
    import moment from 'moment';

    export default {
        props: {
            until: String,
        },
        data() {
            return {
                now: new Date()
            }
        },

        created() {
            let interval = this.refreshEverySecond();

            this.$on('finished', () => clearInterval(interval));
        },

        computed: {
            finished() {
                return this.remaining.total <= 0;
            },

            remaining() {

                let remaining = moment.duration(Date.parse(this.until) - this.now);

                if (remaining <= 0) {
                    this.$emit('finished')
                }
                return {
                    total: remaining,
                    days: remaining.days(),
                    hours: remaining.hours(),
                    minutes: remaining.minutes(),
                    seconds: remaining.seconds()
                }
            },
        },
        methods: {
            refreshEverySecond() {
                return setInterval(() => {
                    this.now = new Date;
                }, 1000);
            }
        }
    }
</script>

