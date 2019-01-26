

<?php

/**************************************/
/********CRUD BASICO COM PDO**************/
/*****************************************
- Uma classe SQL com o PDO na pasta Class, as funções query e select
para alimentar os DAO contidos na pasta Model
- Um arquivo de boot contendo o autoload e as constantes de acesso a
banco.

Tks
*************/

require_once "boot.php";
$usuario = new UserController();
$listagem = $usuario->usersList();

