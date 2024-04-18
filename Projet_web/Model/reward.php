<?php
    class Reward
    {
        private $id_r;
        private $type;
        private $description;
        private $prix_coins;   
    
        function __construct( $id_r ,$type, $description,$prix_coins)
        {
            $this->id_r=$id_r; 
            $this->type=$type; 
            $this->description=$description;  
            $this->prix_coins=$prix_coins;
        }
        public function getId() {
            return $this->id_r;
        }
        public function getType() {
            return $this->type;
        }
        public function getDescription() {
            return $this->description;
        }
        public function getPrixCoins() {
            return $this->prix_coins;
        }
    
    }

?>