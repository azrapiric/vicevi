<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\switchinput\SwitchInput;
use kartik\daterange\DateRangePicker;
use app\modules\admin\models\Person;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\JokeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Jokes');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="joke-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Joke'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
            'label'=>'Name',
            'format'=>'raw',
            'value'=>function($data){
                //print_r($data->nick);
                //die();

                $url = "index.php?r=admin/joke/view&id=".$data->id;
                return Html::a($data->name,$url, ['title' => 'View Joke']);
            
            }
            ],

                
     'content:ntext',
     //'nick',
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
            ['attribute' => 'create_date',
    'value' => 'create_date',
    'filter' => \yii\jui\DatePicker::widget([
        'model'=>$searchModel,
        'attribute'=>'create_date',
        'language' => 'eng',
        'dateFormat' => 'yyyy-M-d',
    ]),
    'format' => 'html',
],
            'views',
            [
             'attribute'=>'active',
    'filter'=>array("1"=>"Yes","2"=>"No"),
    'value'=>function($data){
        if($data->active==1){
            return "Yes";
        }else{return "No";}

    }
], 
           

           [
            'class' => 'yii\grid\ActionColumn',
            'header'=>'Action',
            'headerOptions' => ['width' => '80'],
            'template' => '{update}{delete}{active}',
            'buttons'=>[
            'active'=>function($url,$model,$key){
                $url='index.php?r=admin/joke/active&id='.$model->id;
                if($model->active==2){
                $options = ['class' => 'glyphicon glyphicon-ok'];}
                else{$options=['class'=>'glyphicon glyphicon-remove'];}
                return Html::a('',$url,$options);
            }
            ],
        ], ],
    ]); ?>

    

</div>
