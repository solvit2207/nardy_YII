<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
<table  border='solid 1px black' cellspacing=0><caption><h2>Проведенные эксперименты</h2></caption>
<tr><th>Дата эксперимента</th><th>Время эксперимента</th><th>Имя экспериментатора</th><th>Колличество кубиков</th><th>Колличество бросков</th></tr>	
<?php foreach ($names as $experiment): ?>
<tr>
	<td><?=Html::encode("{$experiment->date}")?></td>
	<td><?=Html::encode("{$experiment->time}")?></td>
	<td><?=Html::encode("{$experiment->name}")?></td>
	<td><?=Html::encode("{$experiment->bones_num}")?></td>
	<td><?=Html::encode("{$experiment->throws}")?></td>
</tr>
<?php endforeach; ?>
</table>
<?=LinkPager::widget(['pagination'=>$pagination]) ?>