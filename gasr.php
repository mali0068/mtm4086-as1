<?php
if(isset($_POST['btnSubmit'])){
	$email = trim($_POST['email']);
    //set the headers inside of a variable (so we can use them in the mail function later)
	$headers = "From:". $email ." \n";
    // the \n is a newline character - and needs to be used to add things to the headers
    $headers .= "Reply-To:". $email ." \n";
    // . is the PHP concatenation character - so .= adds to whatever is currently in the variable
    $headers .= "Content-Type: text/plain; charset=\"utf-8\" \n";
    //this sets the email type as just plain text
   
    //get character, subject & message from input
	$char = "Character: " . $_POST['charType'];
	
	
	if($_POST['problem1'] == "on"){
	    $problem = "I played your game too much and my mouse/keyboard broke.";
	}else if($_POST['problem2'] == "on"){
		$problem = "I have no significant other.  I need your sexy armours!";
	}else if($_POST['problem3'] == "on"){
		$problem = "My account was stolen by hackers.";
	}else if($_POST['problem4'] == "on"){
		$problem = "I don't have a problem, I'm just lonely and want to talk to someone.";
		}
    $subject = "Scary matter at hand: " . $problem;
    $msg = "Message: " . trim($_POST['message']);
	$full = $email ." \n". $char ." \n".  $msg;
   
    
	//email shall include the destination, subject, message, and headers
	$ret = mail('broken@gasr.com', $subject, $full, $headers);
	
    if($ret){
        echo "Email sent. That was hot";
    }else{
        echo "Damn it!";
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
                        <option value="Compost Heap">Compost Heap</option>
                        <option value="Felix">Felix</option>
                        <option value="Robo-Pig">Robo-Pig</option>
                        <option value="Slime Man">Slime Man</option>
                        <option value="Sock Monster">Sock Monster</option>
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
                    <input type="radio" class="charField checkbox" id="rad1" name="problem1" />
                    <label for="rad1">I played your game too much and my mouse/keyboard broke.</label>
                    <input type="radio" class="charField checkbox" id="rad2" name="problem2" />
                	<label for="rad2">I have no significant other.  I need your sexy armours!</label>
                    <input type="radio" class="charField checkbox" id="rad3" name="problem3" />
                    <label for="rad3">My account was stolen by hackers.</label>
                    <input type="radio" class="charField checkbox" id="rad4" name="problem4" />
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
