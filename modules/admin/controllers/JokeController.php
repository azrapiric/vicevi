<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Joke;
use app\modules\admin\models\JokeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\modules\admin\models\Category;
use yii\helpers\VarDumper;
use yii\helpers\ArrayHelper;
use app\modules\admin\models\Comment;
/**
 * JokeController implements the CRUD actions for Joke model.
 */
class JokeController extends Controller
{
    public $layout='admin';
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Joke models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new JokeSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Joke model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {   $comment = new Comment();
      $comments=$this->findComment($id);
        return $this->render('view', [
            'model' => $this->findModel($id),'comment'=>$comment,'comments'=>$comments
        ]);
    }

    /**
     * Creates a new Joke model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */ 
   
    public function actionCreate(){
        $model=new Joke();
        $model->active_from=date('Y-m-d H:i:s');
        if($model->load(Yii::$app->request->post())){
            //print_r(Yii::$app->request->post());
            //die();
            $model->views=0;
            $model->active=1;
            $model->create_date=date('Y-m-d H:i:s');
            $model->category_ids=Yii::$app->request->post('Joke')['category_ids'];

            if($model->save()){
                $model->saveCategories();
                return $this->redirect(['index']);
            }
            }
        
        $categoriesList=$this->getCategories();
        return $this->render('create',['categoriesList'=>$categoriesList,'model'=>$model]);
    }


    public function actionUpdate($id){
        $model = $this->findModel($id);

        if($model->load(Yii::$app->request->post())){
             $model->category_ids=Yii::$app->request->post('Joke')['category_ids'];


              if($model->save()){
                $model->deleteCategories();
                $model->saveCategories();
                return $this->redirect(['index']);
            }

            else{
    
            $categoriesList=$this->getCategories();
            
                return $this->render('update',['model'=>$model,'categoriesList'=>$categoriesList]);
            }

        }
        else{ 

            $model->syncCategories();
            $categoriesList=$this->getCategories();
            
                return $this->render('update',['model'=>$model,'categoriesList'=>$categoriesList]);
            }

    }




    public function actionCreate1()
    {
        $model = new Joke();
        $category=$this->getCategories();
    

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
        $categories=Yii::$app->request->post('Joke')['categories'];
            foreach ($categories as $value) {
                $category = Category::find()->where(['id'=>$value])->one();
    
            $model->link('categories',$category);  //povezem kategoriju i Joke model
            }
            
            return $this->redirect(['index']);
        } else {
            $categories=Yii::$app->request->post('Joke')['categories'];
            /*print_r(ArrayHelper::map($category,'id','category'));
            die();*/
            $model->categories=$categories;//lista cekiranih dodala sam u model novu varijablu
            return $this->render('create', [
                'model' => $model,'category'=>$category
            ]);
        }
    }
    /**
     * Updates an existing Joke model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate1($id)
    {
        //VarDumper::dump($_POST,10,true);
        $model = $this->findModel($id);
        /*$id=Yii::$app->request->get('joke');
        $model=Joke::find()->where(['id'=>$id])->one();*/
        $category=$this->getCategories();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
           // $model->unlinkAll('categories',$category);//izbrise sve veze
             $categories=Yii::$app->request->post('Joke')['categories'];
             if(!empty($categories)){//ako nema nista cekirano ne snimam
                foreach ($categories as $value) {
                    $category = Category::find()->where(['id'=>$value])->one();
    
                    $model->link('categories',$category);  //povezem kategoriju i Joke model
            }}
            return $this->redirect(['index']);
        } else {
             //$categories=Yii::$app->request->post('Joke')['categories'];
            // $model->categories=$categories;//lista cekiranih dodala sam u model novu varijablu
            //VarDumper::dump($model->categories,10,true);
            return $this->render('update', [
                'model' => $model,'category'=>$category,
            ]);
        }
    }

    /**
     * Deletes an existing Joke model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        //$this->findModel($id)->delete();
        $model=$this->findModel($id);
        $model->active=3;
        $model->save(false);
        return $this->redirect(['index']);
    }

    /**
     * Finds the Joke model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Joke the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Joke::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function getCategories(){
        $category=Category::find()->all();
        return $category;
    }

    public function findComment($id)
    {
      if($model=Comment::find()->where(['joke_id'=>$id])->all()){
        return $model;
      }else{
        $model=[];
        return $model;
      }
    }

    public function actionActive($id){
      $model=$this->findModel($id);
      $model->toggleActive();
      $this->redirect(['index']);
    }
}
