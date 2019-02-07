<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>確認画面</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div id="inquiry">
<?php
$dsn = 'mysql:dbname=kobohiraku_db;host=localhost';
$user = 'root';
$password = 'Ts17409488';
$dbh = new PDO($dsn,$user,$password);
$dbh -> query('SET NAMES utf8');

$sql = 'SELECT * FROM entries WHERE 1';
$stmt = $dbh -> prepare($sql);
$stmt -> execute();

echo '<table>'."\n";
echo '<tr><th>件名</th><th>お名前</th><th>メールアドレス</th><th>お問い合わせ内容</th></tr>'."\n";

while(1){
	$rec = $stmt ->fetch(PDO::FETCH_ASSOC);
	if($rec == false){
		break;
	}
	echo '<tr>';
	echo '<th>'.$rec['subject'].'</th>';
	echo '<td>'.$rec['name'].'</td>';
	echo '<td>'.$rec['email'].'</td>';
	echo '<td>'.$rec['content'].'</td>';
	echo '</tr>';
}
echo '</table>'."\n";
echo '<ul>'."\n";
echo '<li><a href="admin.html">メニューに戻る</a></li>'."\n";
echo '</ul>'."\n";

$dbh = null;
?>
</div>
</body>
</html>
