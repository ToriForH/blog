<?php include("../../path.php");
include(ROOT_PATH . "../../app/controllers/requests.php");
include(ROOT_PATH. "../../app/database/db.php");

$links = selectAll('navigation', ['footer' => 1]);
if(isset($_SESSION['id'])) {
    foreach ($links as $key => $link) {
        if( $link['name'] == 'Log In' || $link['name'] == 'Sign Up') {
            unset($links[$key]);
        }
    }
} else {
    foreach ($links as $key => $link) {
        if( $link['name'] == 'Logout' || $link['name'] == 'Dashboard') {
            unset($links[$key]);
        }
    }
}
?>


<!-- footer -->
<div class="footer">
    <div class="footer-content">
        <div class="footer-section about">
                <h1 class="logo-text"><span>Somename</span>Blog</h1>
                <p>
                    This is some text about blog. I write here anything just to fill up some lines. And one another sentence. It is almost done. I need just a little more text.
                    And some text here. Suggest this sentence could be the last, perhaps, I don't sure.
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
                <?php foreach ($links as $key => $link): ?>
                    <li><a href="<?php echo BASE_URL . $link['link']; ?>"><?php echo $link['name']; ?></a></li>
                <?php endforeach; ?>
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