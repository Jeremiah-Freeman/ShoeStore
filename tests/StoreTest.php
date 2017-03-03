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

    }



?>
