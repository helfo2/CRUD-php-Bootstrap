<?php

require_once '../config.php';
require_once DBAPI;

include('aux_code.php');

$customers = null;
$customer = null;

// listagem de clientes
function index(){
	global $customers;
	$customers = find_all('customers');
}

function add(){
	if (!empty($_POST['customer'])) {
		$customer = $_POST['customer'];

		if(validarCPF($customer["'cpf_cnpj'"])){
			$today = date_create('now', new DateTimeZone('America/Sao_Paulo'));
			
			$customer["'modified'"] = $customer["'created'"] = $today->format("Y-m-d H:i:s");

			save('customers', $customer);
			header('location: index.php');
		} else {
			$_SESSION['message'] = "CPF informado inválido";
			$_SESSION['type'] = 'danger';
		}
	}
}

function edit(){
	$now = date_create('now', new DateTimeZone('America/Sao_Paulo'));

	if(isset($_GET['id'])){
		$id = $_GET['id'];

		if(isset($_POST['customer'])){
			$customer = $_POST['customer'];

			if(validarCPF($customer["'cpf_cnpj'"])){
				$customer["'modified'"] = $now->format("Y-m-d H:i:s");

				update('customers', $id, $customer);
				header('location: index.php');
			} else {
				$_SESSION['message'] = "CPF informado inválido";
				$_SESSION['type'] = 'danger';
			}
		} else {
			global $customer;
			$customer = find('customers', $id);
		}
	} else {
		header('location: index.php');
	}
}

function view($id = null){
	global $customer;
	$customer = find('customers', $id);
}

function delete($id = null){
	global $customer;
	$customer = remove('customers', $id);

	header('location: index.php');
}

function dataMySQL_BR($date){
	$value = $date;
	$value = strtr($value, '-', '/');
	$value = date('d/m/Y', strtotime($value));
	return $value;
}
?>