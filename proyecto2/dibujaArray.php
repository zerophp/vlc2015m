<?php
function dibujaArray($array)
{
    $html = "<table border=1>";
    for($a=0;$a<sizeof($array);$a++)
    {
        $html .= "<tr>";
        if(is_array($array[0]))
        {
            for($b=0;$b<sizeof($array[0]);$b++)
            {                
                $html .= "<td>";
                $html .= $array[$a][$b];
                $html .= "</td>"; 
            }
        }
        else 
        {   
            $html .=  "<td>";
            $html .=  $array[$a];
            $html .=  "</td>";
        }
         $html .= "</tr>";
    }
    $html .= "</table>";
    return $html;
}