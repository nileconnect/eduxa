$(function() {});


$("#en").click(function() {
    if (!$(".tab-pane.en").hasClass("active")) {
        $("#en").addClass("active")
        $("#ar").removeClass("active")
        $(".tab-pane.en").addClass("active")
        $(".tab-pane.ar").removeClass("active")
    }
})
$("#ar").click(function() {
    if (!$(".tab-pane.ar").hasClass("active")) {
        $("#ar").addClass("active")
        $("#en").removeClass("active")
        $(".tab-pane.ar").addClass("active")
        $(".tab-pane.en").removeClass("active")
    }
})
console.log("here")