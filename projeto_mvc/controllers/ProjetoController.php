<?php
require_once '../models/Projeto.php';
class ProjetoController
{   
public function all(){
$obj = new Projeto(); 
$projetos = $obj->all();
require_once    'views/index.php';
}
public function create() {
$obj = new Projeto();
if(isset($_POST['nome'])){
$obj->setNome ($_POST['nome']); 
$obj->setDuracao ($_POST['duracao']);
$obj->create();
$projeto =  $obj->read();
}else{
$projeto = (object) [
'id' => null,
'nome' => '',
'duracao' => '',
];
}
require_once 'views/index.php';
}
public function read(){ 
$obj = new Projeto (); 
$obj->setId($_GET['id']); 
$projeto = $obj->read();
require_once 'views/index.php';
}
public function update() {
$obj = new Projeto (); 
$obj->setId($_GET['id']); 
if(isset($_POST['nome'])){
$obj->setNome($_POST['nome']);
$obj->setDuracao($_POST['duracao']); 
$obj->update();
}
$projeto = $obj->read();
require_once 'views/index.php';
}
public function delete () {
$obj = new Projeto(); 
$obj->setId($_GET['id']); 
$obj->delete();
header("Location: ./");
}
}