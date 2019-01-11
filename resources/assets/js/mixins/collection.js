/*
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

export default {
    data() {
        return {
            items: []
        };
    },

    methods: {
        add(item) {
            this.items.push(item);
        },

        remove(index) {
            this.items.splice(index, 1);
        },
    }
}
