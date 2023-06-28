<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

    require_once "../vendor/autoload.php";

    $router = new \Bramus\Router\Router();

    // Campers
    $router->post("/postCampers", function (){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        \App\campers::getInstance()->postCampers(...$_DATA);
    });

    $router->get("/getAllCampers", function (){
       echo json_decode(\App\campers::getInstance()->getAllCampers());
    });

    $router->get("/getCampers/{id}", function ($id){
        echo json_decode(\App\campers::getInstance()->getCampers($id));
     });

    $router->put("/putCampers/{id}", function ($id){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        \App\campers::getInstance()->updateCampers($_DATA, $id);
    });

    $router->delete("/deleteCampers/{id}", function ($id){
        \App\campers::getInstance()->deleteCampers($id);
    });

    

    //Pais
    $router->post("/postPais", function (){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        \App\campers::getInstance()->postPais(...$_DATA);
    });

    $router->get("/getAllPais", function (){
       echo json_decode(\App\campers::getInstance()->getAllPais());
    });



    // Mostrar todo
    $router->get("/getAllMostrarTodo", function (){
       echo json_decode(\App\campers::getInstance()->getAllMostrarTodo());
    });



    // Departamento 
    $router->post("/postDepartamento", function (){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        \App\campers::getInstance()->postDepartamento(...$_DATA);
    });

    $router->get("/getAllDepartamento", function (){
       echo json_decode(\App\campers::getInstance()->getAllDepartamento());
    });



    // Region
    $router->post("/postRegion", function (){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        \App\campers::getInstance()->postRegion(...$_DATA);
    });

    $router->get("/getAllRegion", function (){
       echo json_decode(\App\campers::getInstance()->getAllRegion());
    });



    $router->run();

?>