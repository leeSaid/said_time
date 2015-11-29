<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Said */
?>
<div class="said-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_id',
            'title',
            'author',
            'excerpt',
            'image',
            'content:ntext',
            'tags',
            'view_count',
            'comment_count',
            'favorite_count',
            'like_count',
            'thanks_count',
            'hate_count',
            'status',
            'order',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
