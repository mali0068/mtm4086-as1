<?php
if(isset($_POST['btnSubmit'])){
    //set the headers inside of a variable (so we can use them in the mail function later)
    $headers = "From: error@gasr.com \n";
    // the \n is a newline character - and needs to be used to add things to the headers
    $headers .= "Reply-To: " . trim($_POST['email']) . "\n";
    // . is the PHP concatenation character - so .= adds to whatever is currently in the variable
    $headers .= "Content-Type: text/plain; charset=\"utf-8\" \n";
    //this sets the email type as just plain text
   
    //get subject & message from input
    $subject = $_POST['problem'];
	$msg = "Character: " . $_POST['charType'] . "\n";
    $msg .= "Message: " . trim($_POST['message']);
   
    
	//email shall include the destination, subject, message, and headers
	$ret = mail(/*'broken@gasr.com'*/'macs0014@algonquinlive.com', $subject, $msg, $headers);
	
    if($ret){
        echo "That was hot";
    }else{
        echo "You suck!";
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
            <form name="yourChar" id="yourChar" action="char.php" method="get">
            
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
                    <input type="radio" class="charField checkbox" id="rad1" name="problem" />
                    <label for="rad1">I played your game too much and my mouse/keyboard broke.</label>
                    <input type="radio" class="charField checkbox" id="rad2" name="problem" />
                	<label for="rad2">I have no significant other.  I need your sexy armours!</label>
                    <input type="radio" class="charField checkbox" id="rad3" name="problem" />
                    <label for="rad3">My account was stolen by hackers.</label>
                    <input type="radio" class="charField checkbox" id="rad4" name="problem" />
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
