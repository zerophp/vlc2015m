<?php

/**
 * Validate form
 * 
 * @param array $form definition
 * @param array $data filtered
 * @return boolean | array ('fildname'=>'error message')
 */
function validateForm($form, $datafiltered)

{
    $validatedata = null;
    
    foreach ($form as $key => $form_field) {
//        if ($form[$key]['validation'] != null) { // hay que validar
        if (array_key_exists( 'validation', $form[$key] )) { // hay que validar
            
            $validation = $form_field['validation'];
            
            $valor = $datafiltered[$key];
            
            foreach ($validation as $val_type => $val_data) {
                switch ($val_type) {
                    case 'required':
                        if ($valor == null) {
                            if (array_key_exists('error_message', $validation)) { 
                                $validatedata[$key] = $validation['error_message'];
                            } else {
                                $validatedata[$key] = $key." no puede ser nulo";
                            }
                        }
                        break;
                    case 'minsize':
                       // echo '<pre>';
                       // print_r(strlen($valor));
                       // echo '</pre>';
                        if ($valor != null && (strlen($valor) < $validation['minsize'])) {
                            if (array_key_exists('error_message', $validation)) { 
                                $validatedata[$key] = $validation['error_message'];
                            } else {
                                $validatedata[$key] = $key." debe de tener más de ".$validation['minsize'];
                            }
                        }
                        break;
                    case 'maxsize':
                        if ($valor != null && (strlen($valor) > $validation['maxsize'])) {
                            if (array_key_exists('error_message', $validation)) { 
                                $validatedata[$key] = $validation['error_message'];
                            } else {
                                $validatedata[$key] = $key." debe de tener más de ".$validation['maxsize'];
                            }
                        }
                        break;
                }
            }
        }
    }
    
   if ($validatedata == null) {
       $validatedata = true;
   }
    return $validatedata;
}