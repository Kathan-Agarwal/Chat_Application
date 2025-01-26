<?php
//session_start(); // session to store username


//check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'])) {

    //store the submitted name in a session variable
    $_SESSION['username'] = htmlspecialchars($_POST['name']);
}

// check if the user is logged in
$isLoggedIn = isset($_SESSION['username']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Application</title>
    <link rel="stylesheet" href="style.css"
</head>
<body>
    <?php if (!$isLoggedIn): ?>
        <!--show login form if not logged in -->
    <div id="loginform">
        <p>Please enter your name to continue!</p>
        <form action="index.php"method="post">
        <label for="name">Name:</label>
            <input name="name" type="text" id="name"></input>
            <input name="enter" type="submit" id="enter" value="Enter"></input>
        </form>
    </div>
    <?php else: ?>
        <!-- Show chatbox if logged in -->
    <div id="wrapper">
    <div id="menu">Welcome, <?= $_SESSION['username'] ?>!</div>
    <div id="chatbox">Chatbox is ready!</div>
        <form name="message" action="">
        <input name="usermsg" type="text" id="usermsg" placeholder="Type your message here..." required>
        <input name="submitmsg" type="submit" id="submitmsg" value="Send">
        
        </form>


    </div>
    <?php endif; ?>
</body>
</html>