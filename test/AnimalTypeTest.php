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

        function test_getAll()
        {
            //Arrange
            $type = "cat";
            $type2 = "dog";
            $test_AnimalType = new AnimalType($type);
            $test_AnimalType->save();
            $test_AnimalType2 = new AnimalType($type2);
            $test_AnimalType2->save();

            //Act
            $result = AnimalType::getAll();

            //Assert
            $this->assertEquals([$test_AnimalType, $test_AnimalType2], $result);

        }

        function test_deleteAll()
        {
            //Arrange
            $type = "cat";
            $type2 = "dog";
            $test_AnimalType = new AnimalType($type);
            $test_AnimalType->save();
            $test_AnimalType2 = new AnimalType($type2);
            $test_AnimalType2->save();

            //Act
            AnimalType::deleteAll();
            $result = AnimalType::getAll();

            //Assert
            $this->assertEquals([], $result);

        }

        function test_find()
        {
            //Arrange
            $type = "cat";
            $type2 = "dog";
            $test_AnimalType = new AnimalType($type);
            $test_AnimalType->save();
            $test_AnimalType2 = new AnimalType($type2);
            $test_AnimalType2->save();

            //Act
            $result = AnimalType::find($test_AnimalType->getId());

            //Assert
            $this->assertEquals($test_AnimalType, $result);

        }

        function test_getAnimals()
        {
            //Arrange
            $type = "cat";
            $type2 = "dog";
            $id = null;
            $test_AnimalType = new AnimalType($type, $id);
            $test_AnimalType->save();

            $test_AnimalType_id = $test_AnimalType->getId();

            $name = "Henry";
            $gender = "Male";
            $breed = "Beagle";
            $date_of_admittance = "2015-09-01";
            $test_Animal = new Animal($name, $gender, $breed, $date_of_admittance, $test_AnimalType_id, $id);
            $test_Animal->save();

            $name2 = "Sparky";
            $gender2 = "Female";
            $breed2 = "Pitbull";
            $date_of_admittance2 = "2013-04-01";
            $test_Animal2 = new Animal($name2, $gender2, $breed2, $date_of_admittance2, $test_AnimalType_id, $id);
            $test_Animal2->save();

            //Act
            $result = $test_AnimalType->getAnimals();

            //Assert
            $this->assertEquals([$test_Animal, $test_Animal2], $result);

        }

    }



 ?>
