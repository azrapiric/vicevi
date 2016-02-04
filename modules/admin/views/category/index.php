<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Categories');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Category'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            'category',
            ['attribute'=>'active',
                'value'=>function($data){
                    if($data->active==1){
                        return 'Yes';
                    }else{return 'No';}
                }
            ],
            [
            'label' => 'image',
            'format' => 'html',
            'label' => 'Image',
            'value' => function ($model) {
                return Html::img('uploads/'.$model->image,
                    ['width' => '60px']);
            },
        ],

           [
            'class' => 'yii\grid\ActionColumn',
            'header'=>'Action',
            'headerOptions' => ['width' => '80'],
            'template' => '{update}{delete}{active}',
            'buttons'=>[
            'active'=>function($url,$model,$key){
                $url='index.php?r=admin/category/active&id='.$model->id;
                if($model->active==0){
                $options = ['class' => 'glyphicon glyphicon-ok'];}
                else{$options=['class'=>'glyphicon glyphicon-remove'];}
                return Html::a('',$url,$options);
            }
            ],
        ],  ],
    
    ]); ?>

</div>
