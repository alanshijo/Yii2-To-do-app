<?php

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

?>
<div class="site-index">

    <?php $this->params['breadcrumbs'][] = $model->task_name; ?>

    <?php $form = ActiveForm::begin(['id' => 'update_task']); ?>

    <?= $form->field($model, 'task_name')->textInput(['value' => $model->task_name]); ?>

    <?= Html::submitButton('Update task', ['class' => 'btn btn-success']); ?>

    <?php ActiveForm::end(); ?>

</div>