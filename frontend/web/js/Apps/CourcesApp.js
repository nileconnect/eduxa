Vue.component('v-select', VueSelect.VueSelect);
var app = new Vue({
    el: '#courcesApp',
    data() {
        return {
            accomodtion: [],
            Selectedaccomodtion: {},
            lang: $("#courcesApp").attr("data-lang"),
            SchoolID: $("#courcesApp").attr("data-SchoolId"),

        }

    },
    mounted() {
        //Get Countries
        $.ajax({
            "url": Api + "school-accomodtion?filter[school_id]=" + this.SchoolID + "&filter[lang]=" + this.lang,
            "method": "GET",
            success: res => {
                this.accomodtion = res.items
            }
        });
    },
    methods: {
        selectAccommodation(event) {
            console.log(event.target.value)

        }
    }
})