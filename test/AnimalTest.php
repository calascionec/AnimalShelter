<?php

     /**
     * @backupGlobals disabled
     * @backupStaticAttributes disabled
     */

     require_once "src/Animal.php";
     require_once "src/AnimalType.php";


     $server = 'mysql:host=localhost;dbname=shelter_test';
     $username = 'root';
     $password = 'root';
     $DB = new PDO($server, $username, $password);

     class AnimalTest extends PHPUnit_Framework_TestCase
     {
         protected function tearDown()
         {
             Animal::deleteAll();
         }

         function test_save()
         {

             //Arrange
             $name = "Henry";
             $gender = "Male";
             $breed = "Beagle";
             $date_of_admittance = "2015-09-01";
             $animal_type_id = 1;
             $id = null;
             $test_Animal = new Animal($name, $gender, $breed, $date_of_admittance, $animal_type_id, $id);

             //Act
             $test_Animal->save();

             //Assert
             $result = Animal::getAll();
             $this->assertEquals($test_Animal, $result[0]);

         }

         function test_getAll()
         {
             //Arrange
             $name = "Henry";
             $gender = "Male";
             $breed = "Beagle";
             $date_of_admittance = "2015-09-01";
             $animal_type_id = 1;
             $id = null;
             $test_Animal = new Animal($name, $gender, $breed, $date_of_admittance, $animal_type_id, $id);
             $test_Animal->save();
             $name2 = "Sparky";
             $gender2 = "Female";
             $breed2 = "Pitbull";
             $date_of_admittance2 = "2013-04-01";
             $animal_type_id2 = 1;
             $id2 = null;
             $test_Animal2 = new Animal($name2, $gender2, $breed2, $date_of_admittance2, $animal_type_id2, $id2);
             $test_Animal2->save();

             //Act
             $result = Animal::getAll();

             //Assert
             $this->assertEquals([$test_Animal, $test_Animal2], $result);
         }

         function test_deleteAll()
         {

             //Arrange
             $name = "Henry";
             $gender = "Male";
             $breed = "Beagle";
             $date_of_admittance = "2015-09-01";
             $animal_type_id = 1;
             $id = null;
             $test_Animal = new Animal($name, $gender, $breed, $date_of_admittance, $animal_type_id, $id);
             $test_Animal->save();

             $name2 = "Sparky";
             $gender2 = "Female";
             $breed2 = "Pitbull";
             $date_of_admittance2 = "2013-04-01";
             $animal_type_id2 = 1;
             $id2 = null;
             $test_Animal2 = new Animal($name2, $gender2, $breed2, $date_of_admittance2, $animal_type_id2, $id2);
             $test_Animal2->save();

             //Act
             Animal::deleteAll();

             //Assert
             $result = Animal::getAll();
             $this->assertEquals([], $result);
         }

         function test_getId()
         {
             //Arrange
             $name = "Henry";
             $gender = "Male";
             $breed = "Beagle";
             $date_of_admittance = "2015-09-01";
             $animal_type_id = 1;
             $id = null;
             $test_Animal = new Animal($name, $gender, $breed, $date_of_admittance, $animal_type_id, $id);
             $test_Animal->save();

             //Act
             $result = $test_Animal->getId();

             //Assert
             $this->assertEquals(true, is_numeric($result));
         }
     }





 ?>
