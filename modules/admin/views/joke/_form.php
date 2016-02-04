<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\datetime\DateTimePicker;
use moonland\tinymce\TinyMCE;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Joke */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="joke-form">

    <?php $form = ActiveForm::begin(['id'=>'form_id',
      "enableClientValidation" => false,
  'options'=>[
  'class'=>'form_class',
  'enctype'=>'multipart/form-data',
  ],
  ]); ?>

  <div class="row">
  <div class="col-sm-6">
  <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
   <div class="row">
   <div  class="col-sm-6">
    <?= $form->field($model, 'active_from')->widget(DateTimePicker::classname(), [
  'options' => ['placeholder' => ''],
  'pluginOptions' => [
    'autoclose' => true,
    'format' => 'yyyy-mm-dd hh:ii:ss'
  ]
]); ?>
</div>
<div class="col-sm-6">
  <?= $form->field($model, 'active_to')->widget(DateTimePicker::classname(), [
  'options' => ['placeholder' => ''],
  'pluginOptions' => [
    'autoclose' => true,
    'format' => 'yyyy-mm-dd hh:ii:ss'
  ]
]); ?>
</div>
</div>
  <?= $form->field($model, 'category_ids')->checkboxList(ArrayHelper::map($categoriesList,'id','category'));?>
  <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
  </div>
   <div class="col-sm-6">
    <?= $form->field($model, 'content')->widget(TinyMCE::className());?>

   </div>
</div>
    <?php ActiveForm::end(); ?>
</div>