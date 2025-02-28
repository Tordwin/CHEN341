<?php
    class Status {

        public $statusId; // INT
        public $status; // STRING

        public function __construct($statusId, $status) {
            $this->statusId = $statusId; // 1 - 3 (1 Unassigned, 2 Assigned, 3 Closed)
            $this->status = $status; // Unassigned, Assigned, Closed
        }

        // Getters //
        public function getStatusId() {
            return $this->statusId; // Returns 1 - 3
        }

        public function getStatus(){
            return $this->status; // Returns Unassigned, Assigned, Closed
        }
    }
?>