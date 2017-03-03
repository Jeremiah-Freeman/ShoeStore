<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Store.php";
    require_once "src/Brand.php";

    $server = 'mysql:host=localhost:8889;dbname=shoes_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class StoreTest extends PHPUnit_Framework_TestCase
    {
        protected function teardown()
      {
          Store::deleteAll();
          Brand::deleteAll();
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

        function testDelete()
       {
           //Arrange
           $name = "NIKE";
           $id = 1;
           $test_store = new Store($name, $id);
           $test_store->save();

           $name1 = "Fredreix";
           $id2 = 2;
           $test_brand = new Brand($name1, $id2);
           $test_brand->saveBrand();

           //Act
           $test_store->addBrand($test_brand);
           $test_store->delete();

           //Assert
           $this->assertEquals([], $test_brand->getStores());
       }
       function testFind()
       {
           //Arrange
           $name = "NIKE";
           $id = 1;
           $test_store = new Store($name, $id);
           $test_store->save();
           $name2 = "DANNERS";
           $id2 = 2;
           $test_store2 = new Store($name2, $id2);
           $test_store2->save();

           //Act
           $result = Store::find($test_store->getId());
           //Assert
           $this->assertEquals($test_store, $result);
       }

       function testAddBrand()
       {
           //Arrange
           $name = "NIKE";
           $id = 1;
           $teststore = new Store($name, $id);
           $teststore->save();

           $name2 = "Yelps";
           $id2 = 2;
           $newBrand = new Brand($name2, $id2);
           $newBrand->saveBrand();
           // Act
           $teststore->addBrand($newBrand);
           // Assert
           $this->assertEquals($teststore->getBrands(), [$newBrand]);
       }




    }



?>
