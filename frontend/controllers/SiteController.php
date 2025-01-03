<?php

namespace frontend\controllers;

use backend\models\Category;
use backend\models\Faq;
use common\models\LoginForm;
use common\modules\auth\models\User;
use common\modules\blog\models\Blog;
use common\modules\order\model\Order;
use common\modules\order\model\OrderItem;
use common\modules\product\models\Product;
use Exception;
use frontend\components\Cart;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\captcha\CaptchaAction;
use yii\db\Expression;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\ErrorAction;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => ErrorAction::class,
            ],
            'captcha' => [
                'class' => CaptchaAction::class,
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */

    public function actionIndex()
    {
        $categories = Category::find()
            ->orderBy(['id' => SORT_DESC])
            ->limit(12)
            ->all();

        $recCategories = Category::find()
            ->orderBy(new Expression('rand()'))
            ->limit(8)
            ->all();

        $products = Product::find()
            ->orderBy(['id' => SORT_DESC])
            ->limit(8)
            ->all();

        $blogs = Blog::find()
            ->orderBy(['id' => SORT_DESC])
            ->limit(3)
            ->all();
        return $this->render('index',
            [
                'categories' => $categories,
                'recCategories' => $recCategories,
                'products' => $products,
                'blogs' => $blogs
            ]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        $this->layout = 'blank';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new Faq();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                $model->save();
                Yii::$app->session->setFlash('success', 'Xabar yuborildi');
            } else {
                Yii::$app->session->setFlash('error', 'Xabar yuborilmadi. Ma\'lumotlar toliq emas!!!');
            }
        }

        return $this->render('contact', ['model' => $model,]);
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public
    function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public
    function actionSignup()
    {
        $this->layout = 'blank';
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public
    function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            }

            Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public
    function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @return yii\web\Response
     * @throws BadRequestHttpException
     */
    public
    function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if (($user = $model->verifyEmail()) && Yii::$app->user->login($user)) {
            Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
            return $this->goHome();
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public
    function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }


    public
    function actionShoppingCart()
    {
        return $this->render('pages/shopping-cart');
    }

    public function actionCheckout()
    {
        $products = Cart::products();
        $totalSum = Cart::totalSum();

        $transaction = Yii::$app->db->beginTransaction();

        try {

            $order = new Order();
            $order->user_id = Yii::$app->user->id;
            $order->total_price = $totalSum;
            $order->status = 1;
            $order->order_type = 1;
            $order->payment_type = 0;

            if ($order->save()) {

                foreach ($products as $product) {
                    $orderItem = new OrderItem();
                    $orderItem->order_id = $order->id;
                    $orderItem->product_id = $product->id;
                    $orderItem->count = Cart::productCount($product->id);
                    $orderItem->price = $product->price;
                    $orderItem->total_price = $product->price * Cart::productCount($product->id);

                    if (!$orderItem->save()) {
                        throw new Exception('Order item could not be saved');
                    }
                }

                $transaction->commit();

                return $this->redirect(['/site/thanks']);

            } else {
                throw new Exception('Order could not be saved');
            }
        } catch (Exception $e) {
            $transaction->rollBack();

            Yii::$app->session->setFlash('error', 'There was an error processing your order: ' . $e->getMessage());

            return $this->render('pages/shopping-cart');
        }
    }

    /**
     * @return string
     */
    public function actionThanks()
    {
        return $this->render('pages/thanks');
    }

    public function actionProfile()
    {
        $id = Yii::$app->user->identity->id ?? null;
        if ($id == null) {
            return $this->redirect('/site/login');
        }
        $user = User::findOne($id);
        if (!$user) {
            return $this->redirect('/site/login');
        }

        $contact = $user->userContact;
        $this->layout = 'blank';

        if ($user->load(Yii::$app->request->post()) && $contact->load(Yii::$app->request->post())) {
            if ($user->validate() && $contact->validate()) {
                if ($user->getOldAttribute('email') != $user->email) {
                    $test = new SignupForm();
                    $test->sendEmailUpdate($user);
                    Yii::$app->session->setFlash('success', 'Please check your email to confirm your new address');
                    return $this->redirect(Yii::$app->request->referrer); // Yangi emailni tasdiqlashdan oldin saqlash
                } else {
                    if ($user->save() && $contact->save()) {
                        Yii::$app->session->setFlash('success', 'Profile updated successfully');
                        return $this->redirect(Yii::$app->request->referrer);
                    }
                }

            }
        }


        return $this->render('pages/profile', [
            'user' => $user,
            'contact' => $contact
        ]);
    }
}
