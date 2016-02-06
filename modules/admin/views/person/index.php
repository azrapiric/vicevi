<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\PersonSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'People');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="person-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Person'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            'nick',
            'email:email',
            //'password',
            ['attribute'=>'role',
            'value'=>function($data){
                if($data->role==1){
                    return 'Admin';
                }else{return 'User';}
            }],
             ['attribute'=>'active',
             'value'=>function($data){
                if($data->active==1){
                    return "Yes";
                }else{return "No";}
             }],

           [
            'class' => 'yii\grid\ActionColumn',
            'header'=>'Action',
            'headerOptions' => ['width' => '80'],
            'template' => '{update}{delete}{active}',
            'buttons'=>[
            'active'=>function($url,$model,$key){
                $url='index.php?r=admin/person/active&id='.$model->id;
                if($model->active==0){
                $options = ['class' => 'glyphicon glyphicon-ok'];}
                else{$options=['class'=>'glyphicon glyphicon-remove'];}
                return Html::a('',$url,$options);
            }
            ],
        ], ],
        
    ]); ?>

</div>
