<?php

class DefaultController extends ApiController {
	public function actionIndex() {
		$this->sendResponse(200, array('current_version' => $this->version));
	}
}