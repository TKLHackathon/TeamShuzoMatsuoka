<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>目標設定</title>
<link rel="stylesheet" href="p2.css" type="text/css">
<script type="text/javascript" src="p2.js"></script>
</head>
<body>
<!--クリックしたときに出てくる領域-->
<div id="popup-background" class="hidden" onclick="closePopup()">
<div id="popup" class="hidden" >
	<p class="date"></p>
	<form name="form">
		<textarea name="todo" placeholder="Todoを入力..."></textarea>
	</form>
</div>
</div>

<p>目標：<span id="goal">試作システム開発完了</span></p>
<p>期限：<span id="term">9/14</span></p>
<button type="button">保存</button>

<?php
//パラメータの取り出し
$sGoal = $_GET['goal'];
$sTerm = $_GET['term'];

$aToday = getdate();
//日数計算とカレンダー行数の計算

//タグに独自属性で日付を埋め込みながらforで出力


<table><!--カレンダー-->
	<tr><!--これを繰り返し-->
		<td class="passed" data-year="2017" data-month="9" data-day="3">
			<div class="date">9/3</div>
			<div class="todo"></div>
		</td>
		<td class="passed" data-year="2017" data-month="9" data-day="4">
			<div class="date">4</div>
			<div class="todo"></div>
		</td>
		<td data-year="2017" data-month="9" data-day="5">
			<div class="date">5</div>
			<div class="todo"></div>
		</td>
		<td data-year="2017" data-month="9" data-day="6">
			<div class="date">6</div>
			<div class="todo"></div>
		</td>
		<td data-year="2017" data-month="9" data-day="7">
			<div class="date">7</div>
			<div class="todo"></div>
		</td>
		<td data-year="2017" data-month="9" data-day="8">
			<div class="date">8</div>
			<div class="todo"></div>
		</td>
		<td data-year="2017" data-month="9" data-day="9">
			<div class="date">9</div>
			<div class="todo"></div>
		</td>
	</tr>
	<tr><!--これを繰り返し-->
		<td data-year="2017" data-month="9" data-day="10">
			<div class="date">10</div>
			<div class="todo"></div>
		</td>
		<td data-year="2017" data-month="9" data-day="11>
			<div class="date"">11</div>
			<div class="todo"></div>
		</td>
		<td data-year="2017" data-month="9" data-day="12">
			<div class="date">12</div>
			<div class="todo"></div>
		</td>
		<td data-year="2017" data-month="9" data-day="13">
			<div class="date">13</div>
			<div class="todo"></div>
		</td>
		<td class="goal" data-year="2017" data-month="9" data-day="14">
			<div class="date">14</div>
			<div class="todo"></div>
		</td>
		<td class="after-goal" data-year="2017" data-month="9" data-day="15">
			<div class="date">15</div>
			<div class="todo"></div>
		</td>
		<td class="after-goal" data-year="2017" data-month="9" data-day="16">
			<div class="date">16</div>
			<div class="todo"></div>
		</td>
	</tr>
</table>
?>

</body>
</html>