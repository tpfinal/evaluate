<?php

//convierte una fecha del formato de la BD(YYYY-mm-dd) al formato de js (m/d/Y)

function sqlajs($fechaSql)
{
$js=date("m/d/Y",strtotime($fechaSql));

//var_dump($js);

return $js;
}

//convierte una fecha del formato javascript (m/d/Y) al formato SQL de la BD(YYYY-mm-dd)

function jsasql($fechaJs)
{
$sql=date("Y-m-d",strtotime($fechaJs));

//var_dump($sql);

return $sql;
}


?>