<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ポートフォリオサイト</title>
	<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/about.css">
    <link rel="stylesheet" href="css/conta.css">
    <link rel="icon" href="img/sunder_a.svg" id="favicon">
</head>
<body>
    <div class="cursor"></div>
    <div class="hum">
        <div class="hum_btn"><span></span><span></span><span></span></div>
        <nav class="hum_nav">
            <ul>
                <li class="home_btn"><a href="index.php">HOME</a></li>
                <li class="about_btn"><a href="about.php">ABOUT</a></li>
                <li class="contents_btn"><a href="content.php">CONTENTS</a></li>
                <li class="contact_btn"><a href="contact.php">CONTACT</a></li>
            </ul>
        </nav>
    </div>
    <a class="logo" href="index.php">
        <svg viewBox="0 0 210.25 304.09" class="logo_a">
            <path class="st0" d="M29.7,26.6L2.6,156.3c-1.2,10.4,6.9,19.6,17.4,19.6l45.5-1c10,0,16.8,10.2,12.9,19.4L39.8,294.7
            c-2.1,5.1,4.5,9.4,8.2,5.3l156.5-165.4c7.2-7.8,1.8-20.4-8.8-20.6l-68,2.3c-7.7-0.1-12.4-8.5-8.6-15.2l39-83.6
            c3.9-6.7-1-15.1-8.7-15L56.4,2.9C42.8,2.9,31.3,13.1,29.7,26.6z"/>
            <g>
                <path d="M84.9,152.1l6.2-8.5h43.6l-28.8-43.4l-35.1,51.9h-12l40.6-59.6c1.3-2,3.6-3.8,6.6-3.8c3,0,5.2,1.7,6.6,3.8l40,59.6H84.9z"/>
            </g>
        </svg>
    </a>
    <nav class="nav">
        <ul>
            <li class="home_btn"><a href="index.php">HOME</a></li>
            <li class="about_btn"><a href="about.php">ABOUT</a></li>
            <li class="contents_btn"><a href="content.php">CONTENTS</a></li>
            <li class="contact_btn"><a href="contact.php">CONTACT</a></li>
        </ul>
    </nav>
	<main class="about">
        <?php include('./form.php'); ?>
	</main>
    <footer>
        <small>&copy;2022 Asada</small>
    </footer>
    <script src="js/jquery-3.6.0.js"></script>
    <script src="js/script.js"></script>
</body>
</html>