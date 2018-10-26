<?php

namespace ThisApp\Entities;

class Example
{
  private $id,
          $name,        
          $text_field;
         
          

//SETERS
  
  public function setId($id){
      $this->id = $id;
  }
   public function setName($name){
      $this->institution_name = $institution_name;
  }

   public function setTextField($text_field){
      $this->text_field = $text_field;
  }
  

//GETTERS
  
  public function getId(){
      return $this->id;
  }
   public function getName(){
      return $this->institution_name;
  }

   public function getTextField(){
      return $this->text_field;
  }

   public function inserts(){
    return array(              
      "name"=>$this->name, 
      "text_field"=>$this->text_field
      );
  }

  public function updates(){
    return array(              
      "name"=>$this->name, 
      "text_field"=>$this->text_field
      );
  }

}