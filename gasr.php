<?php
 //use php mail() function..
 //set header such as (reply-to, from , cc , or bcc)
 //set message (email body)
 //give the userr a message(did the email work)
 //the server will tell you if the email sent successfully - it will not tell you if the recieving party rejected the eamil or recieve it 
 
 if(isset($_POST['btnSubmit'])) {

    $userInput = trim($_POST['email']) . trim($_POST['charType'])  . trim($_POST['problem']);
    if( preg_match("/multipart\alternative|content-type:|cc:|bcc:|boundry=)/i", $userInput)){
        //if we find any of these things, just kill the script
        die('Go away jerk.');
    }

    //getting the character type
    $fromChar=trim($_POST['charType']);

    //getting the email of the user
    $fromEmail=trim($_POST['email']);

    //getting the problem 
    $problem=$_POST['problem'];

    //setting up headers
    //using user email input as from value
    $headers="From: Winner <".  $fromEmail ."> \n";

    //making content type plain text
    $headers .="Content-Type: text/plain; charset=\"utf-8\" \n";
    
    //charater type message
    $charTypeMsg="Character: " .$fromChar. "\n\n";

    //problem message
    $problemMsg="Type of problem: \n" .$problem ."\n\n";

    //message from the message box
    $msgBox="Message: \n" . trim($_POST['message']);

    //combining all the messages
    $msg=$charTypeMsg . $problemMsg . $msgBox;
    
   
    //mail function : who the email is going to , the subject , the message  and any header if present 
    
   $sendMail =mail('broken@gasr.com', 'Something related to GASR game Broken' , $msg , $headers);

   if($sendMail){
        echo "the email was succesfully sent";
    }
 else {

       echo "the email doesnot exist";

    }

 } 

?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>GASR</title>
<link href="styles/styles.css" rel="stylesheet" />
</head>

<body>

    <div id="wrapper">
        <div id="header">
            <div class="awe" id="awesome1">
                <p>Lightning!</p>
                <p>Monsters!</p>
                <p>Rendered Clouds!</p>
            </div>
            <div class="awe" id="awesome2">
                <p>Massive Headers!</p>
                <p>Random Chaos!</p>
                <p>Unreadable Text!</p>
            </div>
        </div>
        
        <div id="formidable">
            <div id="subhead">
                <p>Send us a message and maybe, if we feel like it, we'll look into it.</p>
                <h3>Game Broken?</h3>
                <h4>...that's too bad.</h4>
            </div>
            <form name="yourChar" id="yourChar" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            
            <div id="formleft">
                <div class="formbox">
                    <label for"email">Your E-mail:</label>
                    <input type="text" id="email" class="charField" name="email" />
                </div>
                
                <div class="formbox">
                    <label for"charType">Your Character:</label>
                    <select id="charType" name="charType" class="charField">
                        <option value="X">Select your character...</option>
                        <option value="CH">Compost Heap</option>
                        <option value="F">Felix</option>
                        <option value="RP">Robo-Pig</option>
                        <option value="SL">Slime Man</option>
                        <option value="SM">Sock Monster</option>
                    </select>            
                </div>
                
                <div class="formbox">
                    <label for"charJob">Message:</label>
                    <textarea name="message" id="message" class="charField"></textarea>
                </div>
            </div>
                
            <div id="formright">                
                <div class="formbox">
                    <p>Type of problem:</p>
                    <input type="radio" value="Problem 1" class="charField checkbox" id="rad1" name="problem" />
                    <label for="rad1">I played your game too much and my mouse/keyboard broke.</label>
                    <input type="radio" value="Problem 2"  class="charField checkbox" id="rad2" name="problem" />
                    <label for="rad2">I have no significant other.  I need your sexy armours!</label>
                    <input type="radio" value="Problem 3"  class="charField checkbox" id="rad3" name="problem" />
                    <label for="rad3">My account was stolen by hackers.</label>
                    <input type="radio" value="Problem 4"  class="charField checkbox" id="rad4" name="problem" />
                    <label for="rad4">I don't have a problem, I'm just lonely and want to talk to someone.</label>
                </div>
            </div>       
                
            <div class="formbox">
                <input type="submit" id="btnSubmit" name="btnSubmit" class="button" value="Send!" />
            </div>
            </form>
        </div>
        
        <div id="footer">
            Scary Stuff &copy Scary People
        </div>
    </div>

</body>
</html>
