<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\ContactForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\captcha\Captcha;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1>
        <?= Html::encode($this->title) ?>
    </h1>

    <div class="row">
        <div class="col-lg-5">

            <?php $form = ActiveForm::begin(['id' => 'signup-form']); ?>
            <div class="row">
                <div class="col">

                    <?= $form->field($model, 'first_name') ?>
                </div>

                <div class="col">
                    <?= $form->field($model, 'last_name') ?>

                </div>
            </div>
            <?= $form->field($model, 'email') ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <?= $form->field($model, 'password_confirm')->passwordInput() ?>


            <?= $form->field($model, 'verifyCode')->widget(Captcha::class, [
                'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
            ]) ?>

            <div class="form-group">
                <?= Html::submitButton('Register', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
            </div>

            <?= Html::tag('p', 'Already have an account? ' . Html::a('Login here!', ['login'])); ?>
            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>