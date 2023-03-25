<?php include("../../path.php");
include(ROOT_PATH . "../../app/controllers/requests.php");
include(ROOT_PATH. "../../app/database/db.php");
?>


<!-- footer -->
<div class="footer">
    <div class="footer-content">
        <div class="footer-section about">
            <h1 class="logo-text"><span>Shitty</span>Blog</h1>
            <p>
                This is some shitty blog. Blog about shit. Blog with shit. World is full of shit. Shit is inside everyone. You think, but shit do.
                Think about. Think a lot and may be one day you won't wake up in bed full of shit.
            </p>
            <div class="contact">
                <span><i class="fa-solid fa-phone"></i> &nbsp; +380989234737</span>
                <span><i class="fa-solid fa-envelope"></i> &nbsp; viktoriia.herchanivska@gmail.com</span>
            </div>
            <div class="socials">
                <a href="https://facebook.com/profile.php?id=100008948389333"><i class="fab fa-facebook"></i></a>
                <a href="https://www.instagram.com/exo_xaocy/"><i class="fab fa-instagram"></i></a>
                <a href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                <a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
        <div class="footer-section links">
            <h2>Quick Links</h2>
            <br>
            <ul>
                <a href="index.php"><li>Home</li></a>
                <a href="gallery.php"><li>Gallery</li></a>
                <?php if(isset($_SESSION['id'])): ?>
                    <a href="admin/dashboard.php"><li>Dashboard</li></a>
                    <a href="logout.php"><li>Logout</li></a>
                <?php else: ?>
                    <a href="register.php"><li>Sign Up</li></a>
                    <a href="login.php"><li>Log In</li></a>
                <?php endif; ?>
            </ul>
        </div>
        <div class="footer-section contact-form">
            <h2>Contact Us</h2>
            <br>
            <form action="contact.php" method="post">
                <input type="email" name="email" class="text-input contact-input" placeholder="Your email address...">
                <textarea rows="4" name="message" class="text-input contact-input" placeholder="Your message..."></textarea>
                <button type="submit" name="add-request" class="btn btn-send contact-btn">
                    <i class="fa-solid fa-envelope"></i>
                    Send
                </button>
            </form>
        </div>
    </div>
    <div class="footer-bottom">
        &copy; Created by Viktoriia Herchanivska | viktoriia.herchanivska@gmail.com
    </div>
</div>
<!-- //footer -->