<?php

function generateVerificationCode()
{
	return md5(uniqid(rand(), true));
}

function fetchData($parameters)
{
	global $db;
	$tables = array(
		"register",
		"appointment",
		"contact"
		
		
	);

	$table = isset($parameters['table']) ? $parameters['table'] : "";
	$condition = isset($parameters['condition']) ? $parameters['condition'] : "";
	$column_name = (isset($parameters['column_name']) && strlen(trim($parameters["column_name"]))) ? trim($parameters['column_name'], ", ") : "*";

	if(!empty($table) && in_array($table, $tables))
	{
		$sql = "SELECT $column_name FROM $table $condition";
		// echo $sql;
		 
		$result_set = $db->query($sql);
		if($result_set->rowCount())
		{
			return $result_set->fetchAll(PDO::FETCH_ASSOC);
		}
		else
		{
			return false;
		}
	}
	else
	{
		return false;
	}
}

?>