<?php

namespace Bookstore\Domain;

class Book {
    // właściwości / zmianne
    public $isbn;
    public $title;
    public $author;
    public $available;
    
    // MAGIC METHODS
    // __construktor
    // pozwala na zdefinowanie zmiennych w elemencie już na poziomie tworzenia obiektu do klasy
    public function __construct(int $isbn, string $title = "", string $author = "", int $available = 0) {
        $this->isbn = $isbn;
        $this->title = $title;
        $this->author = $author;
        $this->available = $available;
    }
    
    // pozwala na zdefiniowwanie stringa, w jakim ma wyświetlić echo z obiektu w ofmire Stringa
    public function __toString(){
          $result = $this->title . ' by ' . $this->author;
    if(!$this->available){
        $result = 'Not Available';
    }
        return $result;  
    }
    
    // methods / functions
   
    public function getCopy(){
        if($this->available < 1){
           return false; 
        } else {
            $this->available--;
            return true;
        }
    }
}