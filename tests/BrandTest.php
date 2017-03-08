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

        function testBrandId()
        {
            //Arrange
            $id = 1;
            $name = "Jettter";
            $test_store = new Brand($name, $id);
            //Act
            $result = $test_store->getBrandId();
            //Assert
            $this->assertEquals(1, $result);
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

        function testSave()
        {
            //Arrange
            $name = "Frog";
            $id = 1;
            $test_brand = new Brand($name, $id);
            $test_brand->saveBrand();
            //Act
            $result = Brand::getAll();
            //Assert
            $this->assertEquals($test_brand, $result[0]);
        }

        function testGetAll()
        {
            //Arrange
            $name = "Gofer";
            $id = 1;
            $test_brand = new Brand($name, $id);
            $test_brand->saveBrand();

            $name2 = "Fady";
            $id2 = 2;
            $test_brand2 = new Brand($name2, $id2);
            $test_brand2->saveBrand();
            //Act
            $result = Brand::getAll();
            //Assert
            $this->assertEquals([$test_brand, $test_brand2], $result);
        }

        function testFind()
        {
            //Arrange
            $name = "Traders";
            $id = 1;
            $test_brand = new Brand($name, $id);
            $test_brand->saveBrand();
            $name2 = "NastyGirls Inc";
            $id2 = 2;
            $test_brand2 = new Brand($name2, $id2);
            $test_brand2->saveBrand();

            //Act
            $result = Brand::find($test_brand->getBrandId());
            //Assert
            $this->assertEquals($test_brand, $result);
        }

        function testDeleteAll()
        {
            //Arrange
            $name = "Ninja";
            $id = 1;
            $test_brand = new Brand($name, $id);
            $test_brand->saveBrand();

            $name2 = "Santo";
            $id2 = 2;
            $test_brand2 = new Brand($name2, $id2);
            $test_brand2->saveBrand();
            //Act
            Brand::deleteAllBrands();
            //Assert
            $result = Brand::getAll();
            $this->assertEquals([], $result);
        }

    }

?>
