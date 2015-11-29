<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\SaidTag */
?>
<div class="said-tag-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'frequency',
        ],
    ]) ?>

</div>
