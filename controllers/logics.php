<?php

    	class db_class{
			public $host = 'localhost';
			public $user = 'root';
			public $pass = '';
			public $dbname ='flashion';
			public $conn;
			public $error;
		
			public function __construct(){
				$this->connect();
			}
	
			function connect(){
				
				$this->conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
				if(!$this->conn){
					$this->error = "Fatal Error: Can't connect to database". $this->conn->connect_error;
					return false;
				}
				return $this->conn;

			}
		}	
		//register class
		class register extends db_class{
			function __construct(){
				$this->conn = db_class::connect();
			}
			public function user_exists($email){
				$user_exist_query =  "SELECT `email` FROM `register` where `email` = '$email'" ;
				$run_query = $this->conn->query($user_exist_query);
				if($run_query->num_rows > 0){
					return true;
					return $run_query;
				}else{
					return false;
				}
			}
			public function check_email_password($email,$password){
				$check_email_password_query = "SELECT * from `register` where `email` = '$email' and `password` = '$password'"; 
				$run_query = $this->conn->query($check_email_password_query);
				
				if($run_query->num_rows == 1 ){
					if($row = $run_query->fetch_assoc()){
						$_SESSION['email'] = $row['email'];
						$_SESSION['fname'] = $row['fname'];
						$_SESSION['lname'] = $row['lname'];
						
					}
					return true;
					
				}else{
					return false;
				}
			}
			public function insert_user($fname,$lname,$email,$username,$password,$cpassword){
				$insert_query = 
					"INSERT INTO `register`(`fname`, `lname`, `email`, `username`, `password`, `cpassword`) 
						VALUES ('$fname', '$lname' , '$email' , '$username' , md5('$password'), md5('$cpassword'))";
				
				if(!$this->user_exists($email)){
					$run_query = $this->conn->query($insert_query);
					if($run_query){
						return true;
					}else{
						return false;
					}
				}else{
					return false;
				}
				
			}
			public function password_match($password,$cpassword){
				if($password == $cpassword){
					return true;
				}else{
					return false;
				}
			}
			public function password_length($password,$cpassword){
				$pass_length = strlen($password);
				$cpass_length = strlen($cpassword);
				if($pass_length >= 8 && $cpass_length >= 8 ){
					return true;
				}else{
					return false;
				}
			}
			public function clean($value){
				$html = htmlspecialchars($value);
				$trim = trim($html);
				$slash = stripslashes($trim);

				$final_clean = $slash;
				return $final_clean;
			}
		}
		//change_password 
		class change_password extends db_class {
			function __construct(){
				$this->conn = db_class::connect();
			}
			
			public function create_passcode(){
				$passcode = rand(4,1000000);
				return $passcode;
			}
			public function user_exists($email){
				$user_exist_query =  "SELECT `email` FROM `register` where `email` = '$email'" ;
				$run_query = $this->conn->query($user_exist_query);
				if($run_query->num_rows > 0){
					return true;
					return $run_query;
				}else{
					return false;
				}
			}
			public function pass_code_exists($email,$passcode){
				$user_exist_query =  "SELECT `pass_code` FROM `register` where `email` = '$email'" ;
				$run_query = $this->conn->query($user_exist_query);
				if($run_query->num_rows > 0){
					if($row = $run_query->fetch_assoc()){
						if($row['pass_code'] == $passcode){
								return true;
						}else{
							return false;
						}
					}
				}else{
					return false;
				}
			}
			public function update_passcode_db($email){
				$passcode = $this->create_passcode();
				$query = "UPDATE `register` SET `pass_code`='$passcode' WHERE `email` = '$email'";
				
				if($this->user_exists($email)){
					$run_query = $this->conn->query($query);
					if($run_query){
						return true;
					}else{
						return false;
					}
				}else{
					return false;
				}
				
			}
			public function get_passcode_db($email){
				$query = "SELECT `pass_code` FROM `register` where `email` = '$email' ";
				if($this->user_exists($email)){
					$run_query = $this->conn->query($query);
					$row = $run_query->fetch_assoc();
					return $row['pass_code'];
				}else{
					return false;
				}
				
			}
			public function email_passcode($email){
				$link = "http://localhost/nonso/cpass.php";
				$to = $email;
				$subject = 'Change Your Password';
				$message = 'Your Passcode is ' . $passcode . "<br>"
							. " This is the link to change your password - " . $link . "<br><br><br><br><br>"
							. "If you did not ask for a reset of password please ignore this message ";
				$headers = "From: Flashion.com";
				if (mail($to, $subject, $message, $headers)) {
					return true;
				} else {
					return false;
				}

			}
			public function update_password_db($email,$newpassword){
				
				$query = "UPDATE `register` SET `password`= md5('$newpassword'), `cpassword`= md5('$newpassword') WHERE `email` = '$email'";
				
				if($this->user_exists($email)){
					$run_query = $this->conn->query($query);
					if($run_query){
						return true;
					}else{
						return false;
					}
				}else{
					return false;
				}
				
			}
			public function new_password_length($password){
				$pass_length = strlen($password);
				
				if($pass_length >= 8 ){
					return true;
				}else{
					return false;
				}
			}
		}
		//catalog class
		class catalog extends db_class{

			function __construct(){
				$this->conn = $this->connect();
			}
			public function get_all(){
				$item_query = "SELECT `id`, `name`, `image_name`, `description`, `price`, `status`, `date` FROM `catalog`";
				$run_query =$this->conn->query($item_query);

				return $run_query;

			}
			public function get_one($name){
				$item_query = "SELECT `id`, `name`, `image_name`, `description`, `price`, `status`, `date` FROM `catalog` WHERE `name` = '$name'";
				$run_query =$this->conn->query($item_query);

				return $run_query;
			}
		}
		class add_to_cart extends db_class{ 

			function __construct(){
				$this->conn = $this->connect();
			}
			public function get_items_from_session($name){
				$query = "SELECT `id`, `name`, `image_name`, `description`, `price`, `status`, `date` FROM `catalog` WHERE `name` = '$name'";
				$run_query = $this->conn->query($query);
				return $run_query;
			}
		}
		
?>
