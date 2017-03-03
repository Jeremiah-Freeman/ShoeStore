<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Brand.php";
    require_once "src/Brand.php";

    $server = 'mysql:host=localhost:8889;dbname=shoes_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class BrandTest extends PHPUnit_Framework_TestCase
    {
        protected function teardown()
        {
            Brand::deleteAll();
            Store::deleteAll();
        }


        function test_GetName()
        {
            // Arrange
            $name = "Friend";
            $test_brand = new Brand($name);
            // Act
            $result = $test_brand->getBrandName();
            // Assert
            $this->assertEquals($name, $result);
        }

        function test_SetName()
        {
            // Arrange
            $name = "Ally";
            $test_brand = new Brand($name);
            // Act
            $test_brand->setBrandName("Dinter");
            $result = $test_brand->getBrandName();
            // Assert
            $this->assertEquals("Dinter", $result);
        }

    }

?>
