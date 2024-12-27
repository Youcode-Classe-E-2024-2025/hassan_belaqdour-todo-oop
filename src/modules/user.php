<?php 

class user{


protected $fullName;
protected $email;
protected $motdepasse;


public function __construct($fullName,$email,$motdepasse){
    $this->fullName = $fullName;
    $this->email = $email;
    $this->motdepasse = $motdepasse;
}


// public function show_data(){
//     $query = $conn->prepare("INSERT INTO users (fullName,email,motdepasse) values (:fullName,:email,:motdepasse)");
//     $query->
// }  


}
?>