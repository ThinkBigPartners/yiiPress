<?php
 
class WpController extends WordPressController
{
    public function actionIndex() {

        $this->layout = false; // note that we disable the layout
        try {
            $this->render('index');
            Yii::app()->end();
        }
        // if we threw an exception in a WordPress functions.php
        // when we find a 404 header, we could use our main Yii
        // error handler to handle the error, log as desired
        // and then throw the exception on up the chain and
        // let Yii handle things from here
 
        // without the above, WordPress becomes our 404 error
        // handler for the entire Yii app
        catch (Exception $e) {
            throw $e;
        }
    }
}