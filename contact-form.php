<?php
 include 'session.php';
 
if(isset($_POST['review'])) {
 
     
   $query ="select contact from about";
   $results = mysqli_query($conn, $query);
   $email = mysqli_fetch_array($results);
    // EDIT THE 2 LINES BELOW AS REQUIRED
 
    $email_to = $email[0];
 
    
 
     
 
     
 
    function died($error) {
 
        // your error code can go here
 
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
 
        echo "These errors appear below.<br /><br />";
 
        echo $error."<br /><br />";
 
        echo "Please go back and fix these errors.<br /><br />";
 
        die();
 
    }
 
     
 
    // validation expected data exists
 
    if(!isset($_POST['name']) ||
 
        !isset($_POST['subject']) ||
 
        !isset($_POST['email']) ||
 
        
 
        !isset($_POST['comments'])) {
 
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
 
    }
 
     
 
    $first_name = $_POST['name']; // required
 
    $email_subject = $_POST['subject'];
 
    $email_from = $_POST['email']; // required
 
  
 
    $comments = $_POST['comments']; // required
 
     
 
    $error_message = "";
 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
 
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
 
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$first_name)) {
 
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
 
  }
 
 
  if(strlen($comments) < 2) {
 
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
 
  }
 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
 
    $email_message = "Form details below.\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
     
 
    $email_message .= "First Name: ".clean_string($first_name)."\n";
 
 
    $email_message .= "Email: ".clean_string($email_from)."\n";
 
    $email_message .= "Comments: ".clean_string($comments)."\n";
    
    $host = "smtp.sendgrid.net";
    $username = "shaheer123";
    $password = "shaheer321";
    
 
 
     
 
// create email headers
 
$headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 


require("/mail/PHPMailerAutoload.php");

$mail = new PHPMailer();

$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Host = $host;
$mail->Port = 587;
$mail->Username = $username;
$mail->Password = $password;

$mail->SetFrom($headers);
$mail->Subject = $email_subject;
$mail->MsgHTML($email_message);
$mail->AddAddress($email_to, $first_name);

if($mail->Send()) {
	echo "Message sent!";
} else {
	echo "Mailer Error: " . $mail->ErrorInfo;
}
 
?>
<script type="text/javascript">
					window.location.href = 'category.php';
					</script>

<?php 


}
 
?>