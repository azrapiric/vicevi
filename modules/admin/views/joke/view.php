<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\widgets\DatePicker;
use yii\widgets\ActiveForm;
use kartik\switchinput\SwitchInput;
use kartik\rating\StarRating;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Joke */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jokes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>



<div class="joke-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
          'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'content:ntext',
            'create_date',
            'views',
            'active',
        ],
    ]) ?>

       </div>
       <?php 
          $form = ActiveForm::begin([
            'action'=>'index.php?r=admin/joke/rating&id='.$model->id,
          ]); 
        ?>

        <?= $form->field($model, 'rating')->widget(StarRating::classname(), [
         'pluginOptions' => ['size'=>'lg']
        ]); ?>

        <div class="form-group">
           <?= Html::submitButton('Submit Rating', ['class' =>'btn btn-primary']) ?>
        </div>
        <?php ActiveForm::end(); ?>

       <!--Komentari foreach-->
       <?php 
       echo '<b>Comments:</b> </br>';
       foreach($comments as $value){ ?>
       
       <textarea rows="6" readonly><?=$value->content?></textarea> </br>
       <td><?=
        SwitchInput::widget(['type' => SwitchInput::CHECKBOX,'name'=>$value->id, 'value'=>false]);?></td>
    
      <?php } ?>

        
       <div class="comment-form">
    <?php $form = ActiveForm::begin([
    'action'=>'index.php?r=admin%2Fcomment%2Fcreate',]); ?>

    <?= $form->field($comment, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($comment, 'user_id')->hiddenInput(['value'=>1])->label(false) ?>

    <?= $form->field($comment, 'datetime')->hiddenInput(['value'=> date('Y-m-d H:i:s')])->label(false) ?>

    <?= $form->field($comment, 'joke_id')->hiddenInput(['value'=>$model->id])->label(false) ?>

    <?= $form->field($comment, 'aprooved')->widget(SwitchInput::classname(), [
    'type' => SwitchInput::CHECKBOX,'name'=>'active','value'=>false
        ]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $comment->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

   

    <?php ActiveForm::end(); ?>

</div>
    