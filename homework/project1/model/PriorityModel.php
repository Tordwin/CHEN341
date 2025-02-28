<?php
    class Priority {

        public $priorityId; // INT
        public $priority; // STRING

        public function __construct($priorityId, $priority) {
            $this->priorityId = $priorityId; // 1 - 4 (1 being the lowest priority | 4 being the highest priority)
            $this->priority = $priority; // Low, Medium, High, Urgent
        }

        // Getters //
        public function getPriorityId() {
            return $this->priorityId; // Returns 1 - 4
        }

        public function getPriority(){
            return $this->priority; // Returns Low, Medium, High, Urgent
        }
    }
?>