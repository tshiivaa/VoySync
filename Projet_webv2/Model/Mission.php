<?php
    class Mission
    {
        private ?int $id_m =null ;
        private $title;
        private $description;
        private $imageM;
        private $place;
        private $gift_point;
        private $imageUS;
        private $rate;
        private $id_r;
    
        public function __construct($title ,$description ,$imageM,$place , $gift_point, $imageUS , $rate , $id_r)
        {
            $this->id_m=null;
            $this->title=$title;
            $this->description=$description;
            $this->imageM=$imageM; 
            $this->place=$place;
            $this->gift_point=$gift_point; 
            $this->imageUS=$imageUS; 
            $this->rate=$rate;
            $this->id_r=$id_r;
           
        }
        public function getIdM() {
            return $this->id_m;
        }
        public function getGiftPoint() {
            return $this->gift_point;
        }
        public function getTitle() {
            return $this->title;
        }
        public function getDescription() {
            return $this->description;
        }
        public function getImageM() {
            return $this->imageM;
        }
        public function getPlace() {
            return $this->place;
        }
        public function getImageUS() {
            return $this->imageUS;
        }
        public function getRate(){
            return $this->rate;
        }   
        public function getIdR() {
            return $this->id_r;
        }   
    }
?>