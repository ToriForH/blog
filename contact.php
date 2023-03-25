<?php include("path.php");
include(ROOT_PATH. "app/database/db.php");
include(ROOT_PATH. "app/controllers/requests.php");
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
<?php include (ROOT_PATH. "app/includes/messages.php"); ?>

<!-- Page Wrapper -->
<div class="page-wrapper">

    <!-- Content -->
    <div class="content clearfix">

        <!-- Main Content Wrapper -->
        <div class="main-content single">
            <h1 class="contact-title">Contact form</h1>
            <form action="contact.php" method="post">
                <?php include(ROOT_PATH . "app/helpers/formErrors.php"); ?>
                <div>
                    <label>Your Email</label>
                    <input type="email" name="email" value="<?php echo $email; ?>" class="text-input contact-input" placeholder="Your email address...">
                </div>
                <div>
                    <label>Message</label>
                    <textarea name="message" id="body" class="text-input contact-input" placeholder="Your message..."><?php echo $message; ?></textarea>
                </div>
                <div>
                    <button type="submit" name="add-request" class="btn btn-send contact-btn">
                        <i class="fa-solid fa-envelope"></i>
                        Send
                    </button>
                </div>
            </form>

            <div class="contact-info">
                <span><i class="fa-solid fa-phone"></i> &nbsp; +380989234737</span>
                <span><i class="fa-solid fa-envelope"></i> &nbsp; viktoriia.herchanivska@gmail.com</span>
            </div>
            <div class="socials">
                <a href="https://facebook.com/profile.php?id=100008948389333"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
            </div>

        </div>
        <!-- //Main Content -->

        <?php include(ROOT_PATH . "app/includes/singleSidebar.php"); ?>

    </div>
    <!-- //Content -->

</div>
<!-- // Page Wrapper -->

<?php include(ROOT_PATH . "app/includes/footer.php"); ?>


<!-- JQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Custom Script -->
<script src="assets/js/scripts.js"></script>

</body>
</html>