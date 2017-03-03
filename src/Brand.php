<?php
    class Brand
        {
            private $name;
            private $id;

            function __construct($name, $id = null)
            {
                $this->name = $name;
                $this->id = $id;
            }
            function getBrandName()
            {
                return $this->name;
            }

            function setBrandName($new_name)
            {
                $this->name = (string) $new_name;
            }
            function getBrandId()
            {
                return $this->id;
            }

            function delete()
            {
                $GLOBALS['DB']->exec("DELETE FROM brands WHERE id = {$this->getId()};");
                $GLOBALS['DB']->exec("DELETE FROM stores_brands WHERE brand_id = {$this->getId()};");
            }

            static function deleteAll()
            {
                $GLOBALS['DB']->exec("DELETE FROM brands;");
            }

            function save()
            {
                $GLOBALS['DB']->exec("INSERT INTO brands (name) VALUES ('{$this->getBrandName()}');");
                $this->id = $GLOBALS['DB']->lastInsertId();
            }

            function getStores()
            {
                $returned_stores = $GLOBALS['DB']->query("SELECT stores.* FROM brands JOIN stores_brands ON (stores_brands.brand_id = brands.id)
                JOIN stores ON (stores.id = stores_brands.store_id)
                WHERE brands.id = {$this->getBrandId()};");
                $stores = [];

                foreach($returned_stores as $store) {
                    $name = $store['name'];
                    $id = $store['id'];
                    $new_store = new Store($name,$id);
                    array_push($stores,$new_store);
                }
                return $stores;
            }
       }


?>
