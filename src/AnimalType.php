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

        static function find($search_id)
        {
            $found_animal_type = null;
            $animal_types = AnimalType::getAll();
            foreach($animal_types as $animal_type) {
                $animal_type_id = $animal_type->getId();
                if($animal_type_id == $search_id) {
                    $found_animal_type = $animal_type;
                }
            }
            return $found_animal_type;
        }

        function getAnimals()
        {
            $animals = array();
            $returned_animals = $GLOBALS['DB']->query("SELECT * FROM animals WHERE animal_type_id = {$this->getId()};");
            foreach($returned_animals as $animal) {
                $name = $animal['name'];
                $gender = $animal['gender'];
                $breed = $animal['breed'];
                $date_of_admittance = $animal['date_of_admittance'];
                $animal_type_id = $animal['animal_type_id'];
                $id = $animal['id'];
                $new_animal = new Animal($name, $gender, $breed, $date_of_admittance, $animal_type_id, $id);
                array_push($animals, $new_animal);
            }
            return $animals;
        }
    }


 ?>
