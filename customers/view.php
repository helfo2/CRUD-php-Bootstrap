<?php
	require_once('functions.php');
	view($_GET['id']);
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Cliente <?php echo $customer['id']; ?></h2>
<hr>

<?php if(!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?>"><?php echo $_SESSION['message']; ?></div>
<?php endif; ?>

<dl class="dl-horizontal">
	<dt>Nome / Razão Social: </dt>
	<dd><?php echo $customer['name']; ?></dd>

	<dt>CPF / CNPJ: </dt>
	<dd><?php echo $customer['cpf_cnpj']; ?></dd>

	<dt>Data de nascimento: </dt>
	<dd>
		<?php 
			$value = $customer['birthdate'];
			$value = strtr($value, '-', '/');
    		$value = date('d/m/Y', strtotime($value));
			echo $value;
		?>	
	</dd>
</dl>

<dl class="dl-horizontal">
	<dt>Endereço: </dt>
	<dd><?php echo $customer['address']; ?></dd>

	<dt>Bairro: </dt>
	<dd><?php echo $customer['hood']; ?></dd>

	<dt>CEP: </dt>
	<dd><?php echo $customer['zip_code']; ?></dd>

	<dt>Data de Cadastro: </dt>
	<dd><?php echo $customer['created']; ?></dd>
</dl>

<dl class="dl-horizontal">
	<dt>UF: </dt>
	<dd><?php echo $customer['state']; ?></dd>

	<dt>Cidade: </dt>
	<dd><?php echo $customer['city']; ?></dd>

	<dt>Inscrição Estadual: </dt>
	<dd><?php echo $customer['ie']; ?></dd>

	<dt>Telefone: </dt>
	<dd><?php echo $customer['phone']; ?></dd>

	<dt>Celular: </dt>
	<dd><?php echo $customer['mobile']; ?></dd>
</dl>

<div id="actions" class="row">
	<div class="col-md-12">
		<a href="edit.php?id=<?php echo $customer['id']; ?>" class="btn btn-primary">Editar</a>
		<a href="index.php" class="btn btn-default">Voltar</a>
	</div>
</div>

<?php include(FOOTER_TEMPLATE); ?>