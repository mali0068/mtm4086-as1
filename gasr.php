<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>GASR</title>
<link href="styles/styles.css" rel="stylesheet" />
</head>

<body>
<?php
if(isset($_POST['btnSend'])){
    $error = '';
    $char = '';
    $msg = '';
    $email = trim($_POST['email']);

	$headers = "From: <" . $email . "> \n";
	$headers .= "Reply-To: <" . $email . "> \n"; 
	$headers .= "Content-Type: text/plain; charset=\"utf-8\" \n";
	
    $selected_rad = $_POST['problem'];
    
    if($selected_rad == "1"){
        $error = "I played your game too much and my mouse/keyboard broke.";
    }else if($selected_rad == "2"){
        $error = "I have no significant other.  I need your sexy armours!";     
    }else if($selected_rad == "3"){
        $error = "My account was stolen by hackers.";
    }else if($selected_rad == "4"){
        $error = "I don't have a problem, I'm just lonely and want to talk to someone.";
    }else{
        $error = "No Error selected";
    }
    
    $problem = "The problem: " . $error;
    
    $msg = "The Character thats complaining is ";
    $selected_val = $_POST['charType'];
    if($selected_val == 'X'){
        $char = "No Character selected";
    }else if($selected_val == 'CH'){
        $char = 'Compost Heap';
    }else if($selected_val == 'F'){
        $char = 'Felix';
    }else if($selected_val == 'RP'){
        $char = 'Robo-Pig';
    }else if($selected_val == 'SL'){
        $char = 'Slime Man';
    }else{
        $char = 'Sock Monster';
    }
    $msg .= $char;
    
	$msg .= $_POST['message'];
	
	$ret = mail('jordankoski@live.ca', $problem, $msg, $headers);
    if($ret){
        echo 'Email SENT!';
    }else{
        echo 'No EMAIL for YOU!';
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
                    <input type="radio" class="charField checkbox" id="rad1" name="problem" value=1 />
                    <label for="rad1">I played your game too much and my mouse/keyboard broke.</label>
                    <input type="radio" class="charField checkbox" id="rad2" name="problem" value=2 />
                	<label for="rad2">I have no significant other.  I need your sexy armours!</label>
                    <input type="radio" class="charField checkbox" id="rad3" name="problem" value=3 />
                    <label for="rad3">My account was stolen by hackers.</label>
                    <input type="radio" class="charField checkbox" id="rad4" name="problem" value=4 />
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
