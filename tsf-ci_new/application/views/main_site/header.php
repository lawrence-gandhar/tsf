<style>
	body {
		font-family: 'Arial', sans-serif;
	}
	a {
		text-decoration:none;
	}
	.nav-top-bar{
		border-top:4px solid;
	}
    .navTopBarPadding {
        padding-left: 24px;
        padding-right: 24px;
    }
    .menu{
        display: block;
        padding: 18px 8px !important;
    }
    .otherMenu {
        display: block;
    }
    .w3-top {
        z-index: +5;
    }
    @media (max-width:600px) {
        .otherMenu {
            display: none;
        }
        .navTopBarPadding {
            padding-left: 4px;
            padding-right: 4px;
        }
    }
	@media (max-width:767px) and (min-width:601px) {
        .otherMenu {
            display: block;
        }
        .navTopBarPadding {
            padding-left: 4px;
            padding-right: 4px;
        }
	}
</style>

<script>
	$(function() {
		//caches a jQuery object containing the header element
		var NavBar = $("#top-nav");
		var SMC = $(".Sub-Menu-Container");
		var MtM = $("#mobile-toggle-menu");
		$(window).scroll(function() {
			var scroll = $(window).scrollTop();

			if (scroll >= 30) {
				NavBar.addClass("w3-card-4 nav-top-bar w3-top");
				SMC.addClass("w3-card-4 w3-theme-l4");
				MtM.removeClass("w3-padding-16");
			} else {
				NavBar.removeClass("w3-card-4 nav-top-bar w3-top");
				SMC.removeClass("w3-card-4 w3-theme-l4");
				MtM.addClass("w3-padding-16");
			}
		});
	});

	//---- For Smooth Scrolling
    $(function() {
        $('a[href*="#"]:not([href="#"])').click(function() {
            if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
                try {
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                    if (target.length) {
                        $('html, body').animate({
                            scrollTop: target.offset().top
                        }, 2000);
                        return false;
                    }
                }
                catch(err) {}
            }
        });
    });

	//Script for mobile menu
	function myFunction() {
		var x = document.getElementById("mob-menu-div");
		if (x.className.indexOf("w3-show") == -1) {
			x.className += " w3-show";
		} else {
			x.className = x.className.replace(" w3-show", "");
		}
	}
</script>

<header>
	<div class="w3-container w3-padding-0">
    <!-- Header Top Bar Section Start -->
    	<div class="w3-container nav-top-bar w3-border-theme-1 w3-theme w3-padding-4 navTopBarPadding">
            <div class="w3-padding-4 mobile-view-center otherMenu" style="float:left">
                <a id="ActiveRegSchool" href="school_registration/#" class="w3-hover-none w3-text-theme-1-l1 w3-hover-text-theme-1">Register Your School</a>
                &nbsp;&nbsp;&nbsp;
                <a id="ActiveRegStud" href="student_registration/#" class="w3-hover-none w3-text-theme-1-l1 w3-hover-text-theme-1">Student Registration</a>
                &nbsp;&nbsp;&nbsp;
                <a id="ActiveCoord" href="become_coordinator/#" class="w3-hover-none w3-text-theme-1-l1 w3-hover-text-theme-1">Become a coordinator</a>
                &nbsp;&nbsp;&nbsp;
                <a id="ActiveFeedback" href="#" class="w3-hover-none w3-text-theme-1-l1 w3-hover-text-theme-1">Feedback</a>
            </div>
        	<div class="w3-padding-4" style="float:right">

                <a id="ActiveLogin" href="<?php echo base_url(); ?>login" class="w3-hover-none w3-text-theme-1-l1 w3-hover-text-theme-1">
                    <i class="fa fa-sign-in" style="padding:3px 6px;"></i>Login
                </a>
            </div>
        </div>
     <!-- Header Top Bar Section End -->
     <!-- Header Nav & Logo Section Start -->
     	<div id="top-nav" class="w3-container w3-white" style="border-bottom: 1px solid #eeeeee;">
        <!-- Header Logo Section Start -->
        	<div class="w3-col m3 w3-padding-8">
            	<div id="mobile-toggle-menu" class="w3-col w3-hide-large w3-hide-medium w3-padding-8 w3-right" style="width:50px;">
                	<ul class="w3-navbar w3-large w3-theme-1 w3-left-align w3-round">
                        <li class="w3-hide-large w3-hide-medium w3-theme-1 w3-opennav w3-right">
                            <a href="javascript:void(0);" class=" w3-hover-theme w3-padding-12" onclick="myFunction()"><i class="fa fa-bars"></i></a>
                        </li>
                    </ul>
                </div>
                <a href="/#" class="w3-left">
                    <div id="logo-container" class="w3-col logo-container">
                    	<span class="w3-hide-small w3-hide-medium">&nbsp;</span>
                    	<img id="logo" src="<?php echo base_url(); ?>static/img/logo.png" class="logo" />
                    </div>
                </a>
            </div>
            <!-- Header Logo Section End -->
            <!-- Header Nav Bar Section Start -->
            <div class="w3-col m9">
            	<ul class="w3-navbar w3-right">
                    <li class="w3-hide-small">
                        <a href="/#" id="ActiveHome" class="menu w3-hover-none w3-bottombar w3-text-theme w3-border-white w3-hover-border-theme-1 w3-hover-text-theme-1">Home</a>
                    </li>
                    <li class="w3-hide-small">
                        <a href="/about/#" id="ActiveAbout"  class="menu w3-hover-none w3-text-theme w3-bottombar w3-border-white w3-hover-border-theme-1 w3-hover-text-theme-1">About Us</a>
                    </li>
                    <li class="w3-hide-small">
                        <a href="/gallery/#" id="ActiveGallery"  class="menu w3-hover-none w3-text-theme w3-bottombar w3-border-white w3-hover-border-theme-1 w3-hover-text-theme-1">Gallery</a>
                    </li>
                    <li class="w3-hide-small">
                        <a href="/awards_scholarship/#" id="ActiveScholarship" class="menu w3-hover-none w3-text-theme w3-bottombar w3-border-white w3-hover-border-theme-1 w3-hover-text-theme-1">Scholarship</a>
                    </li>
                    <li class="w3-hide-small">
                        <a href="/achievers/#" id="ActiveAchiever"  class="menu w3-hover-none w3-text-theme w3-bottombar w3-border-white w3-hover-border-theme-1 w3-hover-text-theme-1">Our Achiever</a>
                    </li>
                    <li class="w3-hide-small">
                        <a href="/faq/#" id="ActiveFAQ"  class="menu w3-hover-none w3-text-theme w3-bottombar w3-border-white w3-hover-border-theme-1 w3-hover-text-theme-1">FAQ</a>
                    </li>
                    <li class="w3-hide-small">
                        <a href="#contactUs"  id="ActiveContact" class="menu w3-hover-none w3-text-theme w3-bottombar w3-border-white w3-hover-border-theme-1 w3-hover-text-theme-1">Contact Us</a>
                    </li>
                </ul>

                <div id="mob-menu-div" class="w3-hide w3-hide-large w3-hide-medium">
                    <ul class="w3-navbar w3-left-align w3-theme-2">
                        <li><a href="/#" id="ActiveHomeMob" class="w3-hover-theme-1 w3-border-bottom w3-border-theme-d2">Home</a></li>
                        <li><a href="/about/#" id="ActiveAboutMob" class="w3-hover-theme-1 w3-border-bottom w3-border-theme-d2">About Us</a></li>
                        <li><a href="/gallery/#" id="ActiveGalleryMob" class="w3-hover-theme-1 w3-border-bottom w3-border-theme-d2">Gallery</a></li>
                        <li><a href="/awards_scholarship/#" id="ActiveScholarshipMob" class="w3-hover-theme-1 w3-border-bottom w3-border-theme-d2">Scholarship</a></li>
                        <li><a href="/achievers/#" id="ActiveAchieverMob" class="w3-hover-theme-1 w3-border-bottom w3-border-theme-d2">Our Achiever</a></li>
                        <li><a href="/faq/#" id="ActiveFAQMob" class="w3-hover-theme-1 w3-border-bottom w3-border-theme-d2">FAQ</a></li>
                        <li><a href="#contactUs" id="ActiveContactMob" class="w3-hover-theme-1 w3-border-bottom w3-border-theme-d2">Contact Us</a></li>
                        <li><a href="/school_registration/#" id="ActiveSchoolRegMob" class="w3-hover-theme-1 w3-border-bottom w3-border-theme-d2">Register Your School</a></li>
                        <li><a href="/student_registration/#" id="ActiveStudRegMob" class="w3-hover-theme-1 w3-border-bottom w3-border-theme-d2">Student Registration</a></li>
                        <li><a href="/become_coordinator/#" id="ActiveCoordinatorMob" class="w3-hover-theme-1 w3-border-bottom w3-border-theme-d2">Become a coordinator</a></li>
                        <li><a href="#" id="ActiveFeedbackMob" class="w3-hover-theme-1 w3-border-bottom w3-border-theme-d2">Feedback</a></li>
                    </ul>
                </div>
            </div>
         <!-- Header Nav Bar Section End -->
        </div>
     <!-- Header Nav & Logo Section End -->
    </div>
</header>