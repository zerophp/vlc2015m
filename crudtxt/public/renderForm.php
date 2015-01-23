<?php

/**
 * Render form
 * 
 * @param array $form definition
 * @param array $data postdata
 * @return string $html
 */

function renderForm($form, $data=null)
{
    $html="<ul style=\"list-style-type:none\">";
    foreach ($form as $key => $value)
    {
        
        
       if (array_key_exists ( 'type' , $value ))
       {
           $html.="<li>";
           switch ($value['type'])
            {
                case "hidden":
                    $html.=$value['label'];
                    $html.="<input type=\"hidden\" name=$key />";
                    break;
                
                case "text": 
                   $html.=$value['label'];
                   $html.="<input type=\"text\" name=\"$key\" ";
                    if(isset($value['placeholder']))
                        $html.="placeholder=\"".$value['placeholder']."\"";
                   $html.= "/>";
                   break;
            }
            $html.="</li>";
       }
        
    }
    $html.="</ul>";
    return $html;
}

