<?php 
  require_once('functions.php'); 
  add();
?>

<?php include(HEADER_TEMPLATE); ?>

<script type="text/javascript" >
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('estado').value=(conteudo.uf);
            document.getElementById('cidade').value=(conteudo.localidade);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {
        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');
      
        //Verifica se campo cep possui valor informado.
        if (cep != "") {
            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {
                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('estado').value="...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };
</script>

<h2>Novo Cliente</h2>

<?php if (!empty($_SESSION['message'])) : ?>
  <div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <?php echo $_SESSION['message']; ?>
  </div>
<?php endif; ?>

<form id="new" action="add.php" method="post">
  <!-- area de campos do form -->
  <hr />
  <div class="row">
    <div class="form-group col-md-7">
      <label for="name">Nome / Razão Social</label>
      <input type="text" class="form-control" name="customer['name']">
    </div>

    <div class="form-group col-md-3">
      <label for="campo2">CNPJ / CPF</label>
      <input type="text" id="cpf" class="form-control" name="customer['cpf_cnpj']">
    </div>

    <div class="form-group col-md-2">
      <label for="campo3">Data de Nascimento</label>
      <input type="text" id="birth" class="form-control" name="customer['birthdate']" maxlength="10" placeholder="__/__/____">
    </div>
  </div>
  
  <div class="row">
    <div class="form-group col-md-2">
      <label for="campo3">CEP</label>
      <input type="text" id="cep" class="form-control" name="customer['zip_code']" onblur="pesquisacep(this.value);">
    </div>

    <div class="form-group col-md-5">
      <label for="campo1">Endereço</label>
      <input type="text" id="rua" class="form-control" name="customer['address']">
    </div>

    <div class="form-group col-md-3">
      <label for="campo2">Bairro</label>
      <input type="text" id="bairro" class="form-control" name="customer['hood']">
    </div>
    
    <div class="form-group col-md-2">
      <label for="campo3">Data de Cadastro</label>
      <input type="text" class="form-control" name="customer['created']" disabled>
    </div>
  </div>

  <div class="row">  
    <div class="form-group col-md-3">
      <label for="campo3">UF</label>
      <input type="text" id="estado" name="customer['state']" class="form-control"></select>
    </div>
    
    <div class="form-group col-md-3">
      <label for="campo1">Município</label>
      <input type="text" id="cidade" class="form-control" name="customer['city']"></select>
    </div>

    <div class="form-group col-md-2">
      <label for="campo2">Telefone</label>
      <input type="text" id="phone" class="form-control" name="customer['phone']" placeholder="(031) 12345-6789">
    </div>
    
    <div class="form-group col-md-2">
      <label for="campo3">Celular</label>
      <input type="text" id="mobile" class="form-control" name="customer['mobile']" placeholder="(031) 12345-6789">
    </div>
    
    <div class="form-group col-md-2">
      <label for="campo3">Inscrição Estadual</label>
      <input type="text" class="form-control" name="customer['ie']" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="Somente números">
    </div>
  </div>

  <div id="actions" class="row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary">Salvar</button>
      <a href="index.php" class="btn btn-default">Cancelar</a>
    </div>
  </div>
</form>

<script type="text/javascript">
	$(document).ready(function(){
		$('#birth').mask('99/99/9999');
    $('#cpf').mask('999.999.999-99');
    $('#cep').mask('99.999-999');
    $('#phone').mask('(999) 99999-9999');
    $('#mobile').mask('(999) 99999-9999');
	});
</script>

<?php include(FOOTER_TEMPLATE); ?>