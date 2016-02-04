<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Vicevi;
use yii\base\Widget;

class ViceviController extends Controller
{
	public function actionProba(){
		return $this->render('vicevi');

	}


}

?>