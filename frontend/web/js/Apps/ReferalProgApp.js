Vue.component('v-select', VueSelect.VueSelect);
var app = new Vue({
    el: '#ReferalProgApp',
    data() {
        return {
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
            lang: $("#ReferalProgApp").attr("data-lang"),
            slug: $("#ReferalProgApp").attr("data-slug"),
            firstName: "",
            lastName: "",
            gender: "",
            email: "",
            mobile: "",
            nationality: "",
            emailReg: /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/,
            regex: new RegExp(/^(009665|9665|\+9665|05|5)(5|0|3|6|4|9|1|8|7)([0-9]{7})$/),
        }

    },
    mounted() {
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
        //After Select Country get its Cities
        SelectCountry() {
            // console.log(this.selectedCountry.id)
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
                    "stateId": this.stateId,
                    "cityId": this.cityId,
                    "countryTitle": this.countryTitle,
                    "stateTitle": this.stateTitle,
                    "cityTitle": this.cityTitle,
                    "email": this.email,
                    "mobile": this.mobile,
                    "nationality": this.nationality
                }
                console.log(student)
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
                console.log("empty")
            } else {
                var data = {
                    "slug": this.slug,
                    "type": "programe",
                    'students': this.StudentsList
                }
                $.ajax({
                    "url": Api + "referral/add-request",
                    "method": "POST",
                    "data": data,
                    success: res => {
                        console.log(res)
                        if (res.success == true) {
                            $("#successMsg").addClass("show")
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
            }
            $.ajax({
                "url": Api + "student/program-request",
                "method": "POST",
                "data": data,
                success: res => {
                    // console.log(res)
                    if (res.success == true) {

                        $("#successMsg").addClass("show")
                    }
                },
                error: res => {
                    alert("error")
                    $("#errorMsg").addClass("show")
                }
            });
            // }

        }
    }
})