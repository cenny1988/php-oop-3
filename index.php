<?php
/**
     * 
     *      Definire classe User:
     *          ATTRIBUTI (private):
     *          - username 
     *          - password
     *          - age
     *          
     *          METODI:
     *          - costruttore che accetta username, e password
     *          - proprieta' getter/setter
     *          - printMe: che stampa se stesso
     *          - toString: "username: age [password]"
     * 
     *          ECCEZIONI:
     *          - scatenare eccezione quando username e' minore di 3 caratteri o maggiore di 16
     *          - scatenare eccezione se password non contiene un carattere speciale (non alpha-numerico)
     *          - scatenare eccezione se age non e' un numero
     * 
     *          NOTE:
     *          - per testare il singolo carattere di una stringa
     * 
     *      Testare la classe appena definita con dati corretti e NON corretti all'interno di un
     *      try-catch e eventualmente informare l'utente del problema
     * 
     */

class User{

    private $username;
    private $password;
    private $age;

    public function __construct($username, $password){

        $this -> setUsername($username);
        $this -> setPassword($password);
    }

    public function getUsername(){

        return $this->username;
    }
    public function setUsername($username){
// - scatenare eccezione quando username e' minore di 3 caratteri o maggiore di 16
        if( ( strlen($username)<3 ) || (strlen($username)>16) ){
            throw new Exception("Lunghezza Username da 3 a 16 caratteri!");
        }
        $this -> username = $username;
    }

    public function getPassword(){

        return $this->password;
    }
    public function setPassword($password){
    //  - scatenare eccezione se password non contiene un carattere speciale (non alpha-numerico)
        $pwsArr = str_split($password);
        if(ctype_alnum($password)){
            throw new Exception("La password deve contenere un carattere speciale");
        }else{
            $this -> password = $password;
        }
    }

    public function getAge(){

        return $this->age;
    }
    public function setAge($age){
        // - scatenare eccezione se age non e' un numero
        if(!is_int($age)){
            throw new Exception("Age deve essere un numero intero");
        }
        $this -> age = $age;
    }

    public function printMe(){

        echo $this;
    }

    public function __toString(){

        return $this -> getUsername() . ": " . $this -> getAge() . " [" . $this -> getPassword() . "] <br>";
    }
}

try{
    $user1 = new User('genny', 'genny123!');
    $user1 -> setAge(33);
    $user1 -> printMe();
    
    $user2 = new User('ironman', '223swww<');
    $user2 -> setAge(23);
    $user2 -> printMe();
    
}catch (Exeption $e){

    echo $e -> getMessage();
}finally {
    echo "chiusura DB done <br>";
}

?>