<?php
    include 'lab3_1.php';
    class BritishPerson extends Person {
        function convertBMI() {
            $inches = $this->height / 2.54;
            $pounds = $this->weight * 2.20462;
            $this->height = $inches;
            $this->weight = $pounds;
            return $this->calculateBMI();
        }
    }
?>