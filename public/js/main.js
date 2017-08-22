var dj = $(".djs");
var schedule = $(".schedule");
var public_blog = $(".public_blog");
var contact = $(".contact");









$(document).ready(function() {
    console.log("document onload ready function working");
    $(".djs").click(function() {
        console.log("DJS clicked");
    });
    $(".schedule").click(function() {
        console.log("Schedule clicked");
    });
    $(".public_blog").click(function() {
        console.log("Public Blog clicked");
    });
    $(".contact").click(function() {
        console.log("Contact clicked");
    });
});