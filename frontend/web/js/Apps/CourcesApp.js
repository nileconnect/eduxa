Vue.component('v-select', VueSelect.VueSelect);
var app = new Vue({
    el: '#courcesApp',
    data() {
        return {
            accomodtion: [],
            Selectedaccomodtion: {},
            accomodtionFees: "",
            airports: {},
            StartDates: {},
            SelectedAirport: {},
            CourseDurations: "",
            SelectedHealth: "",
            calcHealthIns:'',
            lang: $("#courcesApp").attr("data-lang"),
            SchoolID: $("#courcesApp").attr("data-SchoolId"),
            CourseID: $("#courcesApp").attr("data-CourseID"),
            regFees: $("#regFees").attr("data-value"),
            bookFees: $("#bookFees").attr("data-value"),
            SelectedDate: "",
            selectedaccoID: "",
            selectedCourseDuration: "",
            selectedAirportID: "",
            selectedHealthIns: false,
            //Add Student
            Countries: [],
            selectedCountry: null,
            Cities: [],
            selectedCity: null,
            States: [],
            selectedState: null,
            StudentsList: [],
            countryId: "",
            countryTitle: "",
            cityId: "",
            cityTitle: "",
            stateId: "",
            stateTitle: "",
            lang: $("#courcesApp").attr("data-lang"),
            slug: $("#courcesApp").attr("data-CourseSlug"),
            firstName: "",
            lastName: "",
            gender: "",
            email: "",
            mobile: "",
            nationality: "",
            emailReg: /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/,
            regex: new RegExp(/^(009665|9665|\+9665|05|5)(5|0|3|6|4|9|1|8|7)([0-9]{7})$/),
            accoperiods: [],
            Selectedperiod: "",
            week: "",
            // totals: Number($("#regFees").attr("data-value")) + Number($("#bookFees").attr("data-value"))
            //+ Number(this.bookFees) + Number(this.SelectedHealth) + Number(this.SelectedAirport.cost) + Number(this.CourseDurations) + Number(this.accomodtionFees)

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

        //Get Countries
        $.ajax({
            "url": Api + "country?filter[lang]=" + this.lang,
            "method": "GET",
            success: res => {
                this.Countries = res.items
            }
        });





    },
    methods: {

        cancelAccommo() {
            this.selectedaccoID = ""
            if (this.lang == "en") {
                $(".btnAcco").html("Accommodation options")
            } else {
                $(".btnAcco").html("خيارات الأقامة")
            }
            $(".cancelAccommo").hide()
            this.accomodtionFees = ""
        },
        selectAccommodation(acco) {
            this.accomodtionFees = acco.reg_fees
            this.selectedaccoID = acco.id

            $(".btnAcco").html(acco.title)
            $('#AccoModal').modal('hide')
            $(".cancelAccommo").show()
            if (acco.booking_cycle == "Weekly") {
                if (this.lang == "en") {
                    this.week = "weeks"
                } else {
                    this.week = "اسابيع"
                }


                this.accoperiods = []
                for (i = acco.min_booking_duraion; i < 53; i++) {
                    this.accoperiods.push(i)
                }
            } else {

                if (this.lang == "en") {
                    this.week = "months"
                } else {
                    this.week = "شهور"
                }
                this.accoperiods = []
                for (i = acco.min_booking_duraion; i < 13; i++) {
                    this.accoperiods.push(i)
                }
            }

        },
        Selectperiod(event) {
            this.Selectedperiod = event.target.value

            $.ajax({
                "url": Api + "course/accommodation-cost?filter[accommodation_id]=" + this.selectedaccoID + "&filter[period]=" + this.Selectedperiod + "&filter[lang]=" + this.lang,
                "method": "GET",
                success: res => {
                    this.accomodtionFees = res.data.cost

                }
            });
        },
        SelectAirport(event) {
            this.SelectedAirport = this.airports[event.target.value]
            this.selectedAirportID = this.SelectedAirport.id
        },
        //Get duration-cost
        GetCourseDurations(event) {
            //http://eduxa.localhost/rest/course/duration-cost?filter[course_id]=2&filter[no_of_weeks]=3&filter[lang]=ar
            this.selectedCourseDuration = event.target.value
            $.ajax({
                "url": Api + "course/duration-cost?filter[course_id]=" + this.CourseID + "&filter[no_of_weeks]=" + event.target.value + "&filter[lang]=" + this.lang,
                "method": "GET",
                success: res => {
                    this.CourseDurations = res.data.cost

                },
                error: res => {
                    this.CourseDurations = ""
                    this.selectedCourseDuration = ""
                }
            });

            if(this.SelectedHealth){
               
                this.calcHealthIns = this.SelectedHealth*this.selectedCourseDuration
            }
        },
        //Get Health Insurance
        GetHealth(event) {
            if (event.srcElement.checked) {
                this.SelectedHealth = event.target.value
                this.selectedHealthIns = true
                this.calcHealthIns = this.SelectedHealth*this.selectedCourseDuration

            } else {
                this.SelectedHealth = ""
                this.calcHealthIns=""
            }

        },
        //After Select Country get its Cities
        SelectCountry() {
            this.countryId = this.selectedCountry.id
            this.countryTitle = this.selectedCountry.title
            $.ajax({
                "url": Api + "states?filter[country_id]=" + this.selectedCountry.id + "&filter[lang]=" + this.lang,
                "method": "GET",
                success: res => {
                    this.States = res.items
                }
            });
        },
        //After Select City get its States
        // SelectCity() {
        //     this.cityId = this.selectedCity.id
        //     this.cityTitle = this.selectedCity.title
        //     $.ajax({
        //         "url": Api + "cities?filter[state_id]=" + this.selectedCity.id + "&filter[lang]=" + this.lang,
        //         "method": "GET",
        //         success: res => {
        //             this.States = res.items
        //         }
        //     });

        // },
        // SelectState() {
        //     this.stateId = this.selectedState.id
        //     this.stateTitle = this.selectedState.title
        // },
        SelectCity() {
            this.cityId = this.selectedCity.id
            this.cityTitle = this.selectedCity.title
        },
        SelectState() {
            this.stateId = this.selectedState.id
            this.stateTitle = this.selectedState.title
            $.ajax({
                "url": Api + "cities?filter[state_id]=" + this.selectedState.id + "&filter[lang]=" + this.lang,
                "method": "GET",
                success: res => {
                    this.Cities = res.items
                }
            });
        },
        Selectdate(event) {
            this.SelectedDate = event.target.value
        },

        addStudent() {

            if (this.firstName.length < 2 && this.firstName.length < 15) {
                if (!$("#FormAlert").hasClass("alert-danger")) {
                    $("#FormAlert").addClass("alert-danger")
                    $("#FormAlert").show()
                }
                if (this.lang === "ar") {
                    $("#FormAlert").html("الأسم الاول يجب الا يقل عن حرفين")
                } else {
                    $("#FormAlert").html("First name must not be less than two letters.")
                }
            } else if (this.lastName.length < 2 && this.lastName.length < 15) {
                if (!$("#FormAlert").hasClass("alert-danger")) {
                    $("#FormAlert").addClass("alert-danger")
                    $("#FormAlert").show()
                }
                if (this.lang === "ar") {
                    $("#FormAlert").html("الأسم العائلة يجب الا يقل عن حرفين")
                } else {
                    $("#FormAlert").html("Last name must not be less than two letters.")
                }
            } else if (this.gender === "") {
                if (!$("#FormAlert").hasClass("alert-danger")) {
                    $("#FormAlert").addClass("alert-danger")
                    $("#FormAlert").show()
                }
                if (this.lang === "ar") {
                    $("#FormAlert").html("يجب اختيار النوع")
                } else {
                    $("#FormAlert").html("Please select gender.")
                }
            } else if (this.email === "" || !this.emailReg.test(this.email)) {
                if (!$("#FormAlert").hasClass("alert-danger")) {
                    $("#FormAlert").addClass("alert-danger")
                    $("#FormAlert").show()
                }
                if (this.lang === "ar") {
                    $("#FormAlert").html("يجب ادخال البريد الإلكتروني بشكل صحيح")
                } else {
                    $("#FormAlert").html("Please enter a valid email address.")
                }
            } else if (this.countryId === "") {
                if (!$("#FormAlert").hasClass("alert-danger")) {
                    $("#FormAlert").addClass("alert-danger")
                    $("#FormAlert").show()
                }
                if (this.lang === "ar") {
                    $("#FormAlert").html("يجب اختيار الدولة")
                } else {
                    $("#FormAlert").html("Please select country.")
                }
            } else if (this.cityId === "") {
                if (!$("#FormAlert").hasClass("alert-danger")) {
                    $("#FormAlert").addClass("alert-danger")
                    $("#FormAlert").show()
                }
                if (this.lang === "ar") {
                    $("#FormAlert").html("يجب اختيار المدينة")
                } else {
                    $("#FormAlert").html("Please select city.")
                }
            } else if (this.stateId === "") {
                if (!$("#FormAlert").hasClass("alert-danger")) {
                    $("#FormAlert").addClass("alert-danger")
                    $("#FormAlert").show()
                }
                if (this.lang === "ar") {
                    $("#FormAlert").html("يجب اختيار الحي")
                } else {
                    $("#FormAlert").html("Please select state.")
                }
            } else if (this.mobile === "") {
                if (!$("#FormAlert").hasClass("alert-danger")) {
                    $("#FormAlert").addClass("alert-danger")
                    $("#FormAlert").show()
                }
                if (this.lang === "ar") {
                    $("#FormAlert").html("يجب ادخال رقم الهاتف")
                } else {
                    $("#FormAlert").html("Please enter mobile number.")
                }
            } else if (this.nationality.length < 2 && this.nationality.length < 15) {
                if (!$("#FormAlert").hasClass("alert-danger")) {
                    $("#FormAlert").addClass("alert-danger")
                    $("#FormAlert").show()
                }
                if (this.lang === "ar") {
                    $("#FormAlert").html("الجنسية يجب الا يقل عن حرفين")
                } else {
                    $("#FormAlert").html("Nationality must not be less than two letters.")
                }
            } else {
                $("#FormAlert").hide()
                    //Set Student Data
                var student = {
                    "firstName": this.firstName,
                    "lastName": this.lastName,
                    "gender": this.gender,
                    "countryId": this.countryId,
                    "stateId": this.cityId,
                    "cityId": this.stateId,
                    "countryTitle": this.countryTitle,
                    "stateTitle": this.stateTitle,
                    "cityTitle": this.cityTitle,
                    "email": this.email,
                    "mobile": this.mobile,
                    "nationality": this.nationality
                }
                this.StudentsList.push(student)

                //Reset Form
                this.firstName = ""
                this.lastName = ""
                this.gender = ""
                this.email = ""
                this.mobile = ""
                this.nationality = ""
            }



        },
        deleteStudent(index) {
            this.StudentsList.splice(index, 1)
        },
        submitReferal() {
            if (this.SelectedDate == 0) {

                $(".selectdateerror").show()

            } else if (!this.selectedCourseDuration) {
                $(".durationerror").show()

            } else {

                if (this.StudentsList == "") {
                    $("#studentError").show()
                    document.getElementById('studentError').scrollIntoView();
                } else {
                    var data = {
                        "slug": this.slug,
                        "type": "course",
                        'students': this.StudentsList,
                        'course_start_date': this.SelectedDate,
                        'accomodation_option': this.selectedaccoID,
                        'accomodation_period': this.Selectedperiod,
                        'number_of_weeks': this.selectedCourseDuration,
                        'airport_pickup': this.selectedAirportID,
                        'health_insurance': this.selectedHealthIns
                    }
                    $.ajax({
                        "url": Api + "referral/add-request",
                        "method": "POST",
                        "data": data,
                        success: res => {
                            if (res.success == true) {
                                console.log("here success")
                                $(".successMsg").addClass("show")
                            }
                        }
                    });
                }
            }

        },
        submitStudent() {
            if (this.selectedCourseDuration === "") {
                $(".durationerror").show()
                return;
            }

            if (this.SelectedDate == 0) {

                $(".selectdateerror").show()

            } else if (!this.selectedCourseDuration) {
                $(".durationerror").show()

            } else {
                $(".selectdateerror").hide()
                $(".durationerror").hide()
                var data = {
                    "slug": this.slug,
                    "type": "course",
                    // 'students': this.StudentsList,
                    'course_start_date': this.SelectedDate,
                    'accomodation_option': this.selectedaccoID,
                    'accomodation_period': this.Selectedperiod,
                    'number_of_weeks': this.selectedCourseDuration,
                    'airport_pickup': this.selectedAirportID,
                    'health_insurance': this.selectedHealthIns
                }
                $.ajax({
                    "url": Api + "student/course-request",
                    "method": "POST",
                    "data": data,
                    success: res => {
                        if (res.success == true) {
                            $("#successMsg").addClass("show")
                        }
                    },
                    error: res => {
                        $("#errorMsg").addClass("show")
                    }
                });
            }



        }
    },
    computed: {
        total: function() {
            var airportcost = 0
            if (Number(this.SelectedAirport.cost)) {
                airportcost = Number(this.SelectedAirport.cost)
            }
            // +this.regFees + +this.bookFees + +this.SelectedHealth + +this.CourseDurations + +parseInt(this.accomodtionFees) + +airportcost

            return Number(this.regFees) + Number(this.bookFees) + Number(this.calcHealthIns) + Number(this.CourseDurations) + Number(this.accomodtionFees) + airportcost
                //


        }

    }
})