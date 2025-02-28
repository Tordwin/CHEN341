<?php

class User {

    public $id; // INT
    private $username; // STRING
    public $roleId; // CONNECT TO ROLE MODEL (CONNECT THE OBJECT)
    private $password; // STRING (WILL BE ENCRYPTED UTILIZING HASH)

    public function __construct($id, $username, $roleId, $password) { 
        $this->id = $id;
        $this->username = $username;
        $this->roleId = $roleId;
        $this->projectId = "";
        $this->password = $password;
        $this->name = "";
    }

    // Getters //
    public function getId() {
        return $this->id; // Returns Id
    }

    public function getUsername() {
        return $this->username; // Returns Username
    }

    public function getRoleId() {
        return $this->roleId; // Returns RoleId
    }

    public function getProjectId() {
        return $this->projectId; // Returns ProjectId
    }

    public function getPassword() {
        return $this->password; // Returns Password
    }

    public function getName(){
        return $this->name; // Returns Name
    }
}


?>