<?php
    class Bug {
        
        public $bugId; // INT
        public $projectId; // REQUIRE PROJECT MODEL (CONNECT THE OBJECT)
        public $ownerId; // INT
        public $assignedToId; // REQUIRE USER MODE (CONNECT THE OBJECT)
        public $statusId; // REQUIRE STATUS MODEL (CONNECT THE OBJECT)
        public $priorityId; // REQUIRE PRIORITY MODEL (CONNECT THE OBJECT)
        public $summary; // VARCHAR
        public $description; // TEXT
        public $fixDescription; // TEXT
        public $dateRaised; // DATE
        public $targetDate; // DATE
        public $dateClosed; // DATE

        public function __construct($projectId, $ownerId, $statusId, $priorityId, $summary, $description, $dateRaised) {
            $this->bugId = null;
            $this->projectId = $projectId;
            $this->ownerId = $ownerId;
            $this->assignedTo = null;
            $this->statusId = $statusId;
            $this->priorityId = $priorityId;
            $this->summary = $summary;
            $this->description = $description;
            $this->fixDescription = null;
            $this->dateRaised = $dateRaised;
            $this->dateClosed = null;
            $this->targetDate = null;
            // THE ABOVE IS NOT YET THE FULL PRODUCT
        }

        // Getters //
        public function getBugId() {
            return $this->bugId; //Returns Id of the bug
        }//getBugId

        public function getProjectId() {
            return $this->projectId; //Returns Id of the project
        }//getProjectId

        public function getOwnerId() {
            return $this->ownerId; //Returns Id of bug finder
        }//getOwnerId

        public function getAssignedToId() {
            return $this->assignedToId; //Returns Id of the assigned user whho will fix the bug
        }//getAssignedToId

        public function getStatusId() {
            return $this->statusId; //Returns Id of the status of the bug (1 Assigned, 2 Unassigned, 3 Closed)
        }//getStatusId

        public function getPriorityId() {
            return $this->priorityId; //Returns Id of the priority of the bug (1 Low, 2 Medium, 3 High, 4 Urgent)
        }//getPriorityId

        public function getSummary() {
            return $this->summary; //Returns summary of the bug
        }//getSummary

        public function getDescription() {
            return $this->description; //Returns description of the bug
        }//getDescription

        public function getFixDescription() {
            return $this->fixDescription; //Returns description of the fix
        }//getFixDescription

        public function getDateRaised() {
            return $this->dateRaised; //Returns date the bug was raised
        }//getDateRaised

        public function getTargetDate() {
            return $this->targetDate; //Returns date the bug is expected to be fixed
        }//getTargetDate

        public function getDateClosed() {
            return $this->dateClosed; //Returns date the bug was closed
        }//getDateClosed

        // Setters //
        

    }


?>