<?PHP $pageTitle="Theresa Burden ~ Makeup Artist and Fine Artist";include("header2.php");?>
<!--Remember, you have no local php interpreter-->
<div class="contactPageContent"><?PHP
$displayForm =True;
if($_POST)
{
	// anti-spammer stuff
	if (empty($_GET))
	{  // prevents spammers who are trying to send data through a GET
		// checks for characters that shouldn't be part of an email address
		$valid_email = preg_match("/[\\000-\\037]/",stripslashes($_POST["email"]));
		$valid_email=eregi('^([0-9a-z]+[-._+&])*[0-9a-z]+@([-0-9a-z]+[.])+[a-z]{2,6}$',$valid_email);

		// checks for anything in any form field that contains common spammer crap
		$crack = preg_match( "/bcc:|to:|cc:|mime-version|multipart|<a|\[url|Content-Type:/i", implode( $_POST ));


		//grab form variables
		$firstname = stripslashes($_POST['firstname']);
		$lastname = stripslashes($_POST['lastname']);
		$email = stripslashes($_POST['email']);
		$message = stripslashes($_POST['message']);

		//grab visitor information

		$datetime = date("F j, Y, g:i a : e");


		$crackMessage = " Your message contained e-mail headers within the message body.<br/>This seems to be a cracking attempt and the message has not been sent.";


		$smessage = "
\tEmail sent from theresaburden.com contact page Form\n
********************************************************************************************\n\n\t\t
Time Sent: {$datetime}\n\t\t
First Name: {$firstname}\n\t\t
Last Name: {$lastname}\n\t\t
Email: {$email}\n\t\t

Message: {$message}\n\n\t
********************************************************************************************\n\n
";


		if(!$crack)
		{
				$mainsent = mail("theresa@theresaburden.com", "Email via theresaburden.com Website", $smessage, "From: no-reply@theresaburden.com\r\nBounce-to:no-reply@theresaburden.com");
				if($mainsent)
				{
					$displayForm = False;
					$message = "Your message was successfully sent. <br/><Br/>I will get back to you soon.";
				} else {
					$message = " Something went wrong when the server tried to send your message.<br/>This is usually due to a server error, and is probably not your fault.<br/>We apologise for any inconvenience caused.";
				}
		} else {

			echo $crackMessage;
		}
	} else {
		echo $valid_email;
		echo $crackMmessage;
	}
}
?>
<div id="formFloat">
<img alt="Message Me About Art" src="webimages/messageme.png"/>
<form method="post" action="contact.php" id="genForm">
		<fieldset id="contact">



		<?php
			if(isset($message))
			{
				echo "<p class=\"lab\">".$message."</p>";
			} else {
				if($displayForm)
				{ ?>

<div class="fields">
		<label for="firstname" class="lab">First Name:</label>
		<input type="text" name="firstname" id="firstname" tabindex="1" value="<?= isset($firstName) ? htmlspecialchars($firstName):""; ?>"/>
</div><div class="fields">
		<label for="lastname" class="lab">Last Name:</label>
		<input type="text" name="lastname" id="lastname" tabindex="2" value="<?= isset($lastname) ? htmlspecialchars($lastname):""; ?>"/>
</div><div class="fields">
		<label for="email" class="lab">Email:</label>
		<input type="text" name="email" id="email" tabindex="3" value="<?= isset($email) ? htmlspecialchars($email):"";  ?>"/>
</div><div class="fields">
		<label for="message" class="lab">Message:</label>
		<textarea name="message" id="message" tabindex="7" rows="10" cols="15"><?= isset($message) ? htmlspecialchars($message):"";?></textarea>
</div>	<p><input type="submit" value="Send" id="formButton"/></p>
		</fieldset>

		</form>
				<?php
				}
			}?>
        </div>

<div id="tiffContact">

<img alt="Tiffany Circle" id="tiff" src="webimages/buttons/tiffanycircle.png"/>
<!--<a href="docs/theresaburdenresume.pdf" target="_blank"><img id="resume" width="300px;" src="webimages/paperstack.png"/></a>-->
<a href="https://www.facebook.com/theresaburdenart" target="_blank"><img alt="Facebook Art and Makeup Page" id="facebook" src="webimages/buttons/facebook-icon.png"/></a>
<a href="http://www.linkedin.com/in/theresaburden" target="_blank"><img alt="Linkedin Art and Makeup" id="linkedin" src="webimages/buttons/linkedin-icon.png"/></a>
<a href="https://twitter.com/beautybyburden" target="_blank"><img alt="Twitter Art and Makeup" id="twitter" src="webimages/buttons/twitter-icon.png"/></a>
<a href="https://www.pinterest.com/taburden/makeup-by-theresa-burden/" target="_blank"><img alt="Pinterest Makeup" id="pinterest" src="webimages/buttons/pinterest.png"/></a>
<a href="https://plus.google.com/u/0/113612275164670243486/posts/p/pub" target="_blank"><img alt="Google Plus Art and Makeup" id="googleplus" src="webimages/buttons/googleplus-icon.png"/></a>
<a href="https://instagram.com/beautybyburden/" target="_blank"><img alt="Instagram Art and Makeup" id="instagram" src="webimages/buttons/instagramsocialmedia.png"/></a>
</div>
        </div>
   <?PHP include("footer2.php");?>
