<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/Css/user/contact_us.css">
    <title>XShop</title>
</head>
<body>
    <?php include "header.php"?>
    <div class="contact_container">
        <div class="contact_img">
            <img src="../assets/img/su-dung-2-man-hinh-may-tinh-ngang-va-doc-2021-08-18-2.webp" alt="">
        </div>
        <div class="contact_form">
            <form action="add_contact_message.php" method="GET">
                <label for="name">Your Name</label>
                <input type="text" id="name" name="name" placeholder="Your name" required>

                <label for="email">Your Email</label>
                <input type="email" id="email" name="email" placeholder="Your email" required>

                <label for="message">Message</label>
                <textarea id="message" name="message" placeholder="Write your message" style="height:200px" required></textarea>

                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
    <div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.8122566706525!2d105.8397535740082!3d21.00016158876259!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac70a2f48a15%3A0xfc5dfbb8602d0eef!2zMjA3IEdp4bqjaSBQaMOzbmcsIMSQ4buTbmcgVMOibSwgSGFpIELDoCBUcsawbmcsIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1700148492699!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
    <?php include "footer.php"?>
</body>
</html>