<?php
/**
 * Filter data form
 * 
 * @param array $form definition
 * @param array $data postdata
 * @return array
 */
function filterForm($form, $data)
{

    foreach ($data as $key => $value)
    {
        $valor = $value;
        if(isset($form[$key]['filters']))
        {
            $filtros = $form[$key]['filters'];
            foreach ($filtros as $value2)
            {
                switch($value2)
                {
                    case 'striptags':
                         $data[$key] = strip_tags($data[$key]);
                    break;
                    case 'striptrim':
                        $data[$key] = trim($data[$key]);
                    break;
                    default:
                        return $valor;
                }
                //TODO escape!!!"
            }
        }
        else
            $data[$key]=$value;
        
    }
        
    return $data; 
}
