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

	public function __construct(){}

	public function __construct(String $type, String $message){
		$this->addNote($type, $message);
	}

	public function addNote(String $type,String $message){
		$type = trim(strtolower($type));
		$message = trim(strtolower($type));
			switch($type){
				case 'error':
					if(isset($this->error)){
						$this->error .= $message . '\n';
					}
					$this->error = $message . '\n';
				break;
				case 'warning':
					if(isset($this->warning)){
						$this->warning .= $message . '\n';
					}
					$this->warning = $message . '\n';
				break;
				case 'info':
					if(isset($this->info)){
						$this->info .= $message . '\n';
					}
					$this->info = $message . '\n';
				break;
				case 'success':
					if(isset($this->success)){
						$this->success .= $message . '\n';
					}
					$this->success = $message . '\n';
				break;
				default:
					throw new Exception('Invalid notification type.');
					//log the error using whatever means you so desire.
					$this->error = 'ERROR: Something happened, and the notification type wasn\'t set correctly. Here is the message: ' . $message . '\n';
			}
	}


/*
use this in the same way as $this->addNote(), except multiple notes can be added via the splat operator.

types and messages must appear in the same order as before. Example:

$notes = new $Notifications();
$notes->addMultipleNotes('success','You are logged in.','warning','you must reset your password');
*/
	public function addMultipleNotes(String ...$args){
		for($i = 0; $i < count($args);$i += 2){
					switch($value){
						case 'error':
							if(isset($this->error)){
								$this->error .= $args[$i + 1] . '\n';
							}
							$this->error = $args[$i + 1] . '\n';
						break;
						case 'warning':
							if(isset($this->warning)){
								$this->warning .= $args[$i + 1] . '\n';
							}
							$this->warning = $args[$i + 1] . '\n';
						break;
						case 'info':
							if(isset($this->info)){
								$this->info .= $args[$i + 1] . '\n';
							}
							$this->info = $args[$i + 1] . '\n';
						break;
						case 'success':
							if(isset($this->success)){
								$this->success .= $args[$i + 1] . '\n';
							}
							$this->success = $args[$i + 1] . '\n';
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
			echo '</div>';
		}
          if (isset($this->success)) {
			echo '<div class="success">
			<span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>';
               echo $this->success;
			$this->success = null;
			echo '</div>';
          } if (isset($this->warning)) {
			echo '<div class="warning">
			<span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>';
               echo $this->warning;
               $this->warning = null;
			echo '</div>';
          } if (isset($this->info)) {
			echo '<div class="info">
			<span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>';
               echo $this->info;
               $this->info = null;
			echo '</div>';
          }
	}
}