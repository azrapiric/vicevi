<?php

use yii\helpers\Html;
 


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Joke */

$this->title = Yii::t('app', 'Create Joke');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jokes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="joke-create">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,'categoriesList'=>$categoriesList
    ]) ?>

</div>
