<?php
    /* BugController */
    /* This controller connects to the BugModel and grabs the data that is stored
    from the database in the BugModel and in here it runs the functions to display
    the data. */

    require_once '../model/BugModel.php';

    //Function that gives description of the bug
    function getDescription($bugId){
        //Returns description of the bug
        //EX: "$bugId: Causes the program to crash."
    }//getDescription

    //Function that gives summary of the bug
    function getSummary($bugId){
        //Returns where it is located and what it does
        //EX: "$bugId: Located in the login page. Supposed to display 'Welcome Home'"
    }//getSummary

    //Function that identifies who found the bug
    function getOwner($bugId){
        //Returns the name of the person who found the bug
        //EX: "$bugId: Found by John Doe"
    }//getOwner

    //Function that displays the date the bug was found
    function getDate($bugId){
        //Returns the date the bug was found
        //EX: "$bugId: Found on 02/28/2025"
    }//getDate

    //Function that displays the project related to the bug
    function getPriority($bugId){
        //Returns the priority of the bug
        // 1. Low | 2. Medium | 3. High | 4. Urgent
        //EX: "$bugId: Priority is High (3)"
    }//getPriority

    //Function that displays target resolution date
    function getTargetDate($bugId){
        //Returns the target resolution date
        //EX: "$bugId: Target resolution date is 03/15/2025"
    }//getTargetDate
    
    //Function that displays actual resolution date
    function getResolutionDate($bugId){
        //Returns the actual resolution date
        //EX: "$bugId: Resolved on 03/10/2025"
    }//getResolutionDate

    //Function that gets fix resolution summary 
    function getFixDescription($bugId){
        //Returns the fix resolution summary
        //EX: "$bugId: Missing semi-colon in line 25"
    }//getFixDescription

    //Function that gets ALL bugs based on inputted projectId
    function getAllBugsByProject($projectId){
        //Returns all bugs related to the project
        //EX: "Project 1: Bug 1, Bug 2, Bug 3"
    }//getAllBugsByProject

    //Function that gets ALL bugs
    function getAllOpenBugs(){
        //Returns all open bugs that have not been resolved
        //EX: "Bug 1, Bug 2, Bug 3"
    }//getAllOpenBugs

    //Function that gets OVERDUE bugs based on inputted projectId
    function getOverdueBugsByProject($projectId){
        //Returns all bugs that have passed the target resolution date
        //EX: "Project 1: Bug 1, Bug 2, Bug 3"
    }//getOverdueBugsByProject

    //Function that gets ALL overdue bugs
    function getAllOverdueBugs(){
        //Returns all bugs that have passed the target resolution date
        //EX: "Bug 1, Bug 2, Bug 3"
    }//getAllOverdueBugs

    //Function that gets ALL UNASSIGNED bugs
    function getAllUnassignedBugs(){
        //Returns all bugs that have not been assigned to a user
        //EX: "Bug 1, Bug 2, Bug 3"
    }//getUnassignedBugs
?>