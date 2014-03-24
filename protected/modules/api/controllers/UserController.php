<?php

class UserController extends ApiController {
	public function actionIndex() {
		
	}

	public function actionView() {
		
	}

	public function actionSignup() {
		$data = json_decode(file_get_contents('php://input'), true);

		if (!$data || !isset($data['email']) || !isset($data['password'])) {
			$this->sendResponse(400);
		}

		$user = TBUser::model()->find('email = :email', array(':email' => $data['email']));
		if ($user) {
			$this->sendResponse(400, "User Exists.");
		}
		else {

			$user = new User();
	        
	        $user->attributes = $data;
	        $user->password = TBUser::generateHash( $user->password );
	        $user->createdAt = date( 'Y-m-d H:i:s' );
	        if( $user->validate() ) {
	            $user->save();
	        }
	        
	        $this->sendResponse(201, $user->getAPIAttributes());

	    }
	}

	public function actionLogin() {
		$data = json_decode(file_get_contents('php://input'), true);

		if (!$data || !$data['email'] || !$data['password']) {
			$this->sendResponse(400);
		}

		$user = TBUser::model()->find('email = :email', array(':email' => $data['email']));
		if (!$user) {
			$this->sendResponse(400, TBUser::ERROR_USERNAME_INVALID);
		}
		else if (!$user->authenticate($data['password'])) {
			$this->sendResponse(400, $user->authError);
		}
		else {
			$this->sendResponse(200, $user->getAPIAttributes());
		}
	}

	public function actionUpdate() {

	}

	public function actionDestroy() {

	}
}