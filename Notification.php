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
		$message .= ' ';
		switch($type){
			case 'error':
				//provide a default type of message if there is none.
				if(strlen($message) === 0){
					if(isset($this->error)){
						$this->error .= $this->defaultError;
					}else{
						$this->error = $this->defaultError;
					}
				} else{
					if(isset($this->error)){
						$this->error .= $message;
					}else {
						$this->error = $message;
					}
				}
			break;
			case 'warning':
				//provide a default type of message if there is none.
				if(strlen($message) === 0){
					if(isset($this->warning)){
						$this->warning .= $this->defaultWarning;
					}else {
						$this->warning = $this->defaultWarning;
					}
				} else{
					if(isset($this->warning)){
						$this->warning .= $message;
					}else {
						$this->warning = $message;
					}
				}
			break;
			case 'info':
				//provide a default type of message if there is none.
				if(strlen($message) === 0){
					if(isset($this->info)){
						$this->info .= $this->defaultInfo;
					}else {
						$this->info = $this->defaultInfo;
					}
				} else{
					if(isset($this->info)){
						$this->info .= $message;
					}else {
						$this->info = $message;
					}
				}
			break;
			case 'success':
				//provide a default type of message if there is none.
				if(strlen($message) === 0){
					if(isset($this->success)){
						$this->success .= $this->defaultSuccess;
					}else {
						$this->success = $this->defaultSuccess;
					}
				} else{
					if(isset($this->success)){
						$this->success .= $message;
					}else {
						$this->success = $message;
					}
				}
			break;
			default:
				throw new Exception('Invalid notification type.');
				//log the error using whatever means you so desire.
				$this->error = 'ERROR: Something happened, and the notification type wasn\'t set correctly. Here is the message: ' . $message;
		}
	}
/*
use this in the same way as $this->addNote(), except multiple notes can be added via the splat operator.
types and messages must appear in the same order as before. Also, if you don't want to use a message, don't omit the message. Use an empty string (a zero-length string) Example:
addMultipleNotes('success','You are logged in.','warning','you must reset your password');
addMultipleNotes('success', '', 'warning', '')
*/
	public function addMultipleNotes(String ...$args){
		for($i = 0; $i < count($args);$i += 2){
			switch($value){
				case 'error':
					if(strlen($message) === 0){
						if(isset($this->error)){
							$this->error .= $this->defaultError;
						}else {
							$this->error = $this->defaultError;
						}
					} else{	//if a message was provided.
						if(isset($this->error)){
							$this->error .= $args[$i + 1];
						}else {
							$this->error = $args[$i + 1];
						}
					}
				break;
				case 'warning':
					if(strlen($message) === 0){
						if(isset($this->warning)){
							$this->warning .= $this->defaultWarning;
						}else {
							$this->warning = $this->defaultWarning;
						}
					} else{	//if a message was provided.
						if(isset($this->warning)){
						$this->warning .= $args[$i + 1];
						}else {
							$this->warning = $args[$i + 1];
						}
					}
				break;
				case 'info':
					if(strlen($message) === 0){
						if(isset($this->info)){
							$this->info .= $this->defaultInfo;
						}else {
							$this->info = $this->defaultInfo;
						}
					} else{	//if a message was provided.
						if(isset($this->info)){
							$this->info .= $args[$i + 1];
						}else {
							$this->info = $args[$i + 1];
						}
					}
				break;
				case 'success':
					if(strlen($message) === 0){
						if(isset($this->success)){
							$this->success .= $this->defaultSuccess;
						}
						$this->success = $this->defaultSuccess;
					} else{ //if a message was provided.
						if(isset($this->success)){
							$this->success .= $args[$i + 1];
						}else {
							$this->success = $args[$i + 1];
						}
					}
				break;
				default:
					throw new Exception('Invalid notification type.');
					//log the error using whatever means you so desire.
					$this->error = 'ERROR: Something happened, and the notification type wasn\'t set correctly. Here is the message: ' . $args[$i + 1];
			}
		}
	}
	//use this anytime you want to display any notes that MAY have come up.
	public function notify(){
		if (isset($this->error)) {
			echo '<div class="error">
			<span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>';
               echo $this->error;
               $this->error = null;
               unset($this->error);
			echo '</div>';
		}
          if (isset($this->success)) {
			echo '<div class="success">
			<span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>';
               echo $this->success;
			$this->success = null;
			unset($this->success);
			echo '</div>';
          } if (isset($this->warning)) {
			echo '<div class="warning">
			<span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>';
               echo $this->warning;
               $this->warning = null;
               unset($this->warning);
			echo '</div>';
          } if (isset($this->info)) {
			echo '<div class="info">
			<span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>';
               echo $this->info;
               $this->info = null;
               unset($this->info);
			echo '</div>';
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
