<?php
    class Reward
    {
        private ?int $id_r =null;
        private $title;  
        private $type;
        private $image;
        private $description;
        private $place;
        private $prix_coins;   
    
        function __construct($title, $type,$image, $description,$place,$prix_coins)
        {
            $this->id_r=null;
            $this->title=$title;
            $this->type=$type; 
            $this->image=$image;
            $this->description=$description;
            $this->place=$place;
            $this->prix_coins=$prix_coins;
        }
        public function getIdR() {
            return $this->id_r;
        }
        public function getTitle() {
            return $this->title;
        }
        public function getType() {
            return $this->type;
        }
        public function getImage() {
            return $this->image;
        }
        public function getDescription() {
            return $this->description;
        }
        public function getPlace() {
            return $this->place;
        }   
        public function getPrixCoins() {
            return $this->prix_coins;
        }
    
    }

?>