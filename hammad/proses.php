<?php
class Data {
    public $firstname;
    public $lastname;
    public $phone;
    public $address;

    function __construct($firstname, $lastname, $phone, $address){
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->phone = $phone;
        $this->address = $address;
    }

    function tampil(){
        return "
        <p>Hi, my name is <b>$this->firstname $this->lastname</b></p>
        <p>Phone Number : $this->phone</p>
        <p>Address : $this->address</p>
        <a href='index.php'>Reset</a>
        ";
    }
}
?>