<?php
    class Bug {

        public $projectId; // INT
        public $project; // STRING

        public function __construct($projectId, $project) {
            $this->projectId = $projectId; // Project Id
            $this->project = $project; // Project Name
        }

        // Getters //
        public getProjectId() {
            return $this->projectId; // Returns Project ID
        }
        
        public getProject() {
            return $this->project; // Returns Name of Project
        }
    }
?>