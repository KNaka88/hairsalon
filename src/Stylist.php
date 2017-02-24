<?php

    class Stylist
    {
        private $stylist_name;
        private $stylist_id;

        function __construct ($stylist_name, $stylist_id = null)
        {
            $this->stylist_name = $stylist_name;
            $this->stylist_id = $stylist_id;
        }

        function getStylistName()
        {
            return $this->stylist_name;
        }

        function getStylistId()
        {
            return $this->stylist_id;
        }

        function setStylistName($new_stylist_name)
        {
            $this->stylist_name = $new_stylist_name;
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO stylists(stylist_name) VALUES ('{$this->getStylistName()}');");

            $this->stylist_id = $GLOBALS['DB']->lastInsertId();
        }

        static function getAll()
        {
            $returned_stylists = $GLOBALS['DB']->query("SELECT * FROM stylists;");
            $stylists = array();

            foreach($returned_stylists as $stylist){
              $stylist_name = $stylist['stylist_name'];
              $stylist_id = $stylist['stylist_id'];
              $new_stylist = new Stylist($stylist_name, $stylist_id);
              array_push($stylists, $new_stylist);
            }
            return $stylists;
        }

        function deleteAll()
        {

        }

        static function find($search_id)
        {


        }

        function update()
        {

        }

        function delete()
        {

        }
    }
