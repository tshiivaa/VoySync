<?php
    class Review
    {
        private ?int $id_rev =null ;
        private $description;
        private $rate;
        private $image;
        private $id_m;
    
        public function __construct($description ,$rate ,$image, $id_m)
        {
            $this->id_rev=null;
            $this->description=$description;
            $this->rate=$rate;
            $this->image=$image;
            $this->id_m=$id_m;
           
        }
        public function getIdRev() {
            return $this->id_rev;
        }
        public function getDescription() {
            return $this->description;
        }
        public function getRate(){
            return $this->rate;
        }   
        public function getImage(){
            return $this->image;
        } 
        public function getIdM() {
            return $this->id_m;
        }   
    }
?>