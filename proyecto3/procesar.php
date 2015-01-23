<?php
echo "<pre>";
print_r($_POST);
echo "</pre>";

echo "<pre>";
print_r($_FILES);
echo "</pre>";


include('userForm.php');
include('filterForm.php');
include('validateForm.php');
include('renderForm.php');

$filterdata = filterForm($userForm, $_POST);

// echo renderForm($userForm, $filterdata);
$validatedata = validateForm($userForm, $filterdata);

echo "<pre>Validate: ";
print_r($validatedata);
echo "</pre>";


if($validatedata)
{
    foreach ($filterdata as $key => $value)
    {
        if(is_array($value))
            $filterdata[$key]=implode(",", $value);        
    }
    move_uploaded_file($_FILES['photo']['tmp_name'], 
                       $_SERVER['DOCUMENT_ROOT']."/".$_FILES['photo']['name']);
    file_put_contents('usuarios.txt',implode("|",$filterdata)."\n",FILE_APPEND);
    
}


// echo "<pre>Filter: ";
// print_r($filterdata);
// echo "</pre>";