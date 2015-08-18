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
    }
?>
