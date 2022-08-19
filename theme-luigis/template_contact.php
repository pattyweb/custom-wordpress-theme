<?php
/*Template Name: Contact*/?>

<?php
if(isset($_POST['submitted'])) {
	if(trim($_POST['contactName']) === '') {
		$nameError = 'Please enter your name.';
		$hasError = true;
	} else {
		$name = trim($_POST['contactName']);
	}

	if(trim($_POST['email']) === '')  {
		$emailError = 'Please enter your email address.';
		$hasError = true;
	} else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['email']))) {
		$emailError = 'You entered an invalid email address.';
		$hasError = true;
	} else {
		$email = trim($_POST['email']);
	}

	if(trim($_POST['comments']) === '') {
		$commentError = 'Please enter a message.';
		$hasError = true;
	} else {
		if(function_exists('stripslashes')) {
			$comments = stripslashes(trim($_POST['comments']));
		} else {
			$comments = trim($_POST['comments']);
		}
	}

	if(!isset($hasError)) {
		$emailTo = get_option('tz_email');
		if (!isset($emailTo) || ($emailTo == '') ){
			$emailTo = get_option('admin_email');
		}
		$subject = '[PHP Snippets] From '.$name;
		$body = "Name: $name \n\nEmail: $email \n\nComments: $comments";
		$headers = 'From: '.$name.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;

		wp_mail($emailTo, $subject, $body, $headers);
		
		$emailSent = true;
		
		
	}
	
} ?>

<?php
get_header();
?>

<section class="bg-6 h-500x main-slider pos-relative">
        <div class="triangle-up pos-bottom"></div>
        <div class="container h-100">
                <div class="dplay-tbl">
                        <div class="dplay-tbl-cell center-text color-white pt-90">
                                <h5><b>SAY HELLO</b></h5>
                                <h3 class="mt-30 mb-15">Contact</h3>
                        </div><!-- dplay-tbl-cell -->
                </div><!-- dplay-tbl -->
        </div><!-- container -->
</section>


<section class="story-area left-text center-sm-text">
        <div class="container">
                <div class="heading">
                        <img class="heading-img" src="<?php bloginfo('template_directory'); ?>/images/heading_logo.png" alt="">
                        <h2>Say hello</h2>
                        <h5 class="mt-10 mb-30">Say hello, send us a message</h5>
                        <p class="mx-w-700x mlr-auto">Proin dictum viverra varius. Etiam vulputate libero dui, at pretium
                                elit elementum quis. Enean porttitor eros non ultrices convallis.
                                Vivamus quis dolor ut arcu lobortis finibus a vitae leo. Sed eget tempus sem.
                                Nullam sed lacus sed metus tincidunt lobortis lobortis at nibh. Morbi euismod, arcu in gravida rhoncus</p>
                </div>
                <div id="container">
		<div id="content">
			<?php the_post() ?>
			<div id="post-<?php the_ID() ?>" class="post">
				<div class="entry-content">
                
                                
                <form class="form-style-1 placeholder-1" action="<?php the_permalink(); ?>" id="contactForm" method="post">
                        <div class="row">
                                <div class="col-md-6"> <input class="mb-20" type="text" name="contactName" id="contactName" placeholder="Name" required>  </div>
                                <div class="col-md-6"> <input class="mb-20" type="text" name="email" id="email" placeholder="E-mail" required>  </div>
                                <div class="col-md-12"><input class="mb-20" type="text" placeholder="Subject">  </div>
                                <div class="col-md-12">
                                        <textarea class="h-200x ptb-20" name="comments" id="commentsText" placeholder="Message" required></textarea></div>
                        </div><!-- row -->
                       <center>
                        <button class="btn-primaryc plr-25" type="submit" style="margin-top: 3% !important;"><b>SEND MESSAGE</b></button>
                        <input type="hidden" name="submitted" id="submitted" value="true" />
                        </center>
                </form>
                <center>
        <?php 
        if(isset($_POST['submitted'])){
		 if (mail ($emailTo, $subject, $body, $headers)) { 
       $success = "Message successfully sent";
    } else {
        $success = "Message Sending Failed, try again";
    }

    echo $success;}?>
            </center>
                </div><!-- .entry-content ->
			</div><!-- .post-->
		</div><!-- #content -->
	</div><!-- #container -->
        </div><!-- container -->

</section>

<?php get_footer();?>