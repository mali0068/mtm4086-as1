<?php
/***********************************************
Version 2
- Uses the basic mail() function to send an email
- Uses the headers parameter of the mail() function to
	set the From, Reply-To, and Content-Type
- The content type can be text/plain or text/html
- It can also include charset="utf-8"
- All headers should end with the newline character 
- The newline character is different on different operating systems
- On Linux or Unix it is \n
- On Mac servers it is \r
- On Windows servers it is \r\n
- Values from an HTML form or database can be embedded in the email headers or message.
- Checks to see if the mail successfully left the mail program on the server
 
***********************************************/
if(isset($_POST['btnSubmit'])){
    
	$headers = "From: <" . trim($_POST['email']) . "> \n";
    $headers .= "Content-Type: text/plain; charset=\"utf-8\" \n";
    
    $selected_problem = $_POST['problem'];
    
    if ($selected_problem == "rad1") {          
        $error = 'I played your game too much and my mouse/keyboard broke.';      
    }
    else if ($selected_problem == "rad2") {          
        $error = 'I have no significant other.  I need your sexy armours!';      
    }
    else if ($selected_problem == "rad3") {          
        $error = 'My account was stolen by hackers.';      
    }
    else if ($selected_problem == "rad4") {          
        $error = 'I don\'t have a problem, I\'m just lonely and want to talk to someone.';      
    }
    else {
        $error = 'Other';
    } 
    
    $charTypeSelected = $_POST['charType'];
    
    if ($charTypeSelected == "CH") {          
        $charType = 'Compost Heap';      
    }
    else if ($charTypeSelected == "F") {          
        $charType = 'Felix';      
    }
    else if ($charTypeSelected == "RP") {          
        $charType = 'Robo-Pig';      
    }
    else if ($charTypeSelected == "SL") {          
        $charType = 'Slime Man';      
    }
    else if ($charTypeSelected == "SM") {          
        $charType = 'Sock Monster';      
    }
    else {
        $error = 'No type selected.';
    } 
    
    $subject = "Message Concerning: " . $error . "\n";
    $message = "Character Type: " . $charType . "\n \n";
    $message .= trim($_POST['message']) . "\n";
    
    $ret = mail('dyltrevgriffiths@gmail.com', $subject, $message, $headers);
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
            <form name="yourChar" id="yourChar" action="<?=$_SERVER['PHP_SELF']?>" method="post">
            
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
                    <input type="radio" class="charField checkbox" id="rad2" name="problem"  value="rad2"/>
                	<label for="rad2">I have no significant other.  I need your sexy armours!</label>
                    <input type="radio" class="charField checkbox" id="rad3" name="problem" value="rad3"/>
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
