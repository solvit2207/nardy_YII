<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>

<table  border='solid 1px black' cellspacing=0><caption><h2>Результат проведенного эксперимента</h2></caption>
<tr><th>Номер эксперимента</th><th>Колличество очков</th><th>Колличество выпадений</th><th>Процент</th></tr>	
<?php foreach ($results as $results): ?>
<tr>
	<td><?=Html::encode("{$results->id_experiment}")?></td>
	<td><?=Html::encode("{$results->num}")?></td>
	<td><?=Html::encode("{$results->count}")?></td>
	<td><?=Html::encode("{$results->rate}")?></td>
</tr>
<?php endforeach; ?>
</table>
