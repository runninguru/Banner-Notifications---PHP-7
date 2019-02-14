<?php
/*
Used to create banner notifications.
*/
class Notification {
 /*
 * Types of notifications:
 * ERROR        something went wrong, and you need to know.
 * SUCCESS      something went right, and I want you to know.
 * WARNING      You're flirting with danger, there.
 * INFO         something happened, and I just feel like you might want to know.
 */
	private $error, $success, $warning, $info = null;
	private $defaultError = 'Error: Something went wrong.';
	private $defaultWarning = 'warning: An issue arose, but we don\'t know what.';
	private $defaultInfo = 'info: Something happened, and we figure you should know.';
	private $defaultSuccess = 'success: something good happened.';
	public function __construct(){}
	// public function __construct(String $type, String $message){
	// 	$this->addNote($type, $message);
	// }
/*
add a single note. multiple notes of the same type will be appended to the same notification box, and will start on a new line. If you don't want to write a message, then just omit the message, and the default will be used.
addNote('success', 'Success: You are now logged in.');
addNote('success'); // will display a default message for the given type.
*/
	public function addNote(String $type,String $message = ''){
		$type = trim(strtolower($type));
		$message = trim(strtolower($message));
		switch($type){
			case 'error':
				//provide a default type of message if there is none.
					if(isset($this->error)){
						$this->error .= '<div class="error"><span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>' . $message . '</div>';
					}else{
						$this->error = '<div class="error"><span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>' . $message . '</div>';
					}
			break;
			case 'warning':
				//provide a default type of message if there is none.
				if(isset($this->warning)){
						$this->warning .= '<div class="warning"><span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>' . $message . '</div>';
				}else{
						$this->warning = '<div class="warning"><span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>' . $message . '</div>';
				}
			break;
			case 'info':
				//provide a default type of message if there is none.
				if(isset($this->info)){
						$this->info .= '<div class="info"><span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>' . $message . '</div>';
				}else{
						$this->info = '<div class="info"><span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>' . $message . '</div>';
				}
			break;
			case 'success':
				//provide a default type of message if there is none.
				if(isset($this->success)){
						$this->success .= '<div class="success"><span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>' . $message . '</div>';
				}else{
						$this->success = '<div class="success"><span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>' . $message . '</div>';
				}
			break;
			default:
				throw new Exception('Invalid notification type.');
				//log the error using whatever means you so desire.
				$this->error = 'ERROR: Something happened, and the notification type wasn\'t set correctly. Here is the message: ' . $message;
		}
	}

	//use this anytime you want to display any notes that MAY have come up.
	public function notify(){
		if (isset($this->error)) {
               echo $this->error;
               $this->error = null;
               unset($this->error);
		}
          if (isset($this->success)) {
               echo $this->success;
			$this->success = null;
			unset($this->success);
          } if (isset($this->warning)) {
               echo $this->warning;
               $this->warning = null;
               unset($this->warning);
          } if (isset($this->info)) {
               echo $this->info;
               $this->info = null;
               unset($this->info);
		}
	}

	public function getDefaultError(){
		return $this->defaultError;
	}
	public function getDefaultWarning(){
		return $this->defaultWarning;
	}
	public function getDefaultInfo(){
		return $this->defaultInfo;
	}
	public function getDefaultSuccess(){
		return $this->defaultSuccess;
	}
	public function setDefaultError(String $message): void{
		$this->defaultError = $message;
	}
	public function setDefaultWarning(String $message): void{
		$this->defaultWarning = $message;
	}
	public function setDefaultInfo(String $message): void{
		$this->defaultInfo = $message;
	}
	public function setDefaultSuccess(String $message): void{
		$this->defaultSuccess = $message;
	}
}
