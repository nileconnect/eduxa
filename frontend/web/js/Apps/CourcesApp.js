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
        selectAccommodation(acco) {
            // var index = id
            //this.Selectedaccomodtion = this.accomodtion[index]
            //$("#accoTable").show()
            this.accomodtionFees = acco.reg_fees
            this.selectedaccoID = acco.id
            $(".btnAcco").html(acco.title)
            $('#AccoModal').modal('hide')

            // this.accoperiods

            console.log(acco.min_booking_duraion)
            console.log(acco.booking_cycle)

            if (acco.booking_cycle == "Weekly") {
                this.accoperiods = []
                for (i = acco.min_booking_duraion; i < 53; i++) {
                    this.accoperiods.push(i)
                }
            } else {
                this.accoperiods = []
                for (i = acco.min_booking_duraion; i < 13; i++) {
                    this.accoperiods.push(i)
                }
            }

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

                }
            });
        },
        //Get Health Insurance
        GetHealth(event) {
            if (event.srcElement.checked) {
                // console.log(event.target.value)
                this.SelectedHealth = event.target.value
                this.selectedHealthIns = true
            } else {
                this.SelectedHealth = ""
            }

        },
        //After Select Country get its Cities
        SelectCountry() {
            // console.log(this.selectedCountry.id)
            this.countryId = this.selectedCountry.id
            this.countryTitle = this.selectedCountry.title
            $.ajax({
                "url": Api + "states?filter[country_id]=" + this.selectedCountry.id + "&filter[lang]=" + this.lang,
                "method": "GET",
                success: res => {
                    this.Cities = res.items
                }
            });
        },
        //After Select City get its States
        SelectCity() {
            this.cityId = this.selectedCity.id
            this.cityTitle = this.selectedCity.title
            $.ajax({
                "url": Api + "cities?filter[state_id]=" + this.selectedCity.id + "&filter[lang]=" + this.lang,
                "method": "GET",
                success: res => {
                    this.States = res.items
                }
            });

        },
        SelectState() {
            this.stateId = this.selectedState.id
            this.stateTitle = this.selectedState.title
        },
        Selectdate(event) {
            this.SelectedDate = event.target.value
            console.log(this.SelectedDate)
        },

        addStudent() {

            if (this.firstName === "") {
                if (!$("#FormAlert").hasClass("alert-danger")) {
                    $("#FormAlert").addClass("alert-danger")
                    $("#FormAlert").show()
                }
                if (this.lang === "ar") {
                    $("#FormAlert").html("يجب ادخال الاسم الأول")
                } else {
                    $("#FormAlert").html("Please enter your first name")
                }
            } else if (this.lastName === "") {
                if (!$("#FormAlert").hasClass("alert-danger")) {
                    $("#FormAlert").addClass("alert-danger")
                    $("#FormAlert").show()
                }
                if (this.lang === "ar") {
                    $("#FormAlert").html("يجب ادخال الاسم العيلة")
                } else {
                    $("#FormAlert").html("Please enter your last name")
                }
            } else if (this.gender === "") {
                if (!$("#FormAlert").hasClass("alert-danger")) {
                    $("#FormAlert").addClass("alert-danger")
                    $("#FormAlert").show()
                }
                if (this.lang === "ar") {
                    $("#FormAlert").html("يجب اختيار النوع")
                } else {
                    $("#FormAlert").html("Please select gender")
                }
            } else if (this.email === "" || !this.emailReg.test(this.email)) {
                console.log("here")
                if (!$("#FormAlert").hasClass("alert-danger")) {
                    $("#FormAlert").addClass("alert-danger")
                    $("#FormAlert").show()
                }
                if (this.lang === "ar") {
                    $("#FormAlert").html("يجب ادخال البريد الإلكتروني بشكل صحيح")
                } else {
                    $("#FormAlert").html("Please enter a valid email address")
                }
            } else if (this.countryId === "") {
                if (!$("#FormAlert").hasClass("alert-danger")) {
                    $("#FormAlert").addClass("alert-danger")
                    $("#FormAlert").show()
                }
                if (this.lang === "ar") {
                    $("#FormAlert").html("يجب اختيار الدولة")
                } else {
                    $("#FormAlert").html("Please select country")
                }
            } else if (this.cityId === "") {
                if (!$("#FormAlert").hasClass("alert-danger")) {
                    $("#FormAlert").addClass("alert-danger")
                    $("#FormAlert").show()
                }
                if (this.lang === "ar") {
                    $("#FormAlert").html("يجب اختيار المدينة")
                } else {
                    $("#FormAlert").html("Please select city")
                }
            } else if (this.stateId === "") {
                if (!$("#FormAlert").hasClass("alert-danger")) {
                    $("#FormAlert").addClass("alert-danger")
                    $("#FormAlert").show()
                }
                if (this.lang === "ar") {
                    $("#FormAlert").html("يجب اختيار الحي")
                } else {
                    $("#FormAlert").html("Please select state")
                }
            } else if (this.mobile === "") {
                if (!$("#FormAlert").hasClass("alert-danger")) {
                    $("#FormAlert").addClass("alert-danger")
                    $("#FormAlert").show()
                }
                if (this.lang === "ar") {
                    $("#FormAlert").html("يجب ادخال رقم الهاتف")
                } else {
                    $("#FormAlert").html("Please enter mobile number")
                }
            } else if (this.nationality === "") {
                if (!$("#FormAlert").hasClass("alert-danger")) {
                    $("#FormAlert").addClass("alert-danger")
                    $("#FormAlert").show()
                }
                if (this.lang === "ar") {
                    $("#FormAlert").html("يجب ادخال الجنسية")
                } else {
                    $("#FormAlert").html("Please enter nationality")
                }
            } else {
                //Set Student Data
                var student = {
                    "firstName": this.firstName,
                    "lastName": this.lastName,
                    "gender": this.gender,
                    "countryId": this.countryId,
                    "stateId": this.stateId,
                    "cityId": this.cityId,
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
            if (this.StudentsList == "") {
                //  console.log("empty")
                $("#studentError").show()
                document.getElementById('studentError').scrollIntoView();
            } else {
                var data = {
                    "slug": this.slug,
                    "type": "course",
                    'students': this.StudentsList,
                    'course_start_date': this.SelectedDate,
                    'accomodation_option': this.selectedaccoID,
                    'number_of_weeks': this.selectedCourseDuration,
                    'airport_pickup': this.selectedAirportID,
                    'health_insurance': this.selectedHealthIns
                }
                $.ajax({
                    "url": Api + "referral/add-request",
                    "method": "POST",
                    "data": data,
                    success: res => {
                        // console.log(res)
                        if (res.success == true) {
                            $(".successMsg").addClass("show")
                        }
                    }
                });
            }

        },
        submitStudent() {
            // if (this.StudentsList == "") {
            //     //  console.log("empty")
            //     $("#studentError").show()
            //     document.getElementById('studentError').scrollIntoView();
            // } else {
            var data = {
                "slug": this.slug,
                "type": "course",
                // 'students': this.StudentsList,
                'course_start_date': this.SelectedDate,
                'accomodation_option': this.selectedaccoID,
                'number_of_weeks': this.selectedCourseDuration,
                'airport_pickup': this.selectedAirportID,
                'health_insurance': this.selectedHealthIns
            }
            $.ajax({
                "url": Api + "student/course-request",
                "method": "POST",
                "data": data,
                success: res => {
                    // console.log(res)
                    if (res.success == true) {
                        $(".successMsg").addClass("show")
                    }
                }
            });
            // }

        }
    },
    computed: {
        total: function() {
            return Number(this.regFees) + Number(this.bookFees) + Number(this.SelectedHealth) + Number(this.SelectedAirport.cost) + Number(this.CourseDurations) + Number(this.accomodtionFees);

        }

    }
})