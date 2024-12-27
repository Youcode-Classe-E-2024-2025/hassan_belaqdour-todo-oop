<?php
class user{


    private $fullName;
    private $email;
    private $motdepass;


    public function __construct($fullName,$email,$motdepasse){
        $this->fullName = $fullName;
        $this->email = $email;
        $this->motdepass = $motdepasse;

    }
}

?>