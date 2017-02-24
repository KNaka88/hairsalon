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
        protected function tearDown()
         {
           Stylist::deleteAll();
         }

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
       function test_getStylistId()
       {
           //Arrange
           $stylist_name = "Monica";
           $stylist_id = 1;
           $test_stylist = new Stylist($stylist_name, $stylist_id);

           //Act
           $result = $test_stylist->getStylistId();

           //Assert
           $this->assertEquals(true, is_numeric($result));
       }



         ////Test 3: test_save
         //Desc: check intance of Stylist saved on hair_salon_test database
         //Input:  "Monica"
         //Output: "Monica"
         function test_save()
          {
              //Arrange
              $stylist_name = "Monica";
              $test_stylist = new Stylist($stylist_name);

              //Act
              $test_stylist->save();

              //Assert
              $result = Stylist::getAll();
              $this->assertEquals($test_stylist, $result[0]);
          }


        ////Test 4: test_getAll
        //Desc: check getAll function work
        //Input:  "Monica", "Tom"
        //Output: "Monica", "Tom"
        function test_getAll()
        {
            // Arrange
            $stylist_name1 = "Monica";
            $stylist_name2 = "Tom";
            $test_stylist1 = new Stylist($stylist_name1);
            $test_stylist1->save();
            $test_stylist2= new Stylist($stylist_name2);
            $test_stylist2->save();

            //Act
            $result = Stylist::getAll();

            //Assert
            $this->assertEquals([$test_stylist1, $test_stylist2], $result);
        }


       ///Test 5: test_deleteAll()    *don't forget tearDown!!
        //Desc: delete all records from stylist table
        //Input:  "Monica", "Tom"
        //Output: ""
        function test_deleteAll()
        {
            // Arrange
            $stylist_name1 = "Monica";
            $stylist_name2 = "Tom";
            $test_stylist1 = new Stylist($stylist_name1);
            $test_stylist1->save();
            $test_stylist2= new Stylist($stylist_name2);
            $test_stylist2->save();

            //Act
            Stylist::deleteAll();
            $result = Stylist::getAll();

            //Assert
            $this->assertEquals([], $result);
        }



        ///Test 6 test_find()
        //desc: find matched indexes by using id
        //Input:  "Monica", "Tom"
        //Output: "Monica (object)"
        function test_find()
        {
            //Arrange
            $stylist_name1 = "Monica";
            $stylist_name2 = "Tom";
            $test_stylist1 = new Stylist($stylist_name1);
            $test_stylist2 = new Stylist($stylist_name2);
            $test_stylist1->save();
            $test_stylist2->save();

            //Act
            $result = Stylist::find($test_stylist1->getStylistId());

            //Assert
            $this->assertEquals($test_stylist1, $result);
        }


        ///Test 7 test_update()
        //desc: update the stylist_name
        //Input:  "Monica", "Tom"
        //Output: "Monica (object)"
        function test_update()
        {
            // Arrange
            $stylist_name = "Monica";
            $new_stylist_name = "Tom";
            $test_stylist = new Stylist($stylist_name);

            // Act
            $test_stylist->update($new_stylist_name);

            // Assert
            $this->assertEquals($new_stylist_name, $test_stylist->getStylistName());
        }
}
