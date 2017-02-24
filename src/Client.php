<?php

    class Client
    {
        private $client_name;
        private $stylist_id;
        private $client_id;

        function __construct ($client_name, $stylist_id, $client_id = null)
        {
            $this->client_name = $client_name;
            $this->stylist_id = $stylist_id;
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

        function getStylistId()
        {
            return $this->stylist_id;
        }

        function setClientName($new_client_name)
        {
            $this->client_name = $new_client_name;
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO clients (client_name, stylist_id) VALUES ('{$this->getClientName()}', {$this->getStylistId()});");

            $this->client_id = $GLOBALS['DB']->lastInsertId();
        }

        static function getAll()
        {
            $returned_clients = $GLOBALS['DB']->query("SELECT * FROM clients;");
            $clients = array();

            foreach($returned_clients as $client){
              $client_name = $client['client_name'];
              $client_id = $client['client_id'];
              $stylist_id = $client['stylist_id'];
              $new_client = new Client($client_name, $stylist_id, $client_id);
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
            $client = $GLOBALS['DB']->query("SELECT * FROM clients WHERE client_id = {$search_id};");
            foreach($client as $client_result){
                $client_name_result = $client_result['client_name'];
                $client_id_result = $client_result['client_id'];
                return new Client($client_name_result, $client_id_result);
            }
        }


        function update($new_client_name)
        {
            $GLOBALS['DB']->exec("UPDATE clients SET client_name = '{$new_client_name}' WHERE client_id = {$this->getClientId()};");
            $this->setClientName($new_client_name);
        }

        function delete()
        {
             $GLOBALS['DB']->exec("DELETE FROM clients WHERE client_id = {$this->getClientId()};");
        }

  }
