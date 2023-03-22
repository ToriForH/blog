<?php include("path.php");  ?>
<?php include(ROOT_PATH. "app/controllers/usersLog.php");
guestsOnly();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Kanit&display=swap" rel="stylesheet">

    <!-- Custom Styling -->
    <link rel="stylesheet" href="assets/css/style.css">

    <title>Login</title>
</head>
<body>

  <?php include(ROOT_PATH . "app/includes/header.php"); ?>

<div class="auth-content">

    <form action="login.php" method="post">
        <h2 class="form-title">Login</h2>

        <?php include(ROOT_PATH . "app/helpers/formErrors.php"); ?>

        <div>
            <label>Username</label>
            <input type="text" name="username" value="<?php echo $username; ?>" class="text-input">
        </div>
        <div>
            <label>Password</label>
            <input type="password" name="password" value="<?php echo $password; ?>" class="text-input">
        </div>
        <div>
            <button type="submit" name="login-btn" class="btn btn-reg">Login</button>
        </div>
        <p>Or <a href="<?php echo BASE_URL . '/register.php' ?>">Sign Up</a></p>
    </form>

</div>

<!-- JQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Custom Script -->
<script src="assets/js/scripts.js"></script>

</body>
</html>