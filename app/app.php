

<?php

    date_default_timezone_set("America/Los_Angeles");
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Store.php";
    require_once __DIR__."/../src/Brand.php";

    $app = new Silex\Application();

    $server = 'mysql:host=localhost:8889;dbname=shoes';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);
    $app['debug'] = true;

    use Symfony\Component\Debug\Debug;
    Debug::enable();

    $app->register(new Silex\Provider\TwigServiceProvider(),
    array('twig.path' => __DIR__.'/../views'
    ));

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

    $app->get('/', function() use ($app) {
    return $app['twig']->render('index.html.twig', [
        'stores' => Store::getAll(),
        'brands' => Brand::getAll()]);
    });

    $app->post('/stores', function() use ($app) {
        $new_store = new Store($_POST['store_name']);
        $new_store->save();
        return $app['twig']->render('index.html.twig', [
            'stores' => Store::getAll(),
            'brands' => Brand::getAll()]);
    });

    $app->get('/stores/{id}', function($id) use ($app) {
        $view_store = Store::find($id);

        return $app['twig']->render('view_store.html.twig', [
            'stores' => Store::getAll(),
            'unique_brands'=>$view_store->getBrands(),
            'brands' => Brand::getAll(),
            'store' => $view_store]);

    });

    $app->post('/add/brand', function() use ($app) {

        $new_brand = new Brand($_POST['brand_name']);
        $new_brand->saveBrand();
        return $app['twig']->render('index.html.twig', [
            'stores' => Store::getAll(),
            'brands' => Brand::getAll(),
            'new_store' => $new_brand]);
    });

    $app->post('/addstore', function() use ($app) {

        $new_store = Store::find($_POST['store_id']);
        $brand = Brand::find($_POST['brand_id']);
        $brand->addStore($new_store);
        $stores = Store::getAll();
        return $app['twig']->render('view_carriers.html.twig', [
            'stores' => Store::getAll(),
            'brands' => Brand::getAll(),
            'brand' => $brand,
            'all_stores' => $stores,
            'new_connection' => $brand->getStores()]);
    });

    $app->post('/add/brand/store/{id}', function($id) use ($app) {

        $current_store = Store::find($_POST['store_id']);
        $current_brand = Brand::find($_POST['brand_id']);
        $current_store->addBrand($current_brand);
        return $app['twig']->render('view_store.html.twig', [
            'store' => $current_store,
            'all_stores' => Store::getAll(),
            'brands' => Brand::getAll(),
            'unique_brands' => $current_store->getBrands()]);

    });

    $app->get('/brands/{id}', function($id) use ($app) {
        $view_brand = Brand::find($id);
        // $link_to_store->addStore($view_brand);
        $view_brand->getStores();
        $store = [];
        $new_store = [];
        $brand = [];
        $connection = [];
        return $app['twig']->render('view_carriers.html.twig', [
            'stores' => $store,
            'all_stores' => Store::getAll(),
            'brands' => Brand::getAll(),
            'brand' => $view_brand,
            'new_store' => $new_store,
            'new_connection' => $view_brand->getStores()]);
    });

    $app->delete("/deletestore/{id}" , function ($id) use ($app) {
       $current_store = Store::find($id);
       $current_store->delete();
       return $app ['twig']-> render('index.html.twig' , array(
           'stores' => Store::getAll(),
           'new_store' => Brand::getAll()));
   });

   $app->get("/editstore/{id}" , function ($id) use ($app) {
      $current_store = Store::find($id);
      return $app ['twig']-> render('edit_store.html.twig' , array(
          'store' => $current_store));
  });

   $app->get("/editbrand/{id}" , function ($id) use ($app) {
      $current_brand = Brand::find($id);
      return $app ['twig']-> render('edit_brand.html.twig' , array(
          'brand' => $current_brand));

  });

  $app->delete("/deletebrand/{id}" , function ($id) use ($app) {
     $current_brand = Brand::find($id);
     $current_brand->delete();
     return $app ['twig']-> render('edit_brand.html.twig' , array(
         'brand' => Brand::getAll()));
 });


 $app->post("/delete_stores", function() use($app){
     Store::deleteAll();
     return $app['twig']->render('index.html.twig', [
         'stores' => Store::getAll(),
         'brands' => Brand::getAll()]);
 });

 $app->post("/delete_brands", function() use($app){
     Brand::deleteAll();
     return $app['twig']->render('index.html.twig', [
         'brands' => Brand::getAll(),
         'stores' => Store::getAll()]);
 });


 $app->patch("/update/{id}", function($id) use ($app) {
       $name = $_POST['name'];
       $current_store = Store::find($id);
       $current_store->update($name);
       $store = [];
       $new_store = [];
       $view_store = [];
       return $app ['twig'] -> render ('view_store.html.twig' , array(
           'brand' => Brand::getAll(),
           'store' => $current_store,
           'stores' => $store,
           'brand' => $view_brand,
           'new_store' => $new_store));
   });

   $app->patch("/update/{id}", function($id) use ($app) {
       $name = $_POST['name'];
       $current_brand = Brand::find($id);
       $current_brand->update($name);
       $store = [];
       $new_store = [];
       $brand = [];
       $link_to_store = [];
       return $app ['twig'] -> render ('view_carriers.html.twig' , array(
           'store' => Store::getAll(),
           'brand' => $current_brand,
           'stores' => $store,
           'brand' => $view_brand,
           'new_store' => $new_store,
           'link_to_store' => $link_to_store));
   });


    return $app;
?>
