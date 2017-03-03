<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Store.php";

    $server = 'mysql:host=localhost:8889;dbname=shoes_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class StoreTest extends PHPUnit_Framework_TestCase
    {
        protected function teardown()
      {
          Store::deleteAll();
      }


        function test_GetName()
        {
            // Arrange
            $name = "Nike";
            $test_store = new Store($name);
            // Act
            $result = $test_store->getName();
            // Assert
            $this->assertEquals($name, $result);
        }

        function test_SetName()
        {
            // Arrange
            $name = "Adidas";
            $test_store = new Store($name);
            // Act
            $test_store->setName("Puma");
            $result = $test_store->getName();
            // Assert
            $this->assertEquals("Puma", $result);
        }

        function testGetId()
        {
            //Arrange
            $id = 1;
            $name = "Nike";
            $test_store = new Store($name, $id);
            //Act
            $result = $test_store->getId();
            //Assert
            $this->assertEquals(1, $result);
        }
        function testSave()
        {
            //Arrange
            $name = "Yellow Inc";
            $id = 1;
            $test_store = new Store($name, $id);
            $test_store->save();
            //Act
            $result = Store::getAll();
            //Assert
            $this->assertEquals($test_store, $result[0]);
        }

        function testGetAll()
        {
            //Arrange
            $name = "NIKE";
            $id = 1;
            $test_store = new Store($name, $id);
            $test_store->save();

            $name2 = "Lago";
            $id2 = 2;
            $test_store2 = new Store($name2, $id2);
            $test_store2->save();
            //Act
            $result = Store::getAll();
            //Assert
            $this->assertEquals([$test_store, $test_store2], $result);
        }

        function testDeleteAll()
        {
            //Arrange
            $name = "NIKE";
            $id = 1;
            $test_store = new Store($name, $id);
            $test_store->save();

            $name2 = "Lago";
            $id2 = 2;
            $test_store2 = new Store($name2, $id2);
            $test_store2->save();
            //Act
            Store::deleteAll();
            //Assert
            $result = Store::getAll();
            $this->assertEquals([], $result);
        }

        function testUpdate()
        {
            //Arrange
            $name = "NIKE";
            $id = 1;
            $test_store = new Store($name, $id);
            $test_store->save();

            $new_name = "NikeFarms";
            //Act
            $test_store->update($new_name);
            //Assert
            $this->assertEquals("NikeFarms",$test_store->getName());
        }



    }



?>
