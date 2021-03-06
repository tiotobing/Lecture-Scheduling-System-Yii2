<?php

namespace app\controllers;

use Yii;
use app\models\DosenStaff;
use app\models\DosenStaffSearch;
use app\models\MataKuliah;
use app\models\MataKuliahSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
//use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;

/**
 * DosenStaffController implements the CRUD actions for DosenStaff model.
 */
class DosenStaffController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    // {
    //     return [
    //         'access' => [
    //             'class' => AccessControl::className(),
    //             'rules'=>[
    //          [
    //            'actions'=>[
    //                'index',
    //                'create',
    //                'update',
    //                'delete',
    //                'view'
    //          ],
    //                 'allow'=>true,
    //                  'matchCallback'=>function(){
    //        return (
    //               Yii::$app->user->identity->id_role == 1
    //           );
    //           }
    //         ],
    //      ],
    //  ],
    //
    //  'verbs' => [
    //   'class' => VerbFilter::className(),
    //             'actions' => [
    //             'delete' => ['POST'],
    //             ],
    //         ],
    //     ];
    // }

    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all DosenStaff models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DosenStaffSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DosenStaff model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    /* Untuk Detail Informasi*/

        public function actionDetail($id)
        {
            $dataProviderMk = new ActiveDataProvider([
               'query' => MataKuliah::find()->where(['id_dosen' => $id]),
           ]);

            return $this->render('detail', [
                'model' => $this->findModel($id),
                 'dataProviderMk' => $dataProviderMk,

            ]);
        }


    /**
     * Creates a new DosenStaff model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DosenStaff();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_dosen_staff]);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing DosenStaff model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_dosen_staff]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing DosenStaff model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the DosenStaff model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DosenStaff the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DosenStaff::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
