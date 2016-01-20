<?php
    /* * * * * * * * * * * * * * * * * * * * * * * * * * * *
     *  Title: Assignment 1 - Algonquin College MTM4086    *
     *  Author: Matthew Sanford                            *
     *  Version: 1.0                                       *
     *  Description: This application is to gather user    *
     *  information and generate an email to send to       *
     *  elliotc1@algonquincollege.com using PHP            *
     * * * * * * * * * * * * * * * * * * * * * * * * * * * */

    //Evaluate if the submit button has been pressed
    if(isset($_GET["btnSubmit"])){
        
        //Evaluate if all form fields were filled out
        if(isset($_GET["email"]) && 
           isset($_GET["message"]) &&
           isset($_GET["charType"]) &&
           isset($_GET["problem"])){
            
            //Generate the email header
            $headers = "From: ". trim($_GET["email"]) ." \n";
            $headers .= "Mime-Version: 1.0 \n";
            $headers .= "Content-Type: text/html; charset=\"utf-8\" \n";
            
            //Generate the email subject
            $subject = "Message from GASR";

            //Generate the email content
            $comments = '<html><head></head>';
            $comments .= '<body>';
            $comments  .= '<p>Char Type: ' . trim($_GET["charType"]) . '<p>';
            $comments  .= '<p>problem: ' . trim($_GET["problem"]) . '<p>';
            $comments  .= '<p>' . trim($_GET["message"]) . '<p>';
            $comments .= '</body></html>';

            //Send genetator email to elliotc1@algonquincollege.com
            $ret = mail('elliotc1@algonquincollege.com', $subject, $comments, $headers);
            
            //Evaluate if mail function returned properly and give feedback to user
            if($ret){
                echo 'The email was successfully sent.';
            }else{
                echo 'The mail server did not like you.';
            }
            
        //Send user feedback if form mields are not filled out
        }else{
            echo 'The form was not properly submitted';
        }
    }
?>