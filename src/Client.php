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

        }

        function getAll()
        {

        }

        function deleteAll()
        {

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
    }
