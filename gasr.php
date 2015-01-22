<?php

if(isset($_POST['btnSubmit'])){
	//check to see if the user is trying to type in anything nasty...
    $userInput = trim($_POST['email']) . trim($_POST['charType']) . trim($_POST['charJob']) . trim($_POST['problem']);
    if( preg_match("/multipart\alternative|content-type:|cc:|bcc:|boundry=)/i", $userInput)){
        //if we find any of these things, just kill the script
        die('Go away jerk.');
    }
	
	//get email and message from user-input
    $from = trim($_POST['email']);
	 //set the headers inside of a variable (so we can use them in the mail function later)
    $headers = "From: Himawan <".$from."> \n";
    // the \n is a newline character - and needs to be used to add things to the headers
    $headers .= "Reply-To: Adam <broken@gasr.com > \n";
    // . is the PHP concatenation character - so .= adds to whatever is currently in the variable
    //other headers: CC:, BCC:
    $headers .= "Mime-Version: 1.0 \n";
    //need a special PHP plugin to send this type of email...
    $headers .= "X-Mailer: PHP 5.x \n";
	

    

    //set up both types of messages:
    $headers .= "Content-Type: text/plain; charset=\"utf-8\" \n\n"; //define the content type
    $txt = trim($_POST['message']); //finally, add the text message

    //get the characters from user
	$char = trim($_POST['charType']);
	
	//get the type of problem from user
	$prob = trim($_POST['problem']);
	
	
    //combine text and HTML
    $msg =$from. "\n". $txt. "\n". $char. "\n". $prob;

    //mail function: who the email is going to, the subject, the message, and any headers (if present)
    $ret = mail('himawansudarso@gmail.com', 'TOP SECRET!',  $msg, $headers);
    if($ret){
        echo "The email was successfully sent!";
    }else{
        echo "This mail server doesn't exist.";
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
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" name="yourChar" id="yourChar" action="char.php" method="post">
            
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
                    <input value="I played your game too much and my mouse/keyboard broke." type="radio" class="charField checkbox" id="rad1" name="problem" />
                    <label for="rad1">I played your game too much and my mouse/keyboard broke.</label>
                    <input value="I have no significant other.  I need your sexy armours!" type="radio" class="charField checkbox" id="rad2" name="problem" />
                	<label for="rad2">I have no significant other.  I need your sexy armours!</label>
                    <input value="My account was stolen by hackers." type="radio" class="charField checkbox" id="rad3" name="problem" />
                    <label for="rad3">My account was stolen by hackers.</label>
                    <input value="I don't have a problem, I'm just lonely and want to talk to someone." type="radio" class="charField checkbox" id="rad4" name="problem" />
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
