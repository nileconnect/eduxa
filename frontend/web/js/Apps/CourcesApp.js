Vue.component('v-select', VueSelect.VueSelect);
var app = new Vue({
    el: '#courcesApp',
    data() {
        return {
            accomodtion: [],
            Selectedaccomodtion: {},
            airports: {},
            StartDates: {},
            SelectedAirport: {},
            CourseDurations: "",
            lang: $("#courcesApp").attr("data-lang"),
            SchoolID: $("#courcesApp").attr("data-SchoolId"),
            CourseID: $("#courcesApp").attr("data-CourseID"),

        }

    },
    mounted() {
        //Get accomodtion
        $.ajax({
            "url": Api + "school-accomodtion?filter[school_id]=" + this.SchoolID + "&filter[lang]=" + this.lang,
            "method": "GET",
            success: res => {
                this.accomodtion = res.items
            }
        });
        //Get airports
        //http://eduxa.localhost/rest/school-airports?filter[school_id]=3&filter[lang]=ar
        $.ajax({
            "url": Api + "school-airports?filter[school_id]=" + this.SchoolID + "&filter[lang]=" + this.lang,
            "method": "GET",
            success: res => {
                this.airports = res.items
            }
        });

        //Get start-dates
        //http://eduxa.localhost/rest/course/start-dates?filter[course_id]=2&filter[lang]=ar
        $.ajax({
            "url": Api + "course/start-dates?filter[course_id]=" + this.CourseID + "&filter[lang]=" + this.lang,
            "method": "GET",
            success: res => {
                this.StartDates = res.data.items

            }
        });


    },
    methods: {
        selectAccommodation(event) {
            var index = event.target.value
            this.Selectedaccomodtion = this.accomodtion[index]
            $("#accoTable").show()

        },
        SelectAirport(event) {
            this.SelectedAirport = this.airports[event.target.value]
        },
        //Get duration-cost
        GetCourseDurations(event) {
            //http://eduxa.localhost/rest/course/duration-cost?filter[course_id]=2&filter[no_of_weeks]=3&filter[lang]=ar
            $.ajax({
                "url": Api + "course/duration-cost?filter[course_id]=" + this.CourseID + "&filter[no_of_weeks]=" + event.target.value + "&filter[lang]=" + this.lang,
                "method": "GET",
                success: res => {
                    this.CourseDurations = res.data.cost

                }
            });
        },
        //Get Health Insurance
        GetHealth(event) {
            console.log(event.target.value)
        }
    }
})