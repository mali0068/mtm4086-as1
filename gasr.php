<?php
//check if the submit button was pressed
if(isset($_POST['btnSubmit'])){
//get the form data, put things into php variables	
	$email = $_POST['email'];
//set the headers, from will be the email variable that gets the email you typed from the form
 	$headers  = "From: $email \r\n";
    $headers .= "Mime-Version: 1.0 \n";
    $headers .= "Content-Type: text/html; charset=\"utf-8\" \n";
//in the html message, get the form data using $_POST and put it where you want it to appear	
	$mes ='<html>
                <head>
                </head>
                <body>
                    <h2>User Troubles</h2>
                    <p>Problem: ' . $_POST['problem'] . '</p>
					<p>Character: ' . $_POST['charType'] . '</p>
					<p>Message: ' . trim($_POST['message']) . '</p>
                </body>
            </html>';
//and send the email to broken@gasr.com. You need ALL 4 things: email to send to, subject, message and headers
    $ret = mail('broken@gasr.com', 'User Troubles', $mes, $headers);

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
                    <input type="radio" class="charField checkbox" id="rad1" name="problem" value="I played your game too much and my mouse/keyboard broke." />
                    <label for="rad1">I played your game too much and my mouse/keyboard broke.</label>
                    <input type="radio" class="charField checkbox" id="rad2" name="problem" value ="I have no significant other.  I need your sexy armours!"/>
                	<label for="rad2">I have no significant other.  I need your sexy armours!</label>
                    <input type="radio" class="charField checkbox" id="rad3" name="problem" value="My account was stolen by hackers."/>
                    <label for="rad3">My account was stolen by hackers.</label>
                    <input type="radio" class="charField checkbox" id="rad4" name="problem" value="I don't have a problem, I'm just lonely and want to talk to someone."/>
                    <label for="rad4">I don't have a problem, I'm just lonely and want to talk to someone.</label>
                </div>

            </div>       
              
            <div class="formbox">
                <input type="submit" id="btnSubmit" name="btnSubmit" class="button" value="Send!" />
                <?php
if(isset($_POST['btnSubmit'])){				
    if($ret){
        echo '<p>The email was successfully sent! May your ' . $_POST['charType'] . ' destroy all its enemies.</p>';
    }else{
        echo "This mail server doesn't exist.";
    }	
}
				?>                  
                
            </div>
            </form>
        </div>
        
        <div id="footer">
            Scary Stuff &copy Scary People
        </div>
    </div>

</body>
</html>
