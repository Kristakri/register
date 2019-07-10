<?php

    include_once 'DataAdapter.php';
    

    class Registration extends DataAdapter {
        

        private $login = NULL;
        private $password = NULL;
        private $password_2 = NULL;
        private $email = NULL;
        private $loginMax = 20;
        private $loginMin = 3;
        private $passwordMin = 6;
        private $passwordMax = 32;
        public $error = "Error";

        public function __construct ($login, $password, $password_2, $email, $mysqli){
            parent::__construct($mysqli);
            $this->login = trim(htmlspecialchars($login));
			$this->email = trim(htmlspecialchars($email));
			$this->password = htmlspecialchars($password);
			$this->password_2 = htmlspecialchars($password_2);
        }

        public function registration()
        {
            if ($this->checkEmail() && $this->checkLogin() && $this->checkLoginBD() && $this->checkPassword()){
                $this->addAccount();
                echo "You have successfully registered!";
            } else {
                echo "<div><p>$this->error</p></div>";
            }
        }

        public function addAccount()
        {
            $sql=$this->mysqli->prepare("INSERT INTO user (name,email,password) VALUES(?,?,?)");
            $sql->bind_param('sss',$this->login,$this->email,$this->password);
            $status=$sql->execute();
            unset($stat);

        }

        public function checkLogin() // Проверка логина
        {
            $notcorrectsymbol = "!@\"#№;$%^:&?*()-_+=//|\\`.,";
            $correctsymbol = "/[0-9a-zA-Zа-яА-Я]/";
            
            if ((strlen($this->login) >= $this->loginMin) && (strlen($this->login) <= $this->loginMax)){

                for ($i = 0; $i < strlen($this->login); $i++) { 
                    for ($j = 0; $j < strlen($notcorrectsymbol); $j++) { 
                        if ($this->login[$i] === $notcorrectsymbol[$j])  {
                            $this->error ='Логин может содержать только буквы и цифры'; 
                            return false;
                        }   
                    }  
                }

            } else {
                $this->error ='Логин должен содержать от 3 до 20 симловов.'; 
                return false;
            }

            return true; // Прошло проверку
        } 

        public function checkLoginBD() //проверка на существование пользавателя с тем же логином
        {
            $sql=$this->mysqli->prepare('SELECT name FROM user');
            $status = $sql->execute();
            
            $result = $sql->get_result();
            $row=$result->fetch_assoc();
            while($row){
                if ($row['name'] === $this->login){
                    $this->error = 'Этот логин уже используется.';
                    return false;
                } else {
                    $row=$result->fetch_assoc();
                } 
            } 
            unset($stat);

            return true;
        }

        public function checkPassword() // Проверка пароля
        {
            if ($this->password === $this->password_2){
                if (strlen($this->password) >= $this->passwordMin && strlen($this->password) <= $this->passwordMax){
                    return true;
                    } else {$this->error = 'Пароль должен содержать от 6 до 32 символов.'; return false;} 
            } else {$this->error = 'Подтвердите пароль'; return false;}   
        }

        public function checkEmail() // Проверка маила
		{
            
            if (filter_var($this->email,FILTER_VALIDATE_EMAIL)) {
                
                return true;
            } else {$this->error = 'Введите действующий адрес электронной почты.'; return false;};
            
		}
    }

?>