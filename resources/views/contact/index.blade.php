<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex,nofollow">
    <meta name="description" content="これは HTMLCSS の課題作品です。">
    <title>Japan on 2 Wheels</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://use.fontawesome.com/releases/v6.4.2/css/all.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="images/own/favicon-16x16.png">
</head>

<body class="white_background">
    <header>
        <a href="index.html" id="brand_wrapper"> <!--ロゴとブランド名を含む div 要素。-->
            <img src="images/own/brand-logo.png" alt="Brand Logo">
            <h1>J.<span>O</span>.2 Bike Rental</h1>
        </a>

        <nav id="top_nav"> <!--　ナヴィゲーション・バ－　-->
            <ul>
                <li><a href="routes.html">Routes</a></li>
                <li><a href="prices.html">Prices</a></li>
                <li><a href="#">Insurance</a></li>
                <li><a href="#">Sign in</a></li>
                <li><a href="contact.html">Contact us</a></li>
            </ul>
        </nav>
    </header>

    <section id="prices_contact_main"> <!--タイトル、パラグラフと背景動画を含むMain セクション。-->
        <div id="prices_contact_info">
            <h2>GET IN TOUCH</h2>
            <p>LET US HEAR FROM YOU</p>
        </div>
    </section>

    <section id="contact_section">

        <form action="#" method="post">

            <div class="input_wrapper">
                <label for="name">Name:</label>
                <input name="name" type="text" id="name" class="typed_input" placeholder="My name" required>
            </div>

            <div class="input_wrapper">
                <label for="email">Email:</label>
                <input name="email" type="text" id="email" class="typed_input" placeholder="email@email.com" required>
            </div>

            <div class="input_wrapper">
                <label for="age">Age:</label>
                <input name="age" type="number" id="age" min="18" max="100" class="typed_input" placeholder="18"
                    required>
            </div>

            <div class="input_wrapper">
                <label for="message">Your message:</label>
                <textarea name="" id="message" cols="30" rows="10"
                    placeholder="Give us your opinion / Ask us your questions."></textarea>
            </div>

            <input type="submit" value="Send" id="send_button">
        </form>

        <div id="contact_notes">

            <h3>CONTACT DETAILS</h3>
            <h4>OSAKA MAIN SHOP:</h4>
            <ul>
                <li><em>Direction:</em> 1-#-# Osaka City, Osaka Prefecture, Japan, ###-###</li>
                <li><em>Tel:</em> (012) ###-###</li>
                <li><em>Email:</em> <a href="mailto:jo2@motoservices.com">〇〇2@〇〇〇〇.com</a> </li>
                <li><em>Business Hours:</em> 8:00 to 20:00, 7 days a week</li>
            </ul>

            <div id="map_container">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3280.1066536738886!2d135.4933756754578!3d34.70248978311734!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6000e68d95e3a70b%3A0x1baec822e859c84a!2sOsaka%20Station!5e0!3m2!1sen!2sjp!4v1692627031264!5m2!1sen!2sjp"
                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <p>※このマップはダミーです。</p>
        </div>
    </section>

    <footer>
        <div>
            <small>© 2023 Japan On 2 Wheels @.C.H.</small>
        </div>

        <div id="media_icons">
            <h4>FOLLOW US</h4>
            <a href="#"><img src="images/icons/envelope.svg" alt="email icon"></a>
            <a href="#"><img src="images/icons/phone.svg" alt="mobile phone icon"></a>
            <a href="#"><img src="images/icons/instagram.svg" alt="instagram icon"></a>
            <a href="#"><img src="images/icons/youtube.svg" alt="youtube icon"></a>
        </div>
    </footer>
</body>

</html>