function formSuccess(){
	var formItems = $(".form_item");
	var found = false;
	for(i=0; i<5; i++){
		if(!formItems.eq(i).is("input") && !formItems.eq(i).is("textarea")){
			var value = formItems.eq(i).val();
			if(value == "Choose one..."){
				found = true;
				formItems.eq(i).css("border", "1px solid #ff0000");
			}
			else{
				formItems.eq(i).css("border", "1px solid #424242");
			}
		}
		else if(formItems.eq(i).attr('id') == "search_input"){
			console.log("in");
		}
		else{
			if(!formItems.eq(i).val()){
				console.log(formItems.eq(i));
				found = true
				formItems.eq(i).css("border", "1px solid #ff0000");
			}
			else{
				formItems.eq(i).css("border", "1px solid #424242");
			}
		}
	}
	return !found;
}

/////////// Video //////////////

var player, iframe;

// init player
function onYouTubeIframeAPIReady() {
	console.log("yipee");
  player = new YT.Player('player', {
    height: '200',
    width: '300',
    videoId: '8VBTZ6nIxnM',
    events: {
      'onReady': onPlayerReady
    }
  });
}

// when ready, wait for clicks
function onPlayerReady(event) {
  var player = event.target;
  iframe = $('#player');
}

$(document).ready(function(){
	
	function playFullscreen (){
		$("#playWrapper").css("display","block");
		player.playVideo();//won't work on mobile
	  
		var requestFullScreen = iframe.requestFullScreen || iframe.mozRequestFullScreen || iframe.webkitRequestFullScreen;
		if (requestFullScreen) {
			requestFullScreen.bind(iframe)();
		}
	}
	
	function hideVideo(){
		$("#playWrapper").css("display","none");
		player.stopVideo();
	}
	
	$('.video_thumbnail').on('click', playFullscreen);
	$('#playWrapper').on('click', hideVideo);
	
	//To add a new project, simply create the function. The id is generated based on the projectID field in the database (eg #p3 when projectID==3)
	function showMentorship(){
		$("#p7").show();
	}
	function showScholarship(){
		$("#p1").show();
	}
	function showDevelopment(){
		$("#p2").show();
	}
	function showFuture(){
		$("#p4").show();
	}
	function showLibrary(){
		$("#p3").show();
	}
	
	function hideProject(){
		$(".expand").hide();
	}
	
	$('#Mentorships').on('click', showMentorship);
	$('#Scholarship').on('click', showScholarship);
	$('#Development').on('click', showDevelopment);
	$('#Future').on('click', showFuture);
	$('#Library').on('click', showLibrary);
	$('.close').on('click', hideProject);
	
	function showDonate(){
		$('#donate').show();
	}
	function hideDonate(){
		$('#donate').hide();
	}
	
	$('.donate_now').on('click', showDonate);
	$('.close').on('click', hideDonate);
	
/////////// Search ///////////////
	
	function search(){
		if($("#search").css("float") == "right"){
			$("#search").css("float", "left");
			$("#search").css("margin-left", "50px");
			$("#search_input").show();
			$("#navlist").hide();
			$("#search").css("margin-top", "30px");
			$("#search_box").css("margin-top", "20px");
		}
		else{
			$("#search").css("float", "right");
			$("#search").css("margin-left", "0px");
			$("#search_input").hide();
			$("#navlist").show();
			$("#search").css("margin-top", "-20px");
			$("#search_box").css("margin-top", "-30px");
		}
	}
	
	$("#search").on("click", search);
	
	
/////////// Contact Page /////////////

	function showFeedback(){
		$('.contact_form').hide();
		$('#posFormFeedback').hide();
		$('#negFormFeedback').hide();
		if(formSuccess()){
			$('#posFormFeedback').show();
		}
		else{
			$('#negFormFeedback').show();
		}
		
	}
	function showForm(){
		$('#posFormFeedback').hide();
		$('#negFormFeedback').hide();
		$('.contact_form').show();
	}

	$('#submit').on('click', showFeedback);
	$('.back').on('click', showForm);

/////////// slider /////////////
	var $sliderdiv = $("#slider");
    var $sliderul = $sliderdiv.find(".slides");
    var $slides = $sliderul.find(".slide");
	var $slideImgs = $sliderul.find(".slideImg");
	var $slideText = $sliderul.find(".onImg");
    var $scholarship = $slides.find(".scholarship_slide");
    var $mentorship = $slides.find(".mentorship_slide");
    var $library = $slides.find(".library_slide");
    var $development = $slides.find(".development_slide");
    var curSlide = 0;
    
    var interval;
    
    function startSlider() {
        interval = setInterval(function() {
            $sliderul.animate({'margin-left': '-=25%', 'margin-right': '+=25%'}, 2000, function() {
                curSlide++;
                if (curSlide === $slides.length-4) {
                    curSlide = 0;
                    $sliderul.css('margin-left', 0);
                    $sliderul.css('margin-right', 0);
                }
            });
        }, 4000);
    }
    
    function pauseSlider() {
        clearInterval(interval);
    }
    
	//TODO: FIX THISSSSS FICKLY THING
    $sliderdiv.on('mouseenter', pauseSlider).on('mouseleave', startSlider);
    
    function mouseOver() {
        $(this).css("opacity",".4");
        $(this).parent().children(".onImg").css("display","inline");
    }
    function mouseOff() {
        $(this).css("opacity","1");
        $(this).parent().children(".onImg").css("display","none");
    }
	
	function textOn(){
		$(this).siblings().css("opacity", ".4");
		$(this).css("display","inline");
	}
	
	function textOff(){
		$(this).siblings().css("opacity", "1");
		$(this).css("display","none");
	}
	
	$slideImgs.on('mouseenter', mouseOver).on('mouseleave', mouseOff);
	$slideText.on('mouseenter', textOn).on('mouseleave', textOff);
    
    startSlider();

/////////// our partner section //////////////
    var count1 = 0;
    var count2 = 0;
    var count3 = 0;
    var count4 = 0;
    var count5 = 0;
    $(".arrow_up1").hide();
    $(".arrow_up2").hide();
    $(".arrow_up3").hide();
    $(".arrow_up4").hide();
    $(".arrow_up5").hide();
    $("#partner_list1").hide();
    $("#partner_list2").hide();
    $("#partner_list3").hide();
    $("#partner_list4").hide();
    $("#partner_list5").hide();
    
    $(".arrow_down1").click(function(){
        count1 = count1 + 1;
        $(".photo_text1").css("font-weight","900");
        $("#partner_list1").slideToggle('slow');
        $(".arrow_down1").hide();
        $(".arrow_up1").show();
    });
    
    $(".arrow_up1").click(function(){
        count1 = count1 + 1;
        $(".photo_text1").css("font-weight","400");
        $("#partner_list1").slideToggle('slow');
        $(".arrow_up1").hide();
        $(".arrow_down1").show();
    });

    $("#partner_list1").click(function(){
        count1 = count1 + 1;
        if (count1 % 2 == 1){
            $("#partner_list1").slideToggle('slow');
            $(".arrow_down1").hide();
            $(".arrow_up1").show();
        } else {
            $("#partner_list1").slideToggle('slow');
            $(".arrow_up1").hide();
            $(".arrow_down1").show();
        }
    });

    //secondary school//
    $(".arrow_down2").click(function(){
        count2 = count2 + 1;
        $(".photo_text2").css("font-weight","900");
        $("#partner_list2").slideToggle('slow');
        $(".arrow_down2").hide();
        $(".arrow_up2").show();
    });
    
    $(".arrow_up2").click(function(){
        count2 = count2 + 1;
        $(".photo_text2").css("font-weight","400");
        $("#partner_list2").slideToggle('slow');
        $(".arrow_up2").hide();
        $(".arrow_down2").show();
    });

    $("#partner_list2").click(function(){
        count2 = count2 + 1;
        if (count2 % 2 == 1){
            $("#partner_list2").slideToggle('slow');
            $(".arrow_down2").hide();
            $(".arrow_up2").show();
        } else {
            $("#partner_list2").slideToggle('slow');
            $(".arrow_up2").hide();
            $(".arrow_down2").show();
        }
    });

    //universities and colleges
    $(".arrow_down3").click(function(){
        count3 = count3 + 1;
        $(".photo_text3").css("font-weight","900");
        $("#partner_list3").slideToggle('slow');
        $(".arrow_down3").hide();
        $(".arrow_up3").show();
    });
    
    $(".arrow_up3").click(function(){
        count3 = count3 + 1;
        $(".photo_text3").css("font-weight","400");
        $("#partner_list3").slideToggle('slow');
        $(".arrow_up3").hide();
        $(".arrow_down3").show();
    });

    $("#partner_list3").click(function(){
        count3 = count3 + 1;
        if (count3 % 2 == 1){
            $("#partner_list3").slideToggle('slow');
            $(".arrow_down3").hide();
            $(".arrow_up3").show();
        } else {
            $("#partner_list3").slideToggle('slow');
            $(".arrow_up3").hide();
            $(".arrow_down3").show();
        }
    });

    //other foundations
    $(".arrow_down4").click(function(){
        count4 = count4 + 1;
        $(".photo_text4").css("font-weight","900");
        $("#partner_list4").slideToggle('slow');
        $(".arrow_down4").hide();
        $(".arrow_up4").show();
    });
    
    $(".arrow_up4").click(function(){
        count4 = count4 + 1;
        $(".photo_text4").css("font-weight","400");
        $("#partner_list4").slideToggle('slow');
        $(".arrow_up4").hide();
        $(".arrow_down4").show();
    });

    $("#partner_list4").click(function(){
        count4 = count4 + 1;
        if (count4 % 2 == 1){
            $("#partner_list4").slideToggle('slow');
            $(".arrow_down4").hide();
            $(".arrow_up4").show();
        } else {
            $("#partner_list4").slideToggle('slow');
            $(".arrow_up4").hide();
            $(".arrow_down4").show();
        }
    });

    //international
    $(".arrow_down5").click(function(){
        count5 = count5 + 1;
        $(".photo_text5").css("font-weight","900");
        $("#partner_list5").slideToggle('slow');
        $(".arrow_down5").hide();
        $(".arrow_up5").show();
    });
    
    $(".arrow_up5").click(function(){
        count5 = count5 + 1;
        $(".photo_text5").css("font-weight","400");
        $("#partner_list5").slideToggle('slow');
        $(".arrow_up5").hide();
        $(".arrow_down5").show();
    });

    $("#partner_list5").click(function(){
        count5 = count5 + 1;
        if (count5 % 2 == 1){
            $("#partner_list5").slideToggle('slow');
            $(".arrow_down5").hide();
            $(".arrow_up5").show();
        } else {
            $("#partner_list5").slideToggle('slow');
            $(".arrow_up5").hide();
            $(".arrow_down5").show();
        }
    });
});