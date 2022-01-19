<?php
/**
     *      
     *      Definire classe Computer:
     *          ATTRIBUTI:
     *          - codice univoco
     *          - modello
     *          - prezzo
     *          - marca
     * 
     *          METODI:
     *          - costruttore che accetta codice univoco e prezzo
     *          - proprieta' getter/setter per tutte le variabili d'istanza
     *          - printMe: che stampa se stesso (come quella vista a lezione)
     *          - toString: "marca modello: prezzo [codice univoco]"
     * 
     *          ECCEZIONI:
     *          - codice univoco: deve essere composto da esattamente 6 cifre (no altri caratteri)
     *          - marca e modello: devono essere costituiti da stringhe tra i 3 e i 20 caratteri
     *          - prezzo: deve essere un valore intero compreso tra 0 e 2000
     * 
     *      Testare la classe appena definita con tutte le casistiche interessanti per verificare
     *      il corretto funzionamento dell'algoritmo
     * 
     * 
     */

class Computer{

    private $codice;
    private $modello;
    private $prezzo;
    private $marca;

    public function __construct($codice, $prezzo){

        $this -> setCodice($codice);
        $this -> setPrezzo($prezzo);
    }

    public function getCodice(){

        return $this->codice;
    }
    public function setCodice($codice){
    // - codice univoco: deve essere composto da esattamente 6 cifre (no altri caratteri)
        $num_length = (strlen((string)$codice));
        if( !is_int($codice) || $num_length != 6 ){
            throw new Exception("Inserire codice univico di 6 interi");
        }
        $this -> codice = $codice;
    }

    public function getModello(){

        return $this->modello;
    }
    public function setModello($modello){
    // - marca e modello: devono essere costituiti da stringhe tra i 3 e i 20 caratteri
        if( strlen($modello)<3 || strlen($modello)>20 ){
            throw new Exception("Modello computer deve esser compreso tra 3 e 20 caratteri");
        }
        $this -> modello = $modello;
    }

    public function getPrezzo(){

        return $this->prezzo;
    }
    public function setPrezzo($prezzo){
    // - prezzo: deve essere un valore intero compreso tra 0 e 2000
        if( ($prezzo<0) || ($prezzo>2000) ){
            throw new Exception("Prezzo errato!");
        }
        $this -> prezzo = $prezzo;
    }

    public function getMarca(){

        return $this -> marca;
    }
    public function setMarca($marca){
    // - marca e modello: devono essere costituiti da stringhe tra i 3 e i 20 caratteri
        if( strlen($marca)<3 || strlen($marca)>20 ){
            throw new Exception("Marca computer deve esser compreso tra 3 e 20 caratteri");
        }

        $this-> marca = $marca;
    }

    public function printMe(){

        echo $this;
    }

    public function __toString(){

        return $this -> getMarca() . ": " . $this -> getModello() . ": " . $this->getPrezzo() . " [" . $this -> getCodice() . "] <br>";
    }
}

try{
    $p1 = new Computer(123456, 1000);
    $p1 -> setModello('macbook pro');
    $p1 -> setMarca('Apple');
    $p1 -> printMe();
    
}catch (Exeption $e){

    echo $e -> getMessage();
}finally {
    echo "chiusura DB done <br>";
}

?>