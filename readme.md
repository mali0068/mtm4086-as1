Assignment 1:

A quick little test of both git and php.

First, you should have by now cloned the repository locally onto your own machine.

Create a branch called "lastname_firstname" to make changes into.

Edit the php file so it actually sends an email to elliotc1@algonquincollege.com, including all the information the user types into the form.

Just a plain text email is fine, but it should contain the user's email as the 'from', and the comments and problem and character in the email body.

Then, push your branch (do not overwrite the master) back up to my repository.

To mark it, I'll clone each of your branches.

As this is a public repository, information about the username and password to access this git repository are on canvas.


<?php
    if(isset($_POST['btnSend'])){
        $email = $_POST['email'];
    
    
        $headers = "From: " . echo $email . "/n";
        $headers .= "Reply to: " . "<" . echo $email . ">" . "/n";
        $headers .= "Content-Type: text/plain; charset=\"utf-8\" \n";
        $msg = "Message from sender: " . trim($_POST['message']);
        $char = "Character name: " . echo ($_POST['charType']);

        $ret = mail('jordankoski@live.ca', $msg, $email, $headers);
        if($ret){
            echo 'Email was sent ';
        }else{
            echo ' not sent';
        }
    }

?>