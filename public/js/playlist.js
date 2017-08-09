function playlistScrollPane(){

	// scroll
		  	$('.playlist-scroll-pane').jScrollPane({
		  		showArrows: false,
		  		verticalGutter: 12,
		  		verticalDragMinHeight: 67,
		  		verticalDragMaxHeight: 67
		  	});

};

$(document).ready(function(){
	////// player
	var user_agent = navigator.userAgent.toLowerCase();
	var mobile = false;
	if ((/up.browser|up.link|mmp|symbian|smartphone|midp|wap|vodafone|o2|pocket|kindle|mobile|pda|psp|treo|blackberry|opera mini|android|iphone|ipod|ipad/.test(user_agent))) {	mobile = true;}
	//////////
	new jPlayerPlaylist({
		jPlayer: "#jquery_jplayer_1",
		cssSelectorAncestor: "#jp_container_1"
	}, [

		{
			title:"Radiate",
			free:true,
			"mp3": "http://67.212.189.122:8008/stream"
		}

	], {

		ready: function () {
			var click = document.ontouchstart === undefined ? 'click' : 'touchstart';
          	var kickoff = function () {
				if (mobile) {
					$("#jquery_jplayer_1").jPlayer("play");
            		document.documentElement.removeEventListener(click, kickoff, true);
				}
         	};
          	document.documentElement.addEventListener(click, kickoff, true);

			playlistScrollPane();
			//console.log('ready');
		},
		swfPath: "js",
		supplied: "mp3",
		wmode: "window"

	});
});

$(window).load(function() {

	playlistScrollPane();
	var qwe = setTimeout(function () {$("#jquery_jplayer_1").jPlayer("play");}, 2000);
	//console.log('load');

});
