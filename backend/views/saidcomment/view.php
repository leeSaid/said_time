<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\SaidComment */
?>
<div class="said-comment-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'said_id',
            'comment:ntext',
            'status',
            'user_id',
            'to_user_id',
            'created_at',
        ],
    ]) ?>

</div>
