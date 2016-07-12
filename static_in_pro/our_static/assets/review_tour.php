<?php

if(!$_POST) exit;

// Email verification, do not edit.
function isEmail($user_email ) {
	return(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|me|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i",$user_email ));
}

if (!defined("PHP_EOL")) define("PHP_EOL", "\r\n");
$user_first_name     = $_POST['user_first_name'];
$user_last_name    = $_POST['user_last_name'];
$user_email    = $_POST['user_email'];
$position_rate = $_POST['position_rate'];
$guide_rate = $_POST['guide_rate'];
$price_rate = $_POST['price_rate'];
$quality_rate = $_POST['quality_rate'];
$content = $_POST['content'];

if(trim($user_first_name) == '') {
	echo '<div class="error_message">You must enter your Name.</div>';
	exit();
} else if(trim($user_last_name ) == '') {
	echo '<div class="error_message">You must enter your Last name.</div>';
	exit();
} else if(trim($user_email) == '') {
	echo '<div class="error_message">Please enter a valid email address.</div>';
	exit();
} else if(!isEmail($user_email)) {
	echo '<div class="error_message">You have enter an invalid e-mail address, try again.</div>';
	exit();
} else if(trim($position_rate ) == '') {
	echo '<div class="error_message">Please rate Position.</div>';
	exit();
} else if(trim($guide_rate ) == '') {
	echo '<div class="error_message">Please rate Tourist Guide.</div>';
	exit();
} else if(trim($price_rate ) == '') {
	echo '<div class="error_message">Please rate Tour price.</div>';
	exit();
} else if(trim($quality_rate ) == '') {
	echo '<div class="error_message">Please rate Quality.</div>';
	exit();
} else if(trim($content) == '') {
	echo '<div class="error_message">Please enter your review.</div>';
	exit();
}

if(get_magic_quotes_gpc()) {
	$content = stripslashes($content);
}


//$address = "HERE your email address";
$address = "su.seo@bakecompany.net";


// Below the subject of the email
$e_subject = 'Citytours Tour Review';

// You can change this if you feel that you need to.
$e_body = "You have been contacted by $user_first_name $user_last_name with the following $tour_name review:" . PHP_EOL . PHP_EOL;
$e_content = "Position rate: $position_review.\nTourist guide rate: $guide_review.\nTour price rate: $price_review.\nQuality rate: $quality_review.\n\nReview: $review_text" . PHP_EOL . PHP_EOL;
$e_reply = "You can contact $user_first_name  $user_last_name via email: $email_review.";

$msg = wordwrap( $e_body . $e_content . $e_reply, 70 );

$headers = "From: $email_review" . PHP_EOL;
$headers .= "Reply-To: $email_review" . PHP_EOL;
$headers .= "MIME-Version: 1.0" . PHP_EOL;
$headers .= "Content-type: text/plain; charset=utf-8" . PHP_EOL;
$headers .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;

$user = "$email_review";
$usersubject = "Thank You";
$userheaders = "From: info@domain.com\n";
$usermessage = "Thank you for review $tour_name! Here a summary of your review: \n $e_content. ";
mail($user,$usersubject,$usermessage,$userheaders);

if(mail($address, $e_subject, $msg, $headers)) {

	// Success message
	echo "<div id='success_page' style='padding:20px 0'>";
	echo "<strong >Email Sent.</strong>";
	echo "Thank you <strong>$user_first_name</strong>,<br> your review has been submitted.";
	echo "</div>";

} else {

	echo 'ERROR!';

}
