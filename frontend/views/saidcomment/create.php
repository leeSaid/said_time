<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\SaidComment */

$this->title = 'Create Said Comment';
$this->params['breadcrumbs'][] = ['label' => 'Said Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="said-comment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
