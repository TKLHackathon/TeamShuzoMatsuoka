<?php

$server = "localhost";
$userName = "yudai";
$password = "you13bsk";
$dbName = "hakkason";

$mysqli = new mysqli($server, $userName, $password,$dbName);

//文字セットをutf8に変更
//mysql_set_charset("utf-8");

//接続に失敗するとメッセージ
if ($mysqli->connect_error){
        echo $mysqli->connect_error;
        exit();
}else{
        $mysqli->set_charset("utf-8");
}

//乱数生成
$r = rand(1,10);

$sql = "SELECT * FROM encouragement where no = $r";

$result = $mysqli -> query($sql);

//クエリー失敗
if(!$result) {
        echo $mysqli->error;
        exit();
}

//連想配列で取得
while($row = $result->fetch_array(MYSQLI_ASSOC)){
        $rows[] = $row;
}

//結果セットを解放
$result->free();

// データベース切断
$mysqli->close();

?>


<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<title>君ならできる！！！</title>
		<link rel="stylesheet" type="text/css" href="index.css">
	</head>
	<body>
		<h1>頑張る君を私たちは応援したい</h1>
		<div class="flex">
			<div class="image"><img src="image.jpeg" alt="マスコット" title=がんばれ！！！"" width="300px" height="300px" ></div>
			<div class="x">
				<?php
					 foreach($rows as $row){
  				 ?>
  				 <tr>
        				<td><?php echo htmlspecialchars($row['word'],ENT_QUOTES,'UTF-8'); ?></td>
 				</tr>

  			 <?php
   				 }
  			 ?>
			</div>
		</div>

		<h2>このサイトは？</h2>
		<p>このサイトは君たちの夢と希望を応援するサイトです。目標と期限に対して、ToDoを明確にし、君たちを助ける素晴らしいサイトです。</p>

		<h2>使い方</h2>
		<ol>
			<li>はじめに以下のボタンより、Twitter認証を行ってください。</li>
			<input type="button" value="Twitter認証" name="Twitter_auth" />
			<li>次に目標とそれの期限を以下のフォームに入力してください。</li>
			<li>目標と期限を入力したら、作成ボタンをクリックしてください。</li>
			<li>別画面で今日からその期限までのカレンダーが表示されるので、ToDoを各日程に入力し、保存ボタンをクリックしてください。</li>
			<li>一覧ボタンをクリックすると今までの目標カレンダーを見ることができます。</li>
		</ol>
		<p>秘密機能もあるよ、ふふふふふ
		<input type="radio" name="function" checked> ON 
		<input type="radio" name="function"> OFF
		</p> 

		<hr>
		
		<form action="p2.php" method="post">	
			<p>目標：<input type="text" name="goal"></p>
			<p>期限：<input type="date" name="term"></p>

			<input type="button" value="一覧" name="list" >
			<input type="submit" value="作成" name="create" >
		</form>

	</body>	
</html>
	
