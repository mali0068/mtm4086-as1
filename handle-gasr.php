<?php
     
if(isset($_POST['btnSubmit'])){
	//when the submit button is clicked, submit the email
    //header information of email
	$headers = "From:" . trim($_POST['email']) . "\n";
	$headers .= "Reply-To: Chris <elliotc1@algonquincollege.com> \n";
    $headers .= "Mime-Version: 1.0 \n";
	$headers .= "Content-Type: text/html; charset=\"utf-8\" \n";
	
    //subject line of email
	$subject = "Subject: " . trim($_POST['subject']);
    
    //body component of email
	$message .= "<b>" . "Character Type: " . ($_POST['charType']). "</b><br>" ;
    $message .= "<b>" . "My totally dehumanizing problem is: " . trim($_POST['charType']) . "</b><br>"; 
    $message .= "<b>" . "Message: " . trim($_POST['message']) . "<\b>";
	
	
	$ret = mail('elliotc1@algonquincollege.com', $subject, $message, $headers);
    
    //inform the user whether their email has been sent
	if($ret){
		echo 'The email was successfully sent.';
	}else{
		echo 'The mail server did not like you.';
	}
}
 
     
?>  
     