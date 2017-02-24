<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Stylist.php";

    $server = 'mysql:host=localhost:8889;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class StylistTest extends PHPUnit_Framework_TestCase
    {
        // protected function tearDown()
        //  {
        //    Stylist::deleteAll();
        //  }

        ///Test 1: test_getStylistName
        //Desc: check class Stylist is made and can call name by getStylistName()
        //Input: "Monica"
        //Output: "Monica"
        function test_getStylistName()
       {
           //Arrange
           $stylist_name = "Monica";
           $test_stylist = new Stylist($stylist_name);

           //Act
           $result = $test_stylist->getStylistName();

           //Assert

           $this->assertEquals($stylist_name, $result);
       }



       ////Test 2: test_getStylistId
       //Desc: check class Stylist is made and check getStylistId() is numeric or not
       //Input: "Monica", "1"
       //Output: true



         ////Test 3: test_save
         //Desc: check intance of Stylist saved on hair_salon_test database
         //Input:  "Monica"
         //Output: "Monica"



        ////Test 4: test_getAll
        //Desc: check getAll function work
        //Input:  "Monica", "Tom"
        //Output: "Monica", "Tom"



       ///Test 5: test_deleteAll()    *don't forget tearDown!!
        //Desc: delete all records from stylist table
        //Input:  "Monica", "Tom"
        //Output: ""



        ///Test 6 test_find()
        //desc: find matched indexes by using id
        //Input:  "Monica", "Tom"
        //Output: "Monica (object)"


        ///Test 7 test_update()
        //desc: update the stylist_name
        //Input:  "Monica", "Tom"
        //Output: "Monica (object)"


        ///Test 8 test_update()
        //desc: update the stylist_name
        //Input:  "Monica", "Tom"
        //Output: "Tom"

}
