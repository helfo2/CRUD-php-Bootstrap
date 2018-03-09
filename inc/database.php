<?php
	mysqli_report(MYSQLI_REPORT_STRICT);

	function open_database(){
		try {
			$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			return $conn;
		} catch(Exception $e) {
			echo $e->getMessage();
			return null;
		}
	}

	function close_database($conn){
		try {
			mysqli_close($conn);
		} catch(Exception $e) {
			echo $e->getMessage();
		}
	}

	// pesquisa registro por id
	function find($table = null, $id = null){
		$database = open_database();
		$found = null;

		try{
			if($id){
				$sql = "SELECT * FROM ".$table." WHERE id = ".$id;
				$result = $database->query($sql);

				if($result->num_rows > 0)
					$found = $result->fetch_assoc();
			}else{
				$sql = "SELECT * FROM ".$table;
				$result = $database->query($sql);

				if($result->num_rows > 0) {
					$found = array();

					while($row = $result->fetch_assoc()){
						array_push($found, $row);
					}
				}
			}

		} catch(Exception $e){
			$_SESSION['message'] = $e->GetMessage();
			$_SESSION['type'] = 'danger';
		}

		close_database($database);
		return $found;
	}

	function find_all($table){
		return find($table);
	}

	function update($table = null, $id = 0, $data = null){
		$database = open_database();

		$items = null;

		foreach($data as $key => $value){
			if(strpos($value, '/') !== false){
				$value = strtr($value, '/', '-');
    			$value = date('Y-m-d', strtotime($value));
			}
			$items.= trim($key, "'")."='$value',";
		}

		// remove ultima virgula
		$items = rtrim($items, ',');

		$sql = "UPDATE ".$table;
		$sql .= " SET $items";
		$sql .= " WHERE id=".$id.";";

		try {
			$database->query($sql);

			$_SESSION['message'] = "Registro atualizado com sucesso.";
			$_SESSION['type'] = 'success';
		} catch(Exception $e) {
			$_SESSION['message'] = "Não foi possível realizar a operação";
			$_SESSION['type'] = 'danger';
		}
	}

	function save($table = null, $data = null) {
		$database = open_database();
		$columns = null;
		$values = null;

		// print_r($data);

		foreach ($data as $key => $value) {
			$columns .= trim($key, "'") . ",";
			
			if(strpos($value, '/') !== false){
				$value = strtr($value, '/', '-');
    			$value = date('Y-m-d', strtotime($value));
			}

			$value = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$value);

			$values .= "'$value',";
		}

		// remove a ultima virgula
		$columns = rtrim($columns, ',');
		$values = rtrim($values, ',');

		$sql = "INSERT INTO " . $table . "($columns)" . " VALUES " . "($values);";
		
		try {
			$database->query($sql);
		
			$_SESSION['message'] = 'Registro cadastrado com sucesso.';
			$_SESSION['type'] = 'success';
		} catch (Exception $e) {
			$_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
			$_SESSION['type'] = 'danger';
		} 
		
		close_database($database);
	}

	function remove($table = null, $id = null){
		$database = open_database();

		try {
			if($id) {
				$sql = "DELETE FROM ".$table." WHERE id = ".$id;
				$result = $database->query($sql);

				if($result = $database->query($sql)) {
					$_SESSION['message'] = "Registro removido com sucesso.";
					$_SESSION['type'] = 'success';
				}
			}
		} catch (Exception $e) {
			$_SESSION['message'] = $e->GetMessage();
			$_SESSION['type'] = 'danger';
		}

		close_database($database);
	}
?>