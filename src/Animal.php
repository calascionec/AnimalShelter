<?php
    class Animal
    {
        private $name;
        private $gender;
        private $breed;
        private $date_of_admittance;
        private $animal_type_id;
        private $id;

        function __construct($name, $gender, $breed, $date_of_admittance, $animal_type_id, $id)
        {
            $this->name = $name;
            $this->gender = $gender;
            $this->breed = $breed;
            $this->date_of_admittance = $date_of_admittance;
            $this->animal_type_id = $animal_type_id;
            $this->id = $id;
        }

        function getName()
        {
            return $this->name;
        }
        function getGender()
        {
            return $this->gender;
        }
        function getBreed()
        {
            return $this->breed;
        }
        function getDateOfAdmittance()
        {
            return $this->date_of_admittance;
        }
        function getAnimalTypeId()
        {
            return $this->animal_type_id;
        }
        function getId()
        {
            return $this->id;
        }

        function setName($new_name)
        {
            $this->name = $new_name;
        }
        function setGender($new_gender)
        {
            $this->gender = $new_gender;
        }
        function setBreed($new_breed)
        {
            $this->breed = $new_breed;
        }
        function setDateOfAdmittance($new_doa)
        {
            $this->date_of_admittance = $new_doa;
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO animals (name, gender, breed, date_of_admittance, animal_type_id) VALUES ('{$this->getName()}', '{$this->getGender()}', '{$this->getBreed()}', '{$this->getDateOfAdmittance()}', {$this->getAnimalTypeId()});");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        static function getAll()
        {
            $returned_animals = $GLOBALS['DB']->query("SELECT * FROM animals;");
            $animals = array();
            foreach($returned_animals as $animal) {
                $name = $animal['name'];
                $gender = $animal['gender'];
                $breed = $animal['breed'];
                $date_of_admittance = $animal["date_of_admittance"];
                $animal_type_id = $animal["animal_type_id"];
                $id = $animal['id'];
                $new_animal = new Animal($name, $gender, $breed, $date_of_admittance, $animal_type_id, $id);
                array_push($animals, $new_animal);
            }
            return $animals;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM animals;");
        }
    }
?>
