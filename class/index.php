<?php

require_once("config.php");

include ("Usuario.php");


    //carrega um usuário por ID;
//$root = new Usuario();
//$root->loadById(1);
//echo $root;

//Carrega uma lista de usuários

//$lista = Usuario::getList();

//echo json_encode($lista);

//Carrega uma lista de usuários buscando pelo login

//$search=Usuario::search("da");

//echo json_encode($search);

//Carrega um usuário usando o login e a senha
$usuario= new Usuario();
$usuario->login("davi","1231"   );

echo $usuario;

?>