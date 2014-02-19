<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class ApiController extends CController
{
	public $arrayRespone = array();
	public $loggedUser = null;
	public $renderType = 'json';
	public $contentType = 'application/json';
	public $version = '1';
	public $requestingUser = null;
	public $userAuthed = false;
	
	public function init() {
		$this->layout=false;
		$this->contentType = 'application/json';
		$this->_checkAuth();
	}

	protected function _checkAuth()
	{
		if (!empty($_REQUEST['user_id']) && !empty($_REQUEST['token'])) {
			$this->requestingUser = KUser::model()->with('userCalendars')->findByPk($_REQUEST['user_id']);
			$this->userAuthed = $this->requestingUser->apiAuth($_REQUEST['token']);
		}
	}
	
	protected function sendResponse($status = 200, $body = '', $message = '')
	{
		//$message = $this->_getStatusCodeMessage($status);
		$status_header = 'HTTP/1.1 ' . $status . ' ' . $this->_getStatusCodeMessage($status);
		header($status_header);
		header('Content-Type: ' . $this->contentType);
		if (empty($message)) {
			$message = $this->_getStatusCodeMessage($status);
		}
		echo $this->_getResponseString($status, $body, $message);
		//Yii:app()->end();
		die();
	}
	
	protected function _getResponseString($status = 200, $content = null, $message = '')
	{
		return json_encode(array('status' => $status, 'message' => $message, 'content' => $content));
	}
	
	/**
	 * 
	 * @desc Get status message for status code
	 * @param unknown_type $status
	 */
	/**
	 * 
		200 Operation successful.
		201 Object created successfully.
		204 Successful, but no content was returned.
		401 Authentication failure: must pass valid credentials with request. Session may have timed out.
		402 The Splunk license in use has disabled this feature.
		403 Insufficient permissions to view/edit/create/disable/delete.
		404 Object does not exist.
		405 Method Not Allowed (e.g. supports GET but not POST)
		409 Request error: this operation is invalid for this item. See response body for explanation.
		500 Internal server error. See response body for explanation.
		503 This feature has been disabled in Splunk configuration files.
	 * Enter description here ...
	 * @param unknown_type $status
	 */
	private function _getStatusCodeMessage ($status = 200) {
		$message = '';
		switch($status)
		{
			case 200:
				$message = 'Operation successful.';
				break;
			case 204:
				$message = 'No content.';
				break;
			case 401:
				$message = 'Not authorized.';
				break;
			case 404:
				$message = 'Not found.';
				break;
			case 409:
				$message = 'This operation is invalid.';
				break;
			case 500:
				$message = 'Internal server error.';
				break;
			case 501:
				$message = 'Method not implemented.';
				break;
			default:
				break;
		}
		return $message;
	}
}
