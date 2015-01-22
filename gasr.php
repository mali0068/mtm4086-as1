

<?php
//first I want to check if the user clicked the button
if(isset($_GET['btnSubmit'])){

   $header = "From:" . $_GET['email'];

    $subject = "GASR Customer Support";

    $usermsg = trim($_GET['message']);

    //get what charater they chose from the drop down menu
switch($_GET['charType']){
    case 'X':
        $character = "No Select";
        break;
    case 'CH':
        $character = 'Compost Heap';
        break;
    case 'F':
        $character = 'Felix';
        break;
    case 'RP':
        $character = 'Robo Pig';
        break;
    case 'SL':
        $character = 'Slime Man';
        break;
    case "SM":
        $character = 'Sock Monster';
        break;
    default:
       $character = 'Look at this test';

}
    //get the problem from the radio button
    switch($_GET['problem']){
        case 'R1':
            $problem = 'I played your game too much and my mouse/keyboard broke.';
            break;
        case 'R2':
            $problem = 'I have no significant other.  I need your sexy armours!';
            break;
        case 'R3':
            $problem = 'My account was stolen by hackers.';
            break;
        case 'R4':
            $problem = "I don't have a problem, I'm just lonely and want to talk to someone.";
            break;
        default:
            $problem = 'There was a problem';

    }

    $finalMsg =  $character . " is having the following problem: " . $problem .". Here is what they have to say: ". $usermsg;
    //echo $finalMsg;
    //send the message with the subject, who the email is from and the message that contains their problem and
    $ret = mail('broken@gasr.com', $subject, $finalMsg, $header);

    if($ret){
        echo "The email was sent! Maybe we'll help you. Maybe not";
    }else{
        echo "No email was sent. You got more problems now";
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
            <form name="yourChar" id="yourChar" action="<?php echo $_SERVER['PHP_SELF']?>" method="get">
            
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
                    <input type="radio" class="charField checkbox" value="R1" id="rad1" name="problem" />
                    <label for="rad1">I played your game too much and my mouse/keyboard broke.</label>
                    <input type="radio" class="charField checkbox" value="R2" id="rad2" name="problem" />
                	<label for="rad2">I have no significant other.  I need your sexy armours!</label>
                    <input type="radio" class="charField checkbox" value="R3" id="rad3" name="problem" />
                    <label for="rad3">My account was stolen by hackers.</label>
                    <input type="radio" class="charField checkbox" value="R4" id="rad4" name="problem" />
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
