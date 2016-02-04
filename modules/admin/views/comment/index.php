<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\switchinput\SwitchInput;
use app\modules\admin\models\Comment;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\CommentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Comments');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Comment'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            'content:ntext',
             [
            'attribute'=>'nick',
            'value'=>function($data){
                /*if($data->person != NULL){
                return $data->person->nick;
                }else
                {return '';}}*/
                if(!empty($data->person->nick)){
                return $data->person->nick;
                }else
                {return '';}}
               
            ],
            [
    'attribute' => 'datetime',
    'value' => 'datetime',
    'filter' => \yii\jui\DatePicker::widget([
        'model'=>$searchModel,
        'attribute'=>'datetime',
        'language' => 'eng',
        'dateFormat' => 'yyyy-M-d',
    ]),
    'format' => 'html',
],

           [
            'attribute' => 'joke_id',
            'value' => function($data){
                
                $joke = Comment::getJoke($data->joke_id);

                return $joke->name;            },
        ],

           ['attribute'=>'aprooved',
           'value'=>function($data){
            if($data->aprooved==1){
                return "Yes";
            }else{ return "No";}
        }],

           [
            'class' => 'yii\grid\ActionColumn',
            'header'=>'Action',
            'headerOptions' => ['width' => '80'],
            'template' => '{update}{delete}{active}',
            'buttons'=>[
            'active'=>function($url,$model,$key){
                $url='index.php?r=admin/comment/active&id='.$model->id;
                if($model->aprooved==0){
                $options = ['class' => 'glyphicon glyphicon-ok'];}
                else{$options=['class'=>'glyphicon glyphicon-remove'];}
                return Html::a('',$url,$options);
            }
            ],
        ], 
        
    ]]); ?>

</div>
