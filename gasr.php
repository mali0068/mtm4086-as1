<?php

if(isset($_POST['btnSubmit'])){
	//the button was clicked so send the email...
	$headers = "From: <". $_POST['email'] . "> \n";
	//the email address goes inside the angle brackets
	//anything in front of that will be the display name
	$headers .= "Reply-To: <". $_POST['email'] . "> \n";
	$headers .= "Content-Type: text/plain; charset=\"utf-8\" \n";
	
	$subject = "Message from website concerning" ;
	
    if($_POST['charType']== "CH"){
    $message = "Compost Heap";
    
    
    }else if($_POST['charType']== "F"){
    $message = "Felix";
    
    }else if($_POST['charType']== "RP"){
    $message = "Robo-Pig";
    
    }else if($_POST['charType']== "SL"){
    $message = "Slime-Man";
    
    }else if($_POST['charType']== "SM"){
     $message = "Sock-Monster";
    
    }
    
     if($_POST['problem']== "rad1"){
    $prb = "I played your game too much and my mouse/keyboard broke.";
    
    }else if($_POST['problem']== "rad2"){
    $prb = "I have no significant other.  I need your sexy armours!";
    
    }else if($_POST['problem']== "rad3"){
    $prb = "My account was stolen by hackers.";
    
    }else if($_POST['problem']== "rad4"){
    $prb = "I don't have a problem, I'm just lonely and want to talk to someone.";
    
    }
    $comments = $message . "\n";
       
    $comments .= trim($_POST['message']) . "\n";
    
    $comments  .= $prb;
	    echo $comments;
	//$msg = "This is the message in the email.";
	
	$ret = mail('elliotc1@algonquincollege.com', $subject, $comments, $headers);
	if($ret){
		echo 'The email was successfully sent.';
	}else{
		echo 'The mail server did not like you.';
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
            <form name="yourChar" id="yourChar" action="gasr.php" method="POST">
            
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
                    <input type="radio" class="charField checkbox" id="rad1" name="problem" value="rad1"/>
                    <label for="rad1">I played your game too much and my mouse/keyboard broke.</label>
                    <input type="radio" class="charField checkbox" id="rad2" name="problem" value="rad2" />
                	<label for="rad2">I have no significant other.  I need your sexy armours!</label>
                    <input type="radio" class="charField checkbox" id="rad3" name="problem" value="rad3" />
                    <label for="rad3">My account was stolen by hackers.</label>
                    <input type="radio" class="charField checkbox" id="rad4" name="problem" value="rad4"/>
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
