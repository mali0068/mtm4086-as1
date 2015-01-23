<?php
      
if(isset($_POST['btnSubmit'])){
    
    //set the headers inside of a variables 
    $headers = "From:" . trim($_POST['email']) . "\n";
    //set the email type ----i chose text/html----
    $headers .= "Mime-Version: 1.0 \n";
    $headers .= "Content-type: text/html; charset=\"utf-8\" \n";

    //wrote a subject line
    $subject = "Game Broken? ...I guess we'll have to try and fix it.";
    
    //get the character, problem and message from user-input
    $char = $_POST['charType'];
    $problem = $_POST['problem'];
    $mess = trim($_POST['message']);
    
    //created the message
    $msg = '<html>
                <head>
                </head>
                <body>
                    <h2>Character:</h2>
                    <p> ' . $char . '</p>
                    <h2>Problem:</h2>
                    <p> ' .  $problem . '</p>
                    <h2>Message:</h2>
                    <p>' . $mess . '</p>
                </body>
            </html>';
    
    //used the mail function
    $ret = mail('broken@gasr.com', $subject, $msg, $headers);
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
    <!--Made a success/error message at the top of the page-->
      <?php
            if(isset($_POST['btnSubmit'])){
                  if($ret){
                        echo "The email was successfully sent!";
                    }else{
                        echo "This mail server doesn't exist.";
                    }
            }
         ?>
    
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
            
            <!--told the form where it is (current server location)-->
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" name="yourChar" id="yourChar">
            
            <div id="formleft">
                <div class="formbox">
                    <label for"email">Your E-mail:</label>
                    <input type="text" id="email" class="charField" name="email" />
                </div>
                
                <div class="formbox">
                    <label for"charType">Your Character:</label>
                    <select id="charType" name="charType" class="charField">
                    	<option value="X">Select your character...</option>
                        
                        
                        <!--added values to <option> and <input> tags so that php grabs something useful-->
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
                    <input type="radio" class="charField checkbox" id="rad1" name="problem" value="I played your game too much and my mouse/keyboard broke."/>
                    <label for="rad1">I played your game too much and my mouse/keyboard broke.</label>
                    <input type="radio" class="charField checkbox" id="rad2" name="problem" value="I have no significant other.  I need your sexy armours!"/>
                	<label for="rad2">I have no significant other.  I need your sexy armours!</label>
                    <input type="radio" class="charField checkbox" id="rad3" name="problem" value="My account was stolen by hackers."/>
                    <label for="rad3">My account was stolen by hackers.</label>
                    <input type="radio" class="charField checkbox" id="rad4" name="problem" value="I don't have a problem, I'm just lonely and want to talk to someone."/>
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
