<?php

    class AnimalType
    {
        private $type;
        private $id;

        function __construct($type, $id = null)
        {
            $this->type = $type;
            $this->id = $id;
        }

        function getType()
        {
            return $this->type;
        }
        function getId()
        {
            return $this->id;
        }

        function setType($new_type)
        {
            $this->type = $new_type;
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO animal_types (type) VALUES ('{$this->getType()}')");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        static function getAll()
        {
            $returned_animal_types = $GLOBALS['DB']->query("SELECT * FROM animal_types;");
            $animal_types = array();
            foreach($returned_animal_types as $animal_type) {
                $type = $animal_type['type'];
                $id = $animal_type['id'];
                $new_animal_type = new AnimalType($type, $id);
                array_push($animal_types, $new_animal_type);
            }
            return $animal_types;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM animal_types");
        }
    }


 ?>
