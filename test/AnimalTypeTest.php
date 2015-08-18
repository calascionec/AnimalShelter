<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/AnimalType.php";
    require_once "src/Animal.php";

    $server = 'mysql:host=localhost; dbname=shelter_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class AnimalTypeTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Animal::deleteAll();
            AnimalType::deleteAll();
        }

        function test_save()
        {
            //Arrange
            $type = "cat";
            $id = null;
            $test_AnimalType = new AnimalType($type, $id);
            $test_AnimalType->save();

            //Act
            $result = AnimalType::getAll();

            //Assert
            $this->assertEquals($test_AnimalType, $result[0]);
        }

    }



 ?>
