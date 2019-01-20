
 <!DOCTYPE html>
 <html lang="ja">
 <head>
   <meta charset="utf-8">
   <title>メール送信完了</title>
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
     <link rel="stylesheet" href="css/contact3.css">
   <meta name="viewport" content="width=device-width,initial-scale=1">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


 </head>
 <body>
   <header>
       <i id="open_menu" class="fas fa-bars"></i>
       <nav id="menu">
         <i id="close_menu" class="fas fa-times"></i>
         <ul>
           <li><a href="http://localhost/kobohiraku/index.html">HOME</a></li>
           <li><a href="http://localhost/kobohiraku/about.html">ABOUT</a></li>
           <li><a href="http://localhost/kobohiraku/works.html">WORKS</a></li>
           <li><a href="http://localhost/kobohiraku/order.html">ORDER</a></li>
           <li><a href="http://localhost/kobohiraku/php/contact_form.php">CONTACT</a></li>
           <li><a href="#">MINNE</a></li>
           <li><a href="#">CREEMA</a></li>
         </ul>
       </nav>
       <div class="container">
         <h1>
           <a href="index.html">つまみ細工 工房ひらく</a>
         </h1>
     </div>
   </header>


   <section class="contact">
     <div class="container">


       <div class="form">
         <?php
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
   <footer>
     <div class="LINK">
       <ul class="SNS">
         <li>
           <a href="https://www.facebook.com/%E5%B7%A5%E6%88%BF%E3%81%B2%E3%82%89%E3%81%8F-174381986094451/" target="_blank">
            <img class="icon1" src="http://localhost/kobohiraku/img/icon/facebook-square-brands.png" alt="facebook" width="30px" height="30px">
           </a>
         </li>
         <li>
           <a href="https://www.instagram.com/k.hiraku/" target="_blank">
           <img class="icon2" src="http://localhost/kobohiraku/img/icon/instagram-brands.png" alt="instagram" width="30px" height="30px">
           </a>
         </li>
       </div>
      </ul>
     </div>
       </div>

     <div id="copyright">
       <p>Copyright © 2018 kobo hiraku All Rights Reserved.</p>
     </div>
   </footer>

   <script src="http://localhost/kobohiraku/js/menu.js"></script>

 <script>
 $(function(){
 var topBtn=$('#pageTop');
 topBtn.hide();

 $(window).scroll(function(){
   if($(this).scrollTop()>80){

     topBtn.fadeIn();
   }else{
     topBtn.fadeOut();
   }
 });

 topBtn.click(function(){
   $('body,html').animate({
   scrollTop: 0},500);
   return false;
 });
 });
 </script>

 </script>
 </body>
 </html>
