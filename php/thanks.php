
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>メール送信完了</title>
    <link rel="shortcut icon" href="../img/favicon.ico">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/contact2.css">
    <!-- <link href="assets/animate.css" rel="stylesheet"> -->
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- <script src="assets/jquery.lettering.js"></script> -->
    <!-- <script src="jquery.textillate.js"></script> -->
    <!-- <script type="text/javascript" src="./jquery.inview.js"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery-scrollify@1/jquery.scrollify.min.js"></script> -->
  </head>
  <body class="fadeIn" class="progress" id="progress" >

  <div class="main">
    <header class="header" id="toppage">
     <a href="../index.html" class="fadeOut"><img id="logo" src="../img/logo3.png" alt="ロゴ"></a>
    <div class="navToggle">
      <span></span>
      <span></span>
      <span></span>
      <span>menu</span>
    </div>
      <nav class="menu">
        <ul class="menu_effect">
          <li><a href="../index.html">HOME</a></li>
          <li><a href="../about.html" class="fadeOut">ABOUT</a></li>
          <li><a href="../works.html" class="fadeOut">WORKS</a></li>
          <li><a href="../order.html" class="fadeOut">ORDER</a></li>
          <li><a href="../lesson.html" class="fadeOut">LESSON</a></li>
          <li><a href="contact_form.php" class="fadeOut">CONTACT</a></li>
        </ul>
          <a href="https://www.facebook.com/%E5%B7%A5%E6%88%BF%E3%81%B2%E3%82%89%E3%81%8F-174381986094451/" target="_blank">
            <img class="icon1" src="../img/icon/facebook-square-brands.png" alt="facebook" width="27px" height="30px">
          </a>
          <a href="https://www.instagram.com/k.hiraku/" target="_blank">
            <img class="icon2" src="../img/icon/instagram-brands.png" alt="instagram" width="27px" height="30px">
          </a>
      </nav>

    </header>
    <section class="progress" id="scroll">
      <div>

      </div>
    </section>
    <section class="contact">
      <div class="container">
        <h1>入力内容確認</h1>

        <div class="form">
          <?php
           $dsn = 'mysql:dbname=kobohiraku_db;host=localhost';
           $user = 'root';
           $password = 'Ts17409488';
           $dbh = new PDO($dsn,$user,$password);
           $dbh -> query('SET NAMES utf8');

           /* データの受け取り */
           $subject = $_POST["subject"]; //お名前
           $name = $_POST["name"]; //お名前
           $email = $_POST["email"]; //メールアドレス
           $content = $_POST["content"]; //お問合せ内容


           //危険な文字列を入力された場合にそのまま利用しない対策
           $subject	= htmlspecialchars($subject, ENT_QUOTES);
           $name	= htmlspecialchars($name, ENT_QUOTES);
           $email	= htmlspecialchars($email, ENT_QUOTES);
           $content	= htmlspecialchars($content, ENT_QUOTES);

           $errmsg = '';	//エラーメッセージを空にしておく
            if ($subject == '') {
           $errmsg = $errmsg.'<p>件名が入力されていません。</p>';
             }
            if ($name == '') {
           $errmsg = $errmsg.'<p>お名前が入力されていません。</p>';
             }
            if ($email == '') {
           $errmsg = $errmsg.'<p>メールアドレスが入力されていません。</p>';
             }
            if ($content == '') {
           $errmsg = $errmsg.'<p>お問合せ内容が入力されていません。</p>';
           }

           $sql = 'INSERT INTO entries(subject,name,email,content)VALUES("'.$subject.'","'.$name.'","'.$email.'","'.$content.'")';
           $stmt = $dbh -> prepare($sql);
           $stmt -> execute();

           $dbh = null;

   /*******************************
    入力内容の確認
   *******************************/

   /*******************************
  メール送信の実行
 *******************************/
 if ($errmsg != '') {
   //エラーメッセージが空ではない場合には、エラーメッセージを表示する
   echo $errmsg;

   //[前のページへ戻る]ボタンを表示する
   echo '<form method="post" action="index.php">';
   echo '<input type="hidden" name="subject." value="'.$subject.'">';
   echo '<input type="hidden" name="name" value="'.$name.'">';
   echo '<input type="hidden" name="email" value="'.$email.'">';
   echo '<input type="hidden" name="content" value="'.$content.'">';
   echo '<input type="submit" name="backbtn" value="前のページへ戻る">';
   echo '</form>';
 } else {
   //エラーメッセージが空の場合には、メール送信処理を実行する
   //メール本文の作成
 $honbun = '';
 $honbun .= "メールフォームよりお問い合わせがありました。\n\n";
 $honbun .= "【件名】\n";
 $honbun .= $subject."\n\n";
 $honbun .= "【お名前】\n";
 $honbun .= $name."\n\n";
 $honbun .= "【メールアドレス】\n";
 $honbun .= $email."\n\n";
 $honbun .= "【お問い合わせ内容】\n";
 $honbun .= $content."\n\n";

 //エンコード処理
 mb_language("Japanese");
 mb_internal_encoding("UTF-8");

 //メールの作成
 $mail_to	= "em.pt.pg.bs@gmail.com";			//送信先メールアドレス
 $mail_subject	= "メールフォームよりお問い合わせ";	//メールの件名
 $mail_body	= $honbun;				//メールの本文
 $mail_header	= "from:".$email;			//送信元として表示されるメールアドレス

 //メール送信処理
 $mailsousin	= mb_send_mail($mail_to, $mail_subject, $mail_body, $mail_header);

 //メール送信結果
 if($mailsousin == true) {
   echo '<p>お問い合わせメールを送信しました。</p>';
 } else {
   echo '<p>メール送信でエラーが発生しました。</p>';
 }
 }
  ?>


      </div>
      </div>
    </section>
    <p id="pageTop"><a href="#"><i class="fa fa-chevron-up"></i></a></p>
    <footer class="footer">
      <br><br>
      <p class="footer-title">つまみ細工｜工房ひらく</p>
      <p class="footer-tel">TEL : 000-0000-0000</p><br>
      <a href="https://www.facebook.com/%E5%B7%A5%E6%88%BF%E3%81%B2%E3%82%89%E3%81%8F-174381986094451/" target="_blank">
         <img class="icon3" src="../img/icon/facebook-square-brands.png" alt="facebook" width="27px" height="30px">
      </a>
      <a href="https://www.instagram.com/k.hiraku/" target="_blank">
        <img class="icon4" src="../img/icon/instagram-brands.png" alt="instagram" width="27px" height="30px">
      </a>

      <p class="footer-copyright">Copyright © 2019 kobo hiraku All Rights Reserved.</p>
    </footer>

    <script src="../js/menu.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/toppage.js"></script>
    <!-- <script src="http://localhost/kobohiraku-n/js/fade.js"></script> -->
    <!-- <script src="http://localhost/kobohiraku-n/js/anime.js"></script> -->
    <!-- <script src="js/scrollAnime.js"></script> -->
  </body>
</html>
