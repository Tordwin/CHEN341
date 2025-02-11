<?php

    class Person {
        public $fName;
        public $lName;
        public $height;
        public $weight;

        public function __construct($fName = "Sam", $lName = "Spade") {
            $this->fName = $fName;
            $this->lName = $lName;
            $this->height = 0;
            $this->weight = 0;
        }

        public function calculateBMI() {
            $BMI = 705 * $this->weight / ($this->height * $this->height);
            return $BMI;
        }
    }
?>
