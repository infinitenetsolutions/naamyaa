<?php
//email id validation
function emailId($email){

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
return $email;
}
else{
return "";
}
}
//phone number id validation
function phone($phone){
    
    if(preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/", $phone)) {
        return $phone;

      }
      else{
          return "number is not in proper format";
      }
}
//username id validation
function username($username){
    if(preg_match('/^[a-zA-Z0-9]{5,}$/', $username)) { // for english chars + numbers only
        // valid username, alphanumeric & longer than or equals 5 chars
        return trim($username);
    }
    else{
        return "";
    }
}
//name validation
function name($name){
    if( !preg_match('/^[a-z]*$/i', $name)){
        
        return $name;
    }
    else{
        return "please input proper format";
    }
}
function password($password){
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    
    if(!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
      // tell the user something went wrong
      return "please input proper format";
    }
    else{
        return md5($password);

    }
   
}
function simplename($name){


        
        return trim($name);
    
 
}
