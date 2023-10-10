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
$footer_site_name = selectOne('titles', ['visibility' => 1, 'label' => 'footer_blog_name']);
$temp_titles = selectAll('titles', ['visibility' => 1]);
$titles = array();
foreach ($temp_titles as $key => $value) {
    $titles[$value['label']] = $value;
}
$info = selectOne('info', ['visibility' => 1, 'label' => 'footer_info']);
$temp_contacts = selectAll('contacts', ['visibility' => 1]);
$contacts = array();
foreach ($temp_contacts as $key => $value) {
    $contacts[$value['label']] = $value;
}
?>


<!-- footer -->
<div class="footer">
    <div class="footer-content">
        <div class="footer-section about">
            <?php if(isset($footer_site_name)): ?>
                <h1 class="logo-text"><span><?php echo selectOne('titles', ['label' => 'site_name'])['title']; ?></span><?php echo selectOne('titles', ['label' => 'site_name_second_part'])['title']; ?></h1>
            <?php endif; ?>
                <?php echo $info['info_text']; ?>
            <div class="contact">
                <div><i class="fa-solid fa-phone"></i> &nbsp; <?php echo $contacts['phone_number']['contact']?></div>
                <div><i class="fa-solid fa-envelope"></i> &nbsp; <?php echo $contacts['email_address']['contact']?></div>
            </div>
            <div class="socials">
                <a href="<?php echo $contacts['facebook_link']['contact']?>"><i class="fab fa-facebook"></i></a>
                <a href="<?php echo $contacts['instagram_link']['contact']?>"><i class="fab fa-instagram"></i></a>
                <a href="<?php echo $contacts['twitter_link']['contact']?>"><i class="fab fa-twitter"></i></a>
                <a href="<?php echo $contacts['youtube_link']['contact']?>"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
        <div class="footer-section links">
            <h2><?php echo $titles['footer_links_title']['title']; ?></h2>
            <br>
            <ul>
                <?php foreach ($links as $key => $link): ?>
                    <li><a href="<?php echo BASE_URL . $link['link']; ?>"><?php echo $link['name']; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="footer-section contact-form">
            <h2><?php echo $titles['contact_form_title']['title']; ?></h2>
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
        &copy; <?php echo html_entity_decode($titles['bottom_c_sign']['title']); ?>
    </div>
</div>
<!-- //footer -->