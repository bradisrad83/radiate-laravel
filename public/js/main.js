$(document).ready(function(){
  //Empty the main page to being start
  $(".main").hide();
  //console.log("WE ARE HERE");
  $(".djs").click(function(){

    console.log("DJs has been clicked");
    $(".djs").show();
  });
  $(".schedule").click(function(){
    console.log("Schedule has been clicked");
  });
  $(".public_blog").click(function(){
    console.log("Public_blog has been clicked");
  });
  $(".contact").click(function(){
    console.log("Contact has been clicked");
  });
});
