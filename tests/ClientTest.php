<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Client.php";

    $server = 'mysql:host=localhost:8889;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class ClientTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
         {
           Client::deleteAll();
         }

        ///Test 1: test_getClientName
        //Desc: check class Client is made and can call name by getClientName()
        //Input: "Monica"
        //Output: "Monica"
        function test_getClientName()
         {
             //Arrange
             $client_name = "Monica";
             $test_client = new Client($client_name);

             //Act
             $result = $test_client->getClientName();

             //Assert
            $this->assertEquals($client_name, $result);
         }

         ////Test 2: test_getClientId
         //Desc: check class Client is made and check getClientId() is numeric or not
         //Input: "Monica", "1"
         //Output: true
         function test_getClientId()
           {
               //Arrange
               $client_name = "Monica";
               $client_id = 1;
               $test_client = new Client($client_name, $client_id);

               //Act
               $result = $test_client->getClientId();

               //Assert
               $this->assertEquals(true, is_numeric($result));
           }


         ////Test 3: test_save
         //Desc: check intance of Client saved on hair_salon_test database
         //Input:  "Monica"
         //Output: "Monica"
         function test_save()
          {
              //Arrange
              $client_name = "Monica";
              $test_client = new Client($client_name);

              //Act
              $test_client->save();

              //Assert
              $result = Client::getAll();
              $this->assertEquals($test_client, $result[0]);
          }


        ////Test 4: test_getAll
        //Desc: check getAll function work
        //Input:  "Monica", "Tom"
        //Output: "Monica", "Tom"
        function test_getAll()
        {
            // Arrange
            $client_name1 = "Monica";
            $client_name2 = "Tom";
            $test_client1 = new Client($client_name1);
            $test_client1->save();
            $test_client2= new Client($client_name2);
            $test_client2->save();

            //Act
            $result = Client::getAll();

            //Assert
            $this->assertEquals([$test_client1, $test_client2], $result);
        }


       ///Test 5: test_deleteAll()    *don't forget tearDown!!
        //Desc: delete all records from client table
        //Input:  "Monica", "Tom"
        //Output: ""
        function test_deleteAll()
        {
            // Arrange
            $client_name1 = "Monica";
            $client_name2 = "Tom";
            $test_client1 = new Client($client_name1);
            $test_client1->save();
            $test_client2= new Client($client_name2);
            $test_client2->save();

            //Act
            Client::deleteAll();
            $result = Client::getAll();

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
            $client_name1 = "Monica";
            $client_name2 = "Tom";
            $test_client1 = new Client($client_name1);
            $test_client2 = new Client($client_name2);
            $test_client1->save();
            $test_client2->save();

            //Act
            $result = Client::find($test_client1->getClientId());

            //Assert
            $this->assertEquals($test_client1, $result);
        }


        ///Test 7 test_update()
        //desc: update the client_name
        //Input:  "Monica", "Tom"
        //Output: "Monica (object)"


        ///Test 8 test_delete()
        //desc: delete client_name from database
        //Input:  "John", "Paul"
        //Output: "Paul"

}
