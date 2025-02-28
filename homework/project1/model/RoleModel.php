<?php
    class Role {

        public $roleId; // INT
        public $role; // STRING

        public function __construct($roleId, $role) {
            $this->roleId = $roleId; // 1 - 3 (1 Admin, 2 Manager, 3 User)
            $this->role = $role; // Admin, Manager, User
        }

        // Getters //
        public function getRoleId() {
            return $this->roleId; // Returns 1 - 3
        }

        public function getRole(){
            return $this->roleId; // Returns Admin, Manager, or User
        }
    }
?>