<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="/static/img/logo.png">
    <title>Login | Talent Scholarship Foundation</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>static/css/w3.css?v=1">
    <link rel="stylesheet" href="<?php echo base_url(); ?>static/css/w3-theme-color.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>static/css/w3-theme-color-1.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>static/css/w3-theme-color-2.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>static/font-awesome-4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Aclonica|Alfa+Slab+One|Mako|Shrikhand|Ultra" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="w3-main animate-bottom" id="myDiv">
        <!-- Header Section Start -->
        <?php include "header.php"; ?>
        <!-- Header Section End -->
        <script>
            var p = document.getElementById("ActiveLogin");
            p.className += " w3-text-theme-2";
        </script>
        <!-- Services section Start -->
        <section>
            <div class="w3-container" style="padding:0; position:relative;">
                <div class="w3-container w3-padding-16 w3-center w3-theme w3-bottombar w3-border-theme" style="position:relative; background-image:url(/img/escheresque.png);">
                    <span class="w3-xlarge">Login</span>
                </div>
                <div class="w3-row w3-padding-16">
                    <div class="w3-container w3-quarter"></div>
                    <div class="w3-half w3-container w3-card-2 w3-border w3-round w3-border-theme w3-padding-16" style="background-color: #fdfdfd;">
                        <form name="login_form" id="login_form">
                            <div class="w3-col w3-padding" style="position:relative;">
                                <i class="fa fa-user w3-xlarge w3-text-theme" style="position:absolute; top:14px; left:22px;"></i>
                                <input id="login_id" name="login_id" class="w3-input w3-white w3-round w3-border w3-text-theme" type="text" placeholder="Login ID.." required="required" maxlength="70" style="padding-left:35px;">
                            </div>
                            <div class="w3-col w3-padding" style="position:relative;">
                                <i class="fa fa-key w3-xlarge w3-text-theme" style="position:absolute; top:14px; left:22px;"></i>
                                <input class="w3-input w3-white w3-round w3-border w3-text-theme" placeholder="Password.." name="password" id="password" maxlength="50" required="required" type="password" style="padding-left:35px;" />
                            </div>
                            <div class="w3-col w3-padding" style="position:relative;">
                                <button type="submit" id="submitBtn" class="w3-btn w3-block w3-theme w3-ripple w3-round w3-padding">Login  <i class="fa fa-paper-plane-o"></i></button>
                                <div id="msg_div" class="text-danger"></div>
                            </div>
                        </form>
                    </div>
                    <div class="w3-quarter w3-container"></div>
                </div>
            </div>
        </section>
        <div class="modal res-modal" id="resModal" data-backdrop="static">
            <div class="modal-dialog res-modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body" id="resModalBody">
                        <button type="button" class="close w3-xxlarge" id="resClose" data-dismiss="modal">&times;</button>
                        <img src="<?php echo base_url(); ?>static/img/loading.gif" alt="Loading..." class="resLoadingGif">
                        <span id="resSpan"></span>&nbsp;&nbsp;&nbsp;
                    </div>
                </div>
            </div>
        </div>
        <br>
        <!-- Services section End -->
        <!-- Footer Section Start -->
        <?php include "footer.php"; ?>
        <!-- Footer Section End -->
    </div>

    <script>
        var  base_url = "<?php echo base_url(); ?>"; 
    </script>

    <script src="<?php echo base_url(); ?>static/js/login.js"></script>
</body>
</html>

