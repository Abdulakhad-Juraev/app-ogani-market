<?php

namespace backend\modules\profilemanager\controllers;

use backend\controllers\AccessController;
use backend\modules\profilemanager\models\ChangePasswordForm;
use backend\modules\profilemanager\models\ProfileUser;
use Yii;
use yii\db\Exception;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * Default controller for the `profilemanager` module
 */
class DefaultController extends AccessController
{



    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }


    /**
     * @return string|Response
     * @throws NotFoundHttpException
     * @throws Exception
     */
    public function actionChangeLogin()
    {
        $model = ProfileUser::getUserModel();
        if (!$model){
             throw new NotFoundHttpException(Yii::t('app', 'Page not found'));
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', "Shaxsiy ma'lumotlaringiz muvaffaqiyatli o'zgartirildi!");
            return $this->redirect(['index']);
        }
        return $this->render('update',[
            'model' => $model
        ]);
    }

    public function actionChangePassword()
    {
        $model = new ChangePasswordForm();
        if ($model->load(Yii::$app->request->post()) && $model->savePassword()) {

            Yii::$app->session->setFlash('success', "Parolingiz muvaffaqiyatli o'zgartirildi!");
            return $this->redirect(['index']);

        }
        return $this->render('changePassword' ,['model' => $model]);
    }
}
