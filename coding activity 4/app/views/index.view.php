<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/loginStyle.css" />
</head>

<body>
    <div class="login_form">
        <div class="header">
            <img src="assets/images/cat.svg" alt="logo" />
            <h1>Welcome back</h1>
            <p>Welcome back! Please enter your details.</p>
        </div>
        <form class="form_input" action="" method="POST">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" autocomplete="off" />
            <label for="password">Password</label>
            <input type="password" name="password" id="password" autocomplete="off" />
            <p class="result" hidden></p>
            <input type="submit" name="submit" value="Log In" />
        </form>
        <p>Don't have an account? <a href="./register">Register</a></p>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
    <script src="assets/js/loginScript.js"></script>
</body>

</html>