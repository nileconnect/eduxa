if (window.location.href.indexOf("localhost") > -1) {
    var Api = "http://eduxa.localhost/rest/";
} else if (window.location.href.indexOf("qcbooking") > -1) {
    var Api = "http://eduxa.localhost/rest/";
} else {
    var Api = "http://eduxa.localhost/rest/";
}
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
        submitReferal() {
            if (this.StudentsList == "") {
                console.log("empty")
            } else {
                var data = {
                    "slug": this.slug,
                    'students': this.StudentsList
                }
                $.ajax({
                    "url": Api + "referral/add-request",
                    "method": "POST",
                    "data": data,
                    success: res => {
                        console.log(res)
                        if (res.success == true) {
                            $(".successMsg").addClass("show")

                        }
                    }
                });
            }

        }
    }
})