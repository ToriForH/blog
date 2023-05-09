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
                <div><i class="fa-solid fa-phone"></i> &nbsp; +380989234737</div>
                <div><i class="fa-solid fa-envelope"></i> &nbsp; viktoriia.herchanivska@gmail.com</div>
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
                <li><a href="index.php">Home</a></li>
                <li><a href="gallery.php">Gallery</a></li>
                <?php if(isset($_SESSION['id'])): ?>
                    <li><a href="admin/dashboard.php">Dashboard</a></li>
                    <li><a href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a href="register.php">Sign Up</a></li>
                    <li><a href="login.php">Log In</a></li>
                <?php endif; ?>
            </ul>
        </div>
        <div class="footer-section contact-form">
            <h2>Contact Us</h2>
            <br>
            <form action="contact.php" method="post">
                <input type="email" name="email" class="text-input contact-input" placeholder="Your email address...">
                <textarea rows="4" name="message" class="text-input contact-input" placeholder="Your message..."></textarea>
                <button type="submit" name="add-request" class="btn btn-send">
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