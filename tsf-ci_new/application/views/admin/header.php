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
                <a id="ActiveRegSchool" data-toggle="modal" data-target="#mainAddSchoolModal" style="cursor:pointer;" class="w3-hover-none w3-text-theme-1-l1 w3-hover-text-theme-1">Register Your School</a>
                &nbsp;&nbsp;&nbsp;
                <a id="ActiveRegStud" data-toggle="modal" data-target="#mainAddStudentModal" style="cursor:pointer;" class="w3-hover-none w3-text-theme-1-l1 w3-hover-text-theme-1">Student Registration</a>
                &nbsp;&nbsp;&nbsp;
                <a id="ActiveCoord" data-toggle="modal" data-target="#mainAddCoordinatorModal" style="cursor:pointer;"  class="w3-hover-none w3-text-theme-1-l1 w3-hover-text-theme-1">Become a coordinator</a>
                &nbsp;&nbsp;&nbsp;
                <a id="ActiveFeedback" data-toggle="modal" data-target="#mainAddCoordinatorModal" style="cursor:pointer;"  class="w3-hover-none w3-text-theme-1-l1 w3-hover-text-theme-1">Feedback</a>
            </div>
        	<div class="w3-padding-4" style="float:right">
              <a id="ActiveLogin" href="<?php echo base_url(); ?>logout" class="w3-hover-none w3-text-theme-1-l1 w3-hover-text-theme-1">
                  <i class="fa fa-sign-out" style="padding:3px 6px;"></i>Logout
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


<!-- Add School Modal -->

<div class="modal res-modal" id="mainAddSchoolModal" data-backdrop="static">
		<div class="modal-dialog res-modal-dialog" role="document">
				<div class="modal-content">
					<form action="<?php echo base_url()?>site/school/add" method="POST">
							<div class="modal-header" style="background-color:#035767; color:#ffffff;">
									<h5 class="modal-title" style="display: inline;">Add School</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
									</button>
							</div>
							<div class="modal-body" style="display:flow-root;">
								<div class="form-group">
										<label class="col-md-12 control-label" for="desc" style="margin-top:10px;">School Name</label>
										<div class="col-md-12">
												<input name="school_name" class="form-control">
										</div>
								</div>
								<div class="form-group">
										<label class="col-md-12 control-label" for="desc" style="margin-top:10px;">Principal Name</label>
										<div class="col-md-12">
												<input name="principal_name" class="form-control">
										</div>
								</div>
								<div class="form-group">
										<label class="col-md-12 control-label" for="desc" style="margin-top:10px;">Address</label>
										<div class="col-md-12">
												<input name="address" class="form-control">
										</div>
								</div>
								<div class="form-group">
										<label class="col-md-6 control-label" for="desc" style="margin-top:10px;">Mobile Number</label>
										<label class="col-md-6 control-label" for="desc" style="margin-top:10px;">Phone Number</label>
										<div class="col-md-6">
												<input name="mobile_number" class="form-control">
										</div>
										<div class="col-md-6">
												<input name="phone_number" class="form-control">
										</div>
								</div>
								<div class="form-group">
										<label class="col-md-6 control-label" for="desc" style="margin-top:10px;">City</label>
										<label class="col-md-6 control-label" for="desc" style="margin-top:10px;">State</label>
										<div class="col-md-6">
												<input name="city" class="form-control">
										</div>
										<div class="col-md-6">
												<select name="state" class="form-control">
													<?php foreach($states as $state): ?>
														<option value="<?php echo $state["id"] ?>"><?php echo $state["state"] ?></option>
													<?php endforeach; ?>
												</select>
										</div>
								</div>
								<div class="form-group">
										<label class="col-md-6 control-label" for="desc" style="margin-top:10px;">Pincode</label>
										<label class="col-md-6 control-label" for="desc" style="margin-top:10px;">Email</label>
										<div class="col-md-6">
												<input type="text" name="pincode" class="form-control">
										</div>
										<div class="col-md-6">
												<input type="email" name="email" class="form-control">
										</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="submit" class="btn btn-primary">Save</button>
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							</div>
						</form>
				</div>
		</div>
</div>

<!-- Add Coordinator Modal -->

<div class="modal res-modal" id="mainAddCoordinatorModal" data-backdrop="static">
	<div class="modal-dialog res-modal-dialog" role="document">
		<div class="modal-content">
			<form action="<?php echo base_url()?>site/coordinator/add" method="POST" enctype="multipart/form-data">
				<div class="modal-header" style="background-color:#035767; color:#ffffff;">
						<h5 class="modal-title" style="display: inline;">Add Coordinator</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
						</button>
				</div>
				<div class="modal-body" style="display:flow-root;">
					<div class="form-group">
							<label class="col-md-12 control-label" for="desc" style="margin-top:10px;">Coordinator Name</label>
							<div class="col-md-12">
									<input name="coordinator_name" class="form-control">
							</div>
					</div>
					<div class="form-group">
							<label class="col-md-6 control-label" for="desc" style="margin-top:10px;">Mobile No</label>
							<label class="col-md-6 control-label" for="desc" style="margin-top:10px;">Email ID</label>
					</div>
					<div class="form-group">
							<div class="col-md-6">
									<input name="mobile_no" class="form-control">
							</div>
							<div class="col-md-6">
									<input type="email" name="email_id" class="form-control">
							</div>
					</div>
					<div class="form-group">
							<label class="col-md-12 control-label" for="desc" style="margin-top:10px;">Address</label>
							<div class="col-md-12">
									<input name="address" class="form-control">
							</div>
					</div>
					<div class="form-group">
							<label class="col-md-6 control-label" for="desc" style="margin-top:10px;">Date of Birth</label>
							<label class="col-md-6 control-label" for="desc" style="margin-top:10px;">Gender</label>
					</div>
					<div class="col-md-12" style="padding:0px;">
							<div class="col-md-6" style="padding:0px;">
									<div class="col-md-4" style="padding:0px 0px 0px 14px;">
										<select name="dob_date" class="form-control">
										<?php for($i=1; $i<=31; $i++): ?>
											<option><?php echo $i; ?></option>
										<?php endfor; ?>
										</select>
									</div>
									<div class="col-md-4" style="padding:0px 0px 0px 14px;">
										<select class="form-control" name="dob_month">
											<option value="1">Jan</option>
											<option value="1">Feb</option>
											<option value="1">Mar</option>
											<option value="1">Apr</option>
											<option value="1">May</option>
											<option value="1">Jun</option>
											<option value="1">Jul</option>
											<option value="1">Aug</option>
											<option value="1">Sep</option>
											<option value="1">Oct</option>
											<option value="1">Nov</option>
											<option value="1">Dec</option>
										</select>
									</div>
									<div class="col-md-4" style="padding:0px 0px 0px 14px;">
										<select name="dob_year" class="form-control">
											<?php for($i=date('Y'); $i>=1947; $i--): ?>
												<option><?php echo $i; ?></option>
											<?php endfor; ?>
										</select>
									</div>
							</div>
							<div class="col-md-6" style="padding:5px 10px;">
								<div class="form-check form-check-inline col-md-6">
									<input class="form-check-input" type="radio" name="gender" value="1" id="inRadio1">
									<label class="form-check-label" for="inRadio1" style="padding:0px 5px;">Male</label>
								</div>
								<div class="form-check form-check-inlin col-md-6" style="padding:0px;">
									<input class="form-check-input" type="radio" name="gender" value="0" id="inRadio2">
									<label class="form-check-label" for="inRadio2" style="padding:0px 5px;">Female</label>
								</div>
							</div>
					</div>
					<div class="form-group">
							<label class="col-md-6 control-label" for="desc" style="margin-top:10px;">City</label>
							<label class="col-md-6 control-label" for="desc" style="margin-top:10px;">State</label>
							<div class="col-md-6">
									<input name="city" class="form-control">
							</div>
							<div class="col-md-6">
								<select name="state" class="form-control">
									<?php foreach($states as $state): ?>
										<option value="<?php echo $state["id"] ?>"><?php echo $state["state"] ?></option>
									<?php endforeach; ?>
								</select>
							</div>
					</div>

					<div class="form-group">
							<label class="col-md-6 control-label" for="desc" style="margin-top:10px;">Pincode</label>
							<label class="col-md-6 control-label" for="desc" style="margin-top:10px;">Image</label>
							<div class="col-md-6">
									<input name="pincode" class="form-control">
							</div>
							<div class="col-md-6">
								<input type="file" name="photo" class="form-control">
							</div>
					</div>
					<div class="form-group">
							<label class="col-md-6 control-label" for="desc" style="margin-top:10px;">Qualification</label>
							<label class="col-md-6 control-label" for="desc" style="margin-top:10px;">Profession</label>
							<div class="col-md-6">
									<input name="qualification" class="form-control">
							</div>
							<div class="col-md-6">
								<input type="text" name="profession" class="form-control">
							</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Save</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Add Student Modal -->

<div class="modal res-modal" id="mainAddStudentModal" data-backdrop="static">
	<div class="modal-dialog res-modal-dialog" role="document">
		<div class="modal-content">
			<form action="<?php echo base_url()?>site/student/add" method="POST" enctype="multipart/form-data">
					<div class="modal-header" style="background-color:#035767; color:#ffffff;">
							<h5 class="modal-title" style="display: inline;">Add Student</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
							</button>
					</div>
					<div class="modal-body" style="display:flow-root;">
						<div class="form-group">
								<label class="col-md-12 control-label" for="desc" style="margin-top:10px;">Student Name</label>
								<div class="col-md-12">
										<input name="student_name" class="form-control">
								</div>
						</div>
						<div class="form-group">
								<label class="col-md-12 control-label" for="desc" style="margin-top:10px;">School Name</label>
								<div class="col-md-12">
										<input name="school_name" class="form-control">
								</div>
						</div>
						<div class="form-group">
								<label class="col-md-6 control-label" for="desc" style="margin-top:10px;">Father's Name</label>
								<label class="col-md-6 control-label" for="desc" style="margin-top:10px;">Coordinator</label>
						</div>
						<div class="form-group">
								<div class="col-md-6">
										<input name="father_name" class="form-control">
								</div>
								<div class="col-md-6">
										<select name="coordinator_id" class="form-control">
											<?php foreach($coord_list as $coord): ?>
												<option value="<?php echo $coord["id"]; ?>">
													<?php echo ucwords(strtolower($coord["name"]))." (".$coord["registration_id"].")"?>
												</option>
										<?php endforeach; ?>
										</select>
								</div>
						</div>

						<div class="form-group">
								<label class="col-md-6 control-label" for="desc" style="margin-top:10px;">Class</label>
								<label class="col-md-6 control-label" for="desc" style="margin-top:10px;">Exam Type</label>
						</div>
						<div class="col-md-12">
								<div class="col-md-6" style="padding:0px 14px 0px 0px;">
									<select class="form-control" name="class_id">
										<?php foreach($class_list as $row): ?>
											<option value="<?php echo $row["id"] ?>"><?php echo $row["class_name"]; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="col-md-6" style="padding:0px 0px 0px 14px;">
									<select class="form-control" name="examtype_id">
										<?php foreach($examtype_list as $examtype): ?>
											<option value="<?php echo $examtype["id"] ?>"><?php echo $examtype["exam_type"]; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
						</div>
						<div class="form-group">
								<label class="col-md-6 control-label" for="desc" style="margin-top:10px;">Date of Birth</label>
								<label class="col-md-6 control-label" for="desc" style="margin-top:10px;">Gender</label>
						</div>
						<div class="col-md-12" style="padding:0px;">
								<div class="col-md-6" style="padding:0px;">
										<div class="col-md-4" style="padding:0px 0px 0px 14px;">
											<select name="dob_date" class="form-control">
											<?php for($i=1; $i<=31; $i++): ?>
												<option><?php echo $i; ?></option>
											<?php endfor; ?>
											</select>
										</div>
										<div class="col-md-4" style="padding:0px 0px 0px 14px;">
											<select class="form-control" name="dob_month">
												<option value="1">Jan</option>
												<option value="1">Feb</option>
												<option value="1">Mar</option>
												<option value="1">Apr</option>
												<option value="1">May</option>
												<option value="1">Jun</option>
												<option value="1">Jul</option>
												<option value="1">Aug</option>
												<option value="1">Sep</option>
												<option value="1">Oct</option>
												<option value="1">Nov</option>
												<option value="1">Dec</option>
											</select>
										</div>
										<div class="col-md-4" style="padding:0px 0px 0px 14px;">
											<select name="dob_year" class="form-control">
												<?php for($i=date('Y'); $i>=1947; $i--): ?>
													<option><?php echo $i; ?></option>
												<?php endfor; ?>
											</select>
										</div>
								</div>
								<div class="col-md-6" style="padding:5px 10px;">
									<div class="form-check form-check-inline col-md-6">
										<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1">
										<label class="form-check-label" for="inlineRadio1" style="padding:0px 5px;">Male</label>
									</div>
									<div class="form-check form-check-inlin col-md-6" style="padding:0px;">
										<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="0">
										<label class="form-check-label" for="inlineRadio2" style="padding:0px 5px;">Female</label>
									</div>
								</div>
						</div>
						<div class="form-group">
								<label class="col-md-12 control-label" for="desc" style="margin-top:10px;">Address</label>
								<div class="col-md-12">
										<input name="address" class="form-control">
								</div>
						</div>
						<div class="form-group">
								<label class="col-md-6 control-label" for="desc" style="margin-top:10px;">City</label>
								<label class="col-md-6 control-label" for="desc" style="margin-top:10px;">State</label>
								<div class="col-md-6">
										<input name="city" class="form-control">
								</div>
								<div class="col-md-6">
									<select name="state" class="form-control">
										<?php foreach($states as $state): ?>
											<option value="<?php echo $state["id"] ?>"><?php echo $state["state"] ?></option>
										<?php endforeach; ?>
									</select>
								</div>
						</div>
						<div class="form-group">
								<label class="col-md-6 control-label" for="desc" style="margin-top:10px;">Pincode</label>
								<label class="col-md-6 control-label" for="desc" style="margin-top:10px;">Email</label>
								<div class="col-md-6">
										<input type="text" name="pincode" class="form-control">
								</div>
								<div class="col-md-6">
										<input type="text" name="email" class="form-control">
								</div>
						</div>
						<div class="form-group">
								<label class="col-md-6 control-label" for="desc" style="margin-top:10px;">Phone</label>
								<label class="col-md-6 control-label" for="desc" style="margin-top:10px;">Passport Size Photo</label>
								<div class="col-md-6">
										<input type="text" name="phone" class="form-control">
								</div>
								<div class="col-md-6">
										<input type="file" name="photo" class="form-control">
								</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary">Save</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>
