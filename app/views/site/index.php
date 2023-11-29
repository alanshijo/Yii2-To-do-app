<?php

/** @var yii\web\View $this */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\bootstrap5\LinkPager;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\grid\SerialColumn;

$this->title = 'To-Do';
?>
<div class="site-index">

    <?php $form = ActiveForm::begin(['id' => 'add_task']); ?>
    <div class="row d-flex align-items-center">
        <div class="col-8">
            <?= $form->field($model, 'task_name')->textInput(['placeholder' => 'Enter your task name here.']); ?>
        </div>
        <div class="col-4">
            <?= Html::submitButton('Add task', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
    <?= GridView::widget([
        'dataProvider' => $data_provider,
        'pager' => [
            'class' => LinkPager::class
        ],
        'columns' => [
            [
                'class' => SerialColumn::class,
                'header' => 'Sl. No.'
            ],
            [
                'attribute' => 'task_name',
                'label' => 'Task Name',
                'enableSorting' => false
            ],
            [
                'attribute' => 'updated_at',
                'label' => 'Created At',
                'enableSorting' => false
            ],
            [
                'class' => ActionColumn::class,
                'header' => 'Actions',
                'template' => '{update} {delete}'
            ]
        ],
    ]) ?>

</div>