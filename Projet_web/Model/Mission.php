<?php
    class Mission
    {
        private $id_m;
        private $title;
        private $description;
        private $image;
        private $place;
        private $gift_point;
    
        public function __construct( $id_m,$title ,$description ,$image,$place , $gift_point)
        {
            $this->id_m=$id_m;
            $this->title=$title;
            $this->description=$description;
            $this->image=$image; 
            $this->place=$place;
            $this->gift_point=$gift_point;  
           
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
        public function getImage() {
            return $this->image;
        }
        public function getPlace() {
            return $this->place;
        }

    
    }

?>