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

<?php
//index.htmlから目標を受け取る
$sGoal = $_GET['goal'];
//index.htmlから期限を受け取る
$term = new DateTime($_GET['term']);
//曜日の定義
//format('w')の数字-> 日:0 月:1 火:2 水:3 木:4 金:5 土:6
$week = ['日','月','火','水','木','金','土'];
//今の日付
$aToday = new DateTime();
echo '$aToday: '.$aToday->format('Y/m/d');
//今日から期限までの日数
$interval = $aToday->diff($term);
//$intervalはDataIntervalクラス
//$interval->format('%a')で総日数を引いてくることができる

//カレンダーの一行目で空白のブロック数
$unshownDays = $aToday->format('w');
//カレンダー表示時に一日ずつ増加させて表示させていくための変数
$countUpDate = $aToday;
//coountUpDateが期限に到達しているかどうかを判定するフラグ。0の場合、到達していない。
$endFlag = 0;

?>

<p>目標：<span id="goal"><?php echo $sGoal; ?></span></p>
<p>期限：<span id="term"><?php echo $term->format('Y/m/d') .'('. $week[$term->format('w')] . ')'; ?></span></p>
<p>残り日数：<span id="diff"><?php echo $interval->format('%a 日'); ?></span></p>
<form action="" method="get">	
	<button type="button">保存</button>
</form>


<!-- 
日数計算とカレンダー行数の計算

タグに独自属性で日付を埋め込みながらforで出力
-->


<table>
	<tr>
		<?php foreach($week as $value): ?>
				<td>
					<div class="day"><?php echo $value ?></div>
				</td>
			<?php //endfor; ?>
		<?php endforeach; ?>
	</tr>
	<tr>
		<?php while($unshownDays>0): ?>
			<td>
				<div></div>
			</td>
		<?php 
			$unshownDays--;
			endwhile; 
		?>
		<?php 
			for($i=6-$unshownDays; $i--; $i>0): 
		?>
			<td>
				<div><?php echo $countUpDate->format('m/d'); ?></div>
			</td>
		<?php 
			$countUpDate->modify('+1 days');
			endfor; 
			if($countUpDate >= $term){$endFlag = 1;}
		?>
	</tr>
	<?php 
		while($endFlag == 0):
	?>
	<tr>
	<?php
			for($i=0; $i<7; $i++):
	?>
		<td>
			<div><?php 
				/*if($countUpDate <= $term){*/ echo $countUpDate->format('m/d'); //} 
			?></div>
		</td>	
	<?php 
				$countUpDate->modify('+1 days');
			endfor;
			if($countUpDate >= $term){$endFlag = 1;} 
	?>
	</tr>
	<?php
		endwhile;
	?>

<!--
<table><!--カレンダー
	<tr><!--これを繰り返し
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
	<tr><!--これを繰り返し
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
-->


</body>
</html>