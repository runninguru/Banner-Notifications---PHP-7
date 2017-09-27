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

	private static $deafultError = 'Error: Something went wrong.';
	private static $defaultWarning = 'warning: An issue arose, but we don\'t know what.';
	private static $defaultInfo = 'info: Something happened, and we figure you should know.';
	private static $defaultSuccess = 'success: something good happened.';

	public function __construct(){}

	public function __construct(String $type, String $message){
		$this->addNote($type, $message);
	}

/* 
add a single note. multiple notes of the same type will be appended to the same notification box, and will start on a new line. If you don't want to write a message, then just omit the message, and the default will be used.

addNote('success', 'Success: You are now logged in.');
addNote('success'); // will display a default message for the given type.
*/
	public function addNote(String $type,String $message = ''){
		$type = trim(strtolower($type));
		$message = trim(strtolower($type));
		switch($type){
			case 'error':
				//provide a default type of message if there is none.
				if(strlen($message) === 0){
					if(isset($this->error)){
						$this->error .= self::$deafultError . '\n';
					}
					$this->error = self::$deafultError . '\n';
				} else{
					if(isset($this->error)){
						$this->error .= $message . '\n';
					}
					$this->error = $message . '\n';
				}
			break;
			case 'warning':
				//provide a default type of message if there is none.
				if(strlen($message) === 0){
					if(isset($this->warning)){
						$this->warning .= self::$defaultWarning . '\n';
					}
					$this->warning = self::$defaultWarning . '\n';
				} else{
					if(isset($this->warning)){
						$this->warning .= $message . '\n';
					}
					$this->warning = $message . '\n';
				}
			break;
			case 'info':
				//provide a default type of message if there is none.
				if(strlen($message) === 0){
					if(isset($this->info)){
						$this->info .= self::$defaultInfo.'\n';
					}
					$this->info = self::$defaultInfo.'\n';
				} else{
					if(isset($this->info)){
						$this->info .= $message . '\n';
					}
					$this->info = $message . '\n';
				}
			break;
			case 'success':
				//provide a default type of message if there is none.
				if(strlen($message) === 0){
					if(isset($this->success)){
						$this->success .= self::$defaultSuccess . '\n';
					}
					$this->success = self::$defaultSuccess . '\n';
				} else{
					if(isset($this->success)){
						$this->success .= $message . '\n';
					}
					$this->success = $message . '\n';
				}
			break;
			default:
				throw new Exception('Invalid notification type.');
				//log the error using whatever means you so desire.
				$this->error = 'ERROR: Something happened, and the notification type wasn\'t set correctly. Here is the message: ' . $message . '\n';
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
						$this->error .= self::$deafultError . '\n';
					}
					$this->error = self::$deafultError . '\n';
				} else{	//if a message was provided.
					if(isset($this->error)){
						$this->error .= $args[$i + 1] . '\n';
					}
					$this->error = $args[$i + 1] . '\n';
				}
				break;
				case 'warning':

					if(strlen($message) === 0){
					if(isset($this->warning)){
						$this->warning .= self::$defaultWarning . '\n';
					}
					$this->warning = self::$defaultWarning . '\n';
					} else{	//if a message was provided.
						if(isset($this->warning)){
						$this->warning .= $args[$i + 1] . '\n';
						}
						$this->warning = $args[$i + 1] . '\n';
					}
				break;
				case 'info':
					if(strlen($message) === 0){
					if(isset($this->info)){
						$this->info .= self::$defaultInfo . '\n';
					}
					$this->info = self::$defaultInfo . '\n';
				} else{	//if a message was provided.
					if(isset($this->info)){
						$this->info .= $args[$i + 1] . '\n';
					}
					$this->info = $args[$i + 1] . '\n';
				}
				break;
				case 'success':
					
					if(strlen($message) === 0){
					if(isset($this->success)){
						$this->success .= self::$defaultSuccess . '\n';
					}
					$this->success = self::$defaultSuccess . '\n';
					} else{ //if a message was provided.
					if(isset($this->success)){
						$this->success .= $args[$i + 1] . '\n';
					}
					$this->success = $args[$i + 1] . '\n';
					}
				break;
				default:
					throw new Exception('Invalid notification type.');
				//log the error using whatever means you so desire.
				$this->error = 'ERROR: Something happened, and the notification type wasn\'t set correctly. Here is the message: ' . $args[$i + 1] . '\n';
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

	public static getDefaultError(){
		return self::$deafultError;
	}

	public static getDefaultWarning(){
		return self::$defaultWarning;
	}

	public static getDefaultInfo(){
		return self::$defaultInfo;
	}

	public static getDefaultSuccess(){
		return self::$defaultSuccess;
	}

	public static void setDefaultError(String $message){
		self::defaultError = $message;
	}

	public static void setDefaultWarning(String $message){
		self::defaultWarning = $message;
	}

	public static void setDefaultInfo(String $message){
		self::defaultInfo = $message;
	}

	public static void setDefaultSuccess(String $message){
		self::defaultSuccess = $message;
	}
}