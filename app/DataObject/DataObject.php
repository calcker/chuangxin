<?php
/*
    $site:   ZhiYeShe.com
    $class:  DataObject.php
    $file:   /lib/Base/DataObject.php
    $author: Feng
    $time: 2015-11-16
*/
namespace App\DataObject;

abstract class DataObject{
    
    protected $data = [];
    
    public function fillData($data){
        
        foreach($data as $name=>$value){
        
            if(array_key_exists($name, $this->data)){
                
                $this->data[$name] = $value;
            
            }
            
        }
       
    }
    
    public function getData(){
        
        return $this->data;
        
    }

    public function __get($name){
        
        if(array_key_exists($name, $this->data)){
            
            return $this->data[$name];
        
        }
        
    }
    
    public function __set($name, $value){
        
        if(array_key_exists($name, $this->data)){
            
            $this->data[$name] = $value;
        
        }

    }
    
    public function __construct($data = null){
        
        if(!is_null($data)){
        
            foreach($data as $name=>$value){
                
                if(array_key_exists($name, $this->data)){
                    
                    $this->data[$name] = $value;
                
                }
            
            }
            
        }
        
    }
    
}



?>