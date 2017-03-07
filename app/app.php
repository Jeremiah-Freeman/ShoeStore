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
            'brands' => Brand::getAll(),
            'new_store' => $new_store]);
    });

    $app->get('/stores/{id}', function($id) use ($app) {
        $view_store = Store::find($id);
        return $app['twig']->render('view_store.html.twig', [
            'stores' => Store::getAll(),
            'unique_brands' => $view_store->getBrands(),
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

        $new_store = new Store($_POST['store_name']);
        $new_store->save();
        return $app['twig']->render('view_carrier.html.twig', [
            'stores' => Store::getAll(),
            'brands' => Brand::getAll(),
            'new_store' => $new_store]);
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
        $store = [];
        return $app['twig']->render('view_carriers.html.twig', [
            'stores' => $store,
            'all_stores' => Store::getAll(),
            'brands' => Brand::getAll(),
            'brand' => $view_brand]);
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


    return $app;
?>
