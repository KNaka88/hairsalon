<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Client.php";
    require_once __DIR__."/../src/Stylist.php";

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

    $server = 'mysql:host=localhost:8889;dbname=hair_salon';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);
    $app = new Silex\Application();
    $app->register(
       new Silex\Provider\TwigServiceProvider(),
       array('twig.path' => __DIR__.'/../views')
    );

    $app['debug'] = true;
    $app->get("/", function() use ($app){
        return $app['twig']->render('index.html.twig', array("stylists" => Stylist::getAll()));
    });

    $app->post("/add-stylist", function() use ($app) {
        $new_stylist = new Stylist($_POST['stylist_name']);
        $new_stylist->save();
        return $app['twig']->render('index.html.twig', array("stylists" => Stylist::getAll()));
    });


    $app->get("/stylist/{stylist}-{id}", function($stylist, $id) use ($app) {
        $stylist = Stylist::find($id);
        return $app['twig']->render('stylist.html.twig', array('stylist' => $stylist, 'clients' => $stylist->getClients()));
    });

    return $app;
