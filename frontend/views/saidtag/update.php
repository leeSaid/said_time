<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SaidTag */

$this->title = 'Update Said Tag: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Said Tags', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="said-tag-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
