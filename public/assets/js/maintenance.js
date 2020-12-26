$(document).ready(function(){

//code for the background slider
	$.backstretch([
      "/assets/images/bg_img.jpg",
      "/assets/images/bg_img2.jpg",
      "/assets/images/bg_img3.jpg"
    ], {
        fade: 750,
        duration: 2500
    });

//code for the cerlces Countdouwn
	$("#normal-countdown").TimeCircles({
	    "direction": "Clockwise",
	    "animation": "Smoth",
	    "bg_width": 1,
	    "fg_width": 0.05,
	    "circle_bg_color": "#ffffff",
	    "circle_bg_fill_color": "rgba(255, 255, 255, 0.1)",
	    "time": {
	        "Days": {
	            "text": "Days",
	            "color": "#ba7c00",
	            "show": true
	        },
	        "Hours": {
	            "text": "Hours",
	            "color": "#002aa8",
	            "show": true
	        },
	        "Minutes": {
	            "text": "Minutes",
	            "color": "#00a30d",
	            "show": true
	        },
	        "Seconds": {
	            "text": "Seconds",
	            "color": "#d80202",
	            "show": true
	        }
	    }
	});

});
$(window).resize(function(){
    $("#normal-countdown").TimeCircles().rebuild();
});