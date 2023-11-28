<?php
// Connecting to The database
class Users{
	private $DB_SERVER='localhost';
	private $DB_USERNAME='root';
	private $DB_PASSWORD='';
	private $DB_DATABASE='API_website_db';
	private $conn;
    
	public function __construct(){
		$this->conn = new PDO("mysql:host=".$this->DB_SERVER.";dbname=".$this->DB_DATABASE,$this->DB_USERNAME,$this->DB_PASSWORD);
    }

    // Public functions = checking login, creating new user, 
    
    public function check_login($email,$password){

        $sql = "SELECT count(*) FROM Users WHERE Email = :text AND Password = :password"; 
        $q = $this->conn->prepare($sql);
        $q->execute(['text' => $email,'password' => $password ]);
        $number_of_rows = $q->fetchColumn();
        
        if($number_of_rows == 1){
            $_SESSION['login']=true;
            $_SESSION['email']=$email;
            return true;
        }else{
            return false;
        }
    }


    function get_session(){
        if(isset($_SESSION['login']) && $_SESSION['login'] == true){
            return true;
        }else{
            return false;
        }
    }
   
}
