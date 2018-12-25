

<?php require_once $_SERVER['DOCUMENT_ROOT'].'/header.php' ?>
    <div class="content contact-us">
        <h2>Contact us</h2>
        <p>My Company , 4578 Marmora Road, Glasgow D4 8GR <br>
            Call us now: 0123-456-789 <br>
            Email: info@demolink.org</p>
        <hr>
        <form class="contact-form" method="post">
            <div class="contact-col1">
                <div class="contact-group">
                    <label for="fullname">Enter your full name, please:</label><br>
                    <input type="text" name="fullname" id="fullname"><br>
                </div>
                <div class="contact-group">
                    <label for="phone">Your phone number:</label><br>
                    <input type="text" name="phone" id="phone"><br>
                </div>
                <div class="contact-group">
                    <label for="email">Your e-mail:</label><br>
                    <input type="text" name="email" id="email">
                </div>
            </div>

            <div class="contact-col2">
                <label for="message">WTF happened?</label><br>
                <textarea name="message" id="message" rows="12" cols="80"></textarea>

            </div>
            <div class="clearfix"></div>
            <input type="submit" class="btn" value="Send">
        </form>
    </div>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/footer.html' ?>
