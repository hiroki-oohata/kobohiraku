<?php
/*******************************
 確認ページから戻ってきた場合のデータの受け取り
*******************************/
if (isset($_POST["backbtn"])) {
	//確認ページ（confirm.php）から戻ってきた場合にはデータを受け取る
	$subject		= $_POST["subject"];		//件名
	$name		= $_POST["name"];		//お名前
	$email	= $_POST["email"];	//メールアドレス
	$content		= $_POST["content"];		//お問合せ内容

	//危険な文字列を入力された場合にそのまま利用しない対策
	$subject		= htmlspecialchars($subject, ENT_QUOTES);
	$name		= htmlspecialchars($name, ENT_QUOTES);
	$email	= htmlspecialchars($email, ENT_QUOTES);
	$content		= htmlspecialchars($content, ENT_QUOTES);
} else {
	//確認ページから戻ってきた場合でなければ、変数の値は必ず空となる
	$subject		= '';				//件名
	$name		= '';				//お名前
	$email	= '';				//メールアドレス
	$content		= '';				//お問合せ内容
}
?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>工房ひらく</title>
    <link rel="shortcut icon" href="http://localhost/kobohiraku-n/img/favicon.ico">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="http://localhost/kobohiraku-n/css/normalize.css">
    <link rel="stylesheet" href="http://localhost/kobohiraku-n/css/contact.css">
    <!-- <link href="assets/animate.css" rel="stylesheet"> -->
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- <script src="assets/jquery.lettering.js"></script> -->
    <!-- <script src="jquery.textillate.js"></script> -->
    <!-- <script type="text/javascript" src="./jquery.inview.js"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery-scrollify@1/jquery.scrollify.min.js"></script> -->
  </head>
  <body class="fadeIn" class="progress" id="progress" >
    <div class="anime">
    <img src="http://localhost/kobohiraku-n/img/contact.png" width="190px" height="100px">
    </div>
      <!-- <span class="progress-bar"></span>
      <span class="progress-text">0%</span> -->
  <div class="main">
    <header class="header" id="toppage">
     <a href="http://localhost/kobohiraku-n/index.html" class="fadeOut"><img id="logo" src="http://localhost/kobohiraku-n/img/logo3.png" alt="ロゴ"></a>
    <div class="navToggle">
      <span></span>
      <span></span>
      <span></span>
      <span>menu</span>
    </div>
      <nav class="menu">
        <ul class="menu_effect">
          <li><a href="http://localhost/kobohiraku-n/index.html">HOME</a></li>
          <li><a href="http://localhost/kobohiraku-n/about.html" class="fadeOut">ABOUT</a></li>
          <li><a href="http://localhost/kobohiraku-n/works.html" class="fadeOut">WORKS</a></li>
          <li><a href="http://localhost/kobohiraku-n/order.html" class="fadeOut">ORDER</a></li>
          <li><a href="http://localhost/kobohiraku-n/php/contact_form.php" class="fadeOut">CONTACT</a></li>
        </ul>
          <a href="https://www.facebook.com/%E5%B7%A5%E6%88%BF%E3%81%B2%E3%82%89%E3%81%8F-174381986094451/" target="_blank">
            <img class="icon1" src="http://localhost/kobohiraku-n/img/icon/facebook-square-brands.png" alt="facebook" width="27px" height="30px">
          </a>
          <a href="https://www.instagram.com/k.hiraku/" target="_blank">
            <img class="icon2" src="http://localhost/kobohiraku-n/img/icon/instagram-brands.png" alt="instagram" width="27px" height="30px">
          </a>
      </nav>

    </header>
    <section class="progress" id="scroll">
      <div>

      </div>
    </section>

    <div class="contact" id="scroll">
      <div class="contact-box">
        <h1>お問い合わせ</h1>
        <h2>サブタイトル</h2>
        <p>コメントコメントコメントコメントコメント
         コメントコメントコメントコメントコメント
         コメントコメントコメントコメントコメント</p>
      </div>

			<div class="container">

				<div class="form">
					<form action="mailform_confirm.php" method="post" class="mailform">
					<table border="0" cellpadding="1" cellspacing="1" summary="メールフォーム">
						<tr>
						<th class="thead">件名<span class="abs">*</span></th>
						</tr>
						<tr>
							<td><input class="input" type="text" name="subject" value="<?=$subject?>" maxlength="10" style="width: 270px;"></td>
						</tr>
						<tr>
							<th class="thead">お名前<span class="abs">*</span></th>
						</tr>
						<tr>

							<td><input class="input" type="text" name="name" value="<?=$name?>" maxlength="10" style="width: 270px;"></td>
						</tr>
						<tr>
							<th class="thead">メールアドレス<span class="abs">*</span>（半角入力）</th>
						</tr>
						<tr>
							<td><input class="input" type="mail" name="email" value="<?=$email?>" placeholder="例)aaaaaaa@bbbb.com" maxlength="80" style="width: 270px;"> </td>
						</tr>

						<tr>
							<th class="thead">内容<span class="abs">*</span></th>
						</tr>
						<tr>
							<td><textarea class="input" name="content" placeholder="内容を入力して下さい" maxlength="500" style="width: 315px; height: 170px"><?=$content?></textarea></td>
						</tr>
						<tr>
							<td colspan="2" class="submit">
							<input class="input" type="submit" name="submit" value="確認" >
							</td>
						</tr>
					</table>
					</form>
				</div>
			</div>

    </div>
    <p id="pageTop"><a href="#"><i class="fa fa-chevron-up"></i></a></p>
    <footer class="footer">
      <br><br>
      <p class="footer-title">つまみ細工｜工房ひらく</p>
      <p class="footer-tel">TEL : 090-7337-2978</p><br>
      <a href="https://www.facebook.com/%E5%B7%A5%E6%88%BF%E3%81%B2%E3%82%89%E3%81%8F-174381986094451/" target="_blank">
         <img class="icon3" src="http://localhost/kobohiraku-n/img/icon/facebook-square-brands.png" alt="facebook" width="27px" height="30px">
      </a>
      <a href="https://www.instagram.com/k.hiraku/" target="_blank">
        <img class="icon4" src="http://localhost/kobohiraku-n/img/icon/instagram-brands.png" alt="instagram" width="27px" height="30px">
      </a>

      <p class="footer-copyright">Copyright © 2019 kobo hiraku All Rights Reserved.</p>
    </footer>

    <script src="http://localhost/kobohiraku-n/js/menu.js"></script>
    <script src="http://localhost/kobohiraku-n/js/main.js"></script>
    <script src="http://localhost/kobohiraku-n/js/toppage.js"></script>
    <script src="http://localhost/kobohiraku-n/js/fade.js"></script>
    <script src="http://localhost/kobohiraku-n/js/anime.js"></script>
    <!-- <script src="js/scrollAnime.js"></script> -->
  </body>
</html>
