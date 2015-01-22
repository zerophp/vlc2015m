<?php


include('userForm.php');
include('filterForm.php');
include('validateForm.php');

$filterdata = filterForm($userForm, $_POST);
$validatedata = validateForm($userForm, $filterdata);

if($validatedata)
{
    // Guardar en un txt
}
