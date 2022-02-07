<?php
session_start();

class user{
    //délaration propriété
    public $bdd;
    public $id;
    public $login;
    protected $password;
    public $email;
    public $firstname;
    public $lastname;
    //déclaration des méthodes
    public function __construct(){
    $this->bdd = mysqli_connect ('localhost' , 'root' , '' , 'classes');
    echo 'connected_db';
    return $this->bdd;
    exit;
}

public function register($login, $password,$email, $firstname, $lastname){
   
    $this->login = $login;
    $this->password = $password;
    $this->email = $email;
    $this->firstname = $firstname;
    $this->lastname = $lastname;
    $query = mysqli_query($this->bdd,"SELECT * FROM utilisateurs WHERE login='$this->login'");
       $resultat = mysqli_fetch_all($query);
       $bdd = "INSERT INTO `utilisateurs`(`login`, `password`, `email`, `firstname`, `lastname`) VALUES ('$login','$password','$email','$firstname','$lastname')";
       $requete = mysqli_query($this->bdd,$bdd);
    $_SESSION['User'] = TRUE;
    $_SESSION['login'] = $login;
    exit;
}

public function connect($login, $password){
    $this->login = $login;
    $this->password = $password;
    $query = mysqli_query($this->bdd, "SELECT * FROM utilisateurs WHERE login = '$this->login'");
    $resultat = $query->fetch_array(MYSQLI_ASSOC);
    $_SESSION['user'] = $resultat;
    echo 'connected';
    exit;
}



public function isConnected(){
    $this->login = $_SESSION['user'];
        if(isset($_SESSION['user'])){
        echo 'connected_r';
}       
        else{
        echo 'not connected_r';
        exit;
}
        //var_dump($_SESSION['user']);
}

public function getAllInfos(){
    $id = $_SESSION['user']['id'];
    $request = mysqli_query($this->db, "SELECT * FROM utilisateurs WHERE id = '$id'");
    $result = mysqli_fetch_array($request);
    echo $result['id'] .'<br/>';
    echo $result['login'] .'<br/>';
    echo $result['password'] .'<br/>';
    echo $result['email'] .'<br/>';
    echo $result['firstname'] .'<br/>';
    echo $result['lastname'] .'<br/>';
    exit;
}

public function getLogin(){
    $id = $_SESSION['user']['id'];
    $request = mysqli_query($this->db, "SELECT login FROM utilisateurs WHERE id = '$id'");
    $result = mysqli_fetch_array($request);
    echo $result['id'] . '<br/>';
    exit;
}

public function getEmail(){
    $id = $_SESSION['user']['id'];
    $request = mysqli_query($this->db, "SELECT email FROM utilisateurs WHERE id = '$id'");
    $result = mysqli_fetch_array($request);
    echo $result['email'] . '<br/>';
    exit;
}

public function getFirstname(){
    $id = $_SESSION['user']['id'];
    $request = mysqli_query($this->db, "SELECT firstname FROM utilisateurs WHERE id = '$id'");
    $result = mysqli_fetch_array($request);
    echo $result['firstname'] . '<br/>';
    exit;
}

public function getLastname(){
    $id = $_SESSION['user']['id'];
    $request = mysqli_query($this->db, "SELECT lastname FROM utilisateurs WHERE id = '$id'");
    $result = mysqli_fetch_array($request);
    echo $result['lastname'] . '<br/>';
    exit;
 }
} 

