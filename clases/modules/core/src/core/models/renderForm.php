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
    $html.="<ul style='list-style-type:none'>";
    
    foreach ($form as $name => $attributes) {
      if (array_key_exists('type', $attributes )) {
        
        switch ($attributes['type']) {
          case "hidden":
            $html .= "<li>";
            if (isset($attributes['label'])) {
               $html .= $attributes['label'] . " ";
            }
            $html .= sprintf("<input type='%s' name='%s' value='%s'/>", 
                                            $attributes['type'], $name, $attributes['value']);
            break;
            $html .= "</li>";
          case "text": 
            $html .= "<li>";
            if (isset($attributes['label'])) {
              $html .= $attributes['label'] . " ";;
            }
            
            $html .= sprintf("<input type='%s' name='%s'", $attributes['type'], $name);

            if (isset($attributes['decorators'])) {
            
            }

            
            if (isset($attributes['value'])) {
              $html .= sprintf(" value='%s'", $attributes['value']);
            }
            if (isset($attributes['placeholder'])) {
              $html .= sprintf(" placeholder='%s'", $attributes['placeholder']); 
            }
            $html.= "/>";
            $html .= "</li>";
            break;
          case "email":
            $html .= "<li>";
            if (isset($attributes['label'])) {
              $html .= $attributes['label'] . " ";;
            }
            
            $html .= sprintf("<input type='%s' name='%s'", $attributes['type'], $name);
            
            if (isset($attributes['value'])) {
              $html .= sprintf(" value='%s'", $attributes['value']);
            }
            if (isset($attributes['placeholder'])) {
              $html .= sprintf(" placeholder='%s'", $attributes['placeholder']); 
            }
            $html.= "/>";
            $html .= "</li>";
            break;
          case "password":
            $html .= "<li>";
            if (isset($attributes['label'])) {
              $html .= $attributes['label'] . " ";;
            }
            
            $html .= sprintf("<input type='%s' name='%s'", $attributes['type'], $name);
            
            if (isset($attributes['placeholder'])) {
              $html .= sprintf(" placeholder='%s'", $attributes['placeholder']); 
            }
            $html.= "/>";
            $html .= "</li>";
            break;
          case "textarea":
            $html .= "<li>";
            if (isset($attributes['label'])) {
              $html .= $attributes['label'] . " ";;
            }
            
            $html .= sprintf("<textarea name='%s'", $name);
             
            if (isset($attributes['rows'])) {
              $html .= sprintf(" rows='%d'", $attributes['rows']); 
            }
            if (isset($attributes['rows'])) {
              $html .= sprintf(" cols='%d'", $attributes['cols']); 
            }
              
            $html.= ">";
            $html.= "</textarea>";
            $html .= "</li>";
            
            break;
          case "file":
            $html .= "<li>";
            if (isset($attributes['label'])) {
              $html .= $attributes['label'] . " ";;
            }
            
            $html .= sprintf("<input type='%s' name='%s'", $attributes['type'], $name);
            $html.= "/>";
            $html .= "</li>";
          
            break;
          case "date":
            $html .= "<li>";
            if (isset($attributes['label'])) {
              $html .= $attributes['label'] . " ";;
            }
            
            $html .= sprintf("<input type='%s' name='%s'", $attributes['type'], $name);
            $html.= "/>";
            $html .= "</li>";
            break;
          case "select":
            $html .= "<li>";
            if (isset($attributes['label'])) {
              $html .= $attributes['label'] . " ";;
            }
            
            $html .= sprintf("<select name='%s'>\n", $name);
            if (isset($attributes['options'])) {
              foreach ($attributes['options'] as $key => $value) {
                $html .= sprintf("<option value='%s'>%s</option>\n", $key, $value);  
              }
            }
            $html .= "</select>";
            
            $html .= "</li>";
            break;
          case "selectmultiple":
            $html .= "<li>";
            if (isset($attributes['label'])) {
              $html .= $attributes['label'] . " ";;
            }
            $html .= sprintf("<select multiple name='%s'>\n", $name);
            if (isset($attributes['options'])) {
              foreach ($attributes['options'] as $key => $value) {
                $html .= sprintf("<option value='%s'>%s</option>\n", $key, $value);  
              }
            }
            $html .= "</select>";
            $html .= "</li>";
          
            break;
          case "radio":
            $html .= "<li>";
            if (isset($attributes['label'])) {
              $html .= $attributes['label'] . " ";
            }
            
            if (isset($attributes['options'])) {
              foreach ($attributes['options'] as $key => $value) {
                $html .= sprintf("%s <input type='%s' name='%s' value='%s'/>\n", $value, $attributes['type'], $name, $key);
              }
            }
            
            $html .= "</li>";
            break;
          case "checkbox":
            $html .= "<li>";
            if (isset($attributes['label'])) {
              $html .= $attributes['label'] . " ";
            }
            
            if (isset($attributes['options'])) {
              foreach ($attributes['options'] as $key => $value) {
                $html .= sprintf("%s <input type='%s' name='%s[]' value='%s'/>\n", $value, $attributes['type'], $name, $key);
              }
            }
            
            $html .= "</li>";
            break;
          case "submit":
            $html .= "<li>";
            if (isset($attributes['label'])) {
              $html .= $attributes['label'] . " ";
            }
            
            $html .= sprintf("<input type='%s' name='%s' value='%s'/>\n", $attributes['type'], $name, $attributes['value']);
            
            $html .= "</li>";
            break;
        }
       }
        
    }
    $html.="</ul>";
    return $html;
}

