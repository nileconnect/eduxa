if (window.location.href.indexOf("localhost") > -1) {
    var Api = "http://eduxa.localhost/rest/";
} else if (window.location.href.indexOf("eduxa") > -1) {
    var Api = "https://eduxa.com/rest/";
} else {
    var Api = "http://eduxa.localhost/rest/";
}
