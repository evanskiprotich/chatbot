<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Chatbot';
?>

<h1><?= Html::encode($this->title) ?></h1>

<div class="chatbot-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'prompt')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Ask', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

<?php if (isset($response)): ?>
    <h2>Response:</h2>
    <p><?= Html::encode($response) ?></p>
<?php endif; ?>