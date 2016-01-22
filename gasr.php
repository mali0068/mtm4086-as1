<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>GASR</title>
<link href="styles/styles.css" rel="stylesheet" />
</head>

<body>
<?php ob_start();
    $email = $_POST['email'];
    $text = $_POST['message'];
    $subject = "Email Submission: GAS_RPG";
    $emailto = "elliotc1@algonquincollege.com";
    $headers = "From: <$email>\r\nReply-To: $email\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type:text/html;charset=iso-8859-1\r\n";

        // character
        if ($_POST['charType'] == "F"){
        $value = "Felix";
            }else if ($_POST['charType'] == "CH"){
        $value = "Compost Heap";
            }else if ($_POST['charType'] == "RP"){
        $value = "Robo-Pig";
            }else if ($_POST['charType'] == "SL"){
        $value = "Slime Man";        
            }else if ($_POST['charType'] == "SM"){
        $value = "Sock Monster";        
            };
        
        // problem
            if ($_POST['problem'] == "rad1"){
        $rad = "I played your game too much and my mouse/keyboard broke.";
            }else if ($_POST['problem'] == "rad2"){
        $rad = "I have no significant other.  I need your sexy armours!";
            }else if ($_POST['problem'] == "rad3"){
        $rad = "I have no significant other.  I need your sexy armours!";
            }else if ($_POST['problem'] == "rad4"){
        $rad = "I don't have a problem, I'm just lonely and want to talk to someone.";        
            };

    $message = "<strong>From:</strong>" . " " . $value . "<br><strong>Email:</strong>" . " " . $email . "<hr>" . "<p><strong>Message:</strong></p>" . $text . "<br>" . "<p><strong>Type of problem:</strong></p>" . $rad . "<br>" . "<hr>" . "<h3>Generically Awesome <br> Super Rpg Inc.</h3>";
    mb_send_mail($emailto, $subject, $message, $headers);
    ob_flush();
    header("Location: skylyyt.com?success");

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
            <form name="yourChar" id="yourChar" action="" method="post">
            
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
                    <input type="radio" class="charField checkbox" id="rad1" value="rad1" name="problem" />
                    <label for="rad1">I played your game too much and my mouse/keyboard broke.</label>
                    <input type="radio" class="charField checkbox" id="rad2" value="rad2" name="problem" />
                    <label for="rad2">I have no significant other.  I need your sexy armours!</label>
                    <input type="radio" class="charField checkbox" id="rad3" value="rad3" name="problem" />
                    <label for="rad3">My account was stolen by hackers.</label>
                    <input type="radio" class="charField checkbox" id="rad4" value="rad4" name="problem" />
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
