<?php
    /* StaffController */
    /* This controller connects to the UserModel and grabs the data that is stored
    from the database in the UserModel and in here it runs the functions to display
    the data, add projects, update sql, etc.. */

    require_once '../model/UserModel.php';
    
    /* ADMIN POWERS */

    //Function that adds a new user (ONLY ADMIN)
    function addUser(){
        //Adds user using sql command
    }//addUser

    //Function that deletes a user (ONLY ADMIN)
    function deleteUser(){
        //Deletes user using sql command
    }//deleteUser

    /*-----------------------------------*/

    /* ADMIN AND MANAGER POWERS */

    //Function that creates/updates projects (ONLY ADMIN AND MANAGERS)
    function createProject($projectName, $projectDescription){
        //Creates project using sql command
    }//createProject

    //Function that assigns users to a project (ONLY ADMIN AND MANAGERS)
    function assignProject($userId, $projectId){
        //Assigns users to project using sql command
    }//assignProject

    //Function that assigns users to a bug (ONLY ADMIN AND MANAGERS)
    function assignBug($userId, $bugId){
        //Assigns users to bug using sql command
    }//assignBug

    /*-----------------------------------*/

    /* ALL USER POWERS */

    //Function that updates project information (ALL USERS)
    function updateProject(){
        //Updates project information using sql command
    }//updateProject

    function updateBug(){
        //Updates bug information using sql command
        //ONLY USER ASSIGNED OR MANAGER OR ADMIN CAN CHANGE BUG 
    }//updateBug
?>