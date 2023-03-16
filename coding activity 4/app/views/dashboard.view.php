<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/css/dashboardStyle.css" />
    <title>Dashboard</title>
</head>

<body>
    <div class="left">
        <img src="assets/images/cat_white.svg" alt="logo" />
        <a href="./dashboard" class="active">
            <img src="assets/images/settings.svg" alt="settings_logo" />
            <p>Settings</p>
        </a>
        <a href="api/user/logout">
            <img src="assets/images/logout.svg" alt="logout_logo" />
            <p>Logout</p>
        </a>
    </div>
    <div class="right">
        <form class="form_input" action="" method="POST">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" autocomplete="off" />
            <label for="email">Email</label>
            <input type="email" name="email" id="email" autocomplete="off" />
            <label for="confirm_email">Confirm Email <span>(Optional: If you want to change)</span></label>
            <input type="email" name="confirm_email" id="confirm_email" autocomplete="off" />
            <label for="password">Password <span>(Optional: If you want to change)</span></label>
            <input type="password" name="password" id="password" autocomplete="off" />
            <label for="confirm_password">Confirm Password <span>(Optional: If you want to change)</span></label>
            <input type="password" name="confirm_password" id="confirm_password" autocomplete="off" />
            <label for="name">Name</label>
            <input type="text" name="name" id="name" autocomplete="off" />
            <label for="gender">Gender</label>
            <input type="text" name="gender" id="gender" autocomplete="off" />
            <label for="address">Address</label>
            <input type="text" name="address" id="address" autocomplete="off" />
            <label for="birthdate">Date of Birth</label>
            <input type="date" name="birthdate" id="birthdate" autocomplete="off" />
            <p class="result" hidden></p>
            <input type="submit" name="submit" value="Update" />
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
    <script src="assets/js/dashboardScript.js"></script>
</body>

</html>