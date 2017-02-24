<?php

    class Client
    {
        private $client_name;
        private $client_id;

        function __construct ($client_name, $client_id = null)
        {
            $this->client_name = $client_name;
            $this->client_id = $client_id;
        }

        function getClientName()
        {
            return $this->client_name;
        }

        function getClientId()
        {
            return $this->client_id;
        }

        function setClientName($new_client_name)
        {
            $this->client_name = $new_client_name;
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO clients (client_name) VALUES ('{$this->getClientName()}');");

            $this->client_id = $GLOBALS['DB']->lastInsertId();
        }

        static function getAll()
        {
            $returned_clients = $GLOBALS['DB']->query("SELECT * FROM clients;");
            $clients = array();

            foreach($returned_clients as $client){
              $client_name = $client['client_name'];
              $client_id = $client['client_id'];
              $new_client = new Client($client_name, $client_id);
              array_push($clients, $new_client);
            }
            return $clients;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM clients;");
        }

        static function find($search_id)
        {


            }
        }

        function update()
        {

        }

        function delete()
        {

        }
