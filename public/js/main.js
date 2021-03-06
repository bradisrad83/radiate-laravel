//global variables
//mainly just did a bunch of jquery stores so I don't have to call them each time.  
//making the code look much nicer
var dj = $("#djs");
var schedule = $("#schedule");
var public_blog = $("#public_blog");
var contact = $("#contact");
var sunday = $("#sunday");
var monday = $("#monday");
var tuesday = $("#tuesday");
var wednesday = $("#wednesday");
var thursday = $("#thursday");
var friday = $("#friday");
var saturday = $("#saturday");
var visualizer = $("#canvas");
var counter = 2;

//function to slide all divs out of the main box
var hideDivs = function() {
    dj.fadeOut(1000);
    schedule.fadeOut(1000);
    public_blog.fadeOut(1000);
    contact.fadeOut(1000);
};
//function to slide all schedules out of the schedule dive on load and each time one is clicked so there is no overlapping
var hideSchedule = function() {
    sunday.hide();
    monday.hide();
    tuesday.hide();
    wednesday.hide();
    thursday.hide();
    friday.hide();
    saturday.hide();
}








$(document).ready(function() {
    //hide all divs initially unitl user interacts
    dj.hide();
    schedule.hide();
    public_blog.hide();
    contact.hide();
    sunday.hide();
    monday.hide();
    tuesday.hide();
    wednesday.hide();
    thursday.hide();
    friday.hide();
    saturday.hide();

    //click events for animation and div reveals
    $(".djs").click(function() {
        hideDivs();
        dj.fadeIn(3000);
    });
    $(".schedule").click(function() {
        hideDivs();
        hideSchedule();
        schedule.slideToggle(2000);
    });
    $(".public_blog").click(function() {
        hideDivs();
        public_blog.slideToggle(2000);
    });
    $(".contact").click(function() {
        hideDivs();
        contact.fadeIn(2000);
    });
    $(".visualizer").click(function() {
        counter++;
        if (counter % 2 == 0) {
            hideDivs();
            visualizer.fadeIn(2000);
        } else {
            visualizer.fadeOut(2000);
        }
    });
    $(".sunday").click(function() {
        hideSchedule();
        setTimeout(sunday.slideToggle(2000));
    });
    $(".monday").click(function() {
        hideSchedule();
        monday.slideToggle(2000);
    });
    $(".tuesday").click(function() {
        hideSchedule();
        tuesday.slideToggle(2000);
    });
    $(".wednesday").click(function() {
        hideSchedule();
        wednesday.slideToggle(2000);
    });
    $(".thursday").click(function() {
        hideSchedule();
        thursday.slideToggle(2000);
    });
    $(".friday").click(function() {
        hideSchedule();
        friday.slideToggle(2000);
    });
    $(".saturday").click(function() {
        hideSchedule();
        saturday.slideToggle(2000);
    });

});