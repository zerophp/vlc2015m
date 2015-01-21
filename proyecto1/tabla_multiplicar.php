<table border=1>
    <tr>
        <td>0</td>
        <td>1</td>
        <td>2</td>
        <td>2</td>
    </tr>
    <tr>
        <td>1</td>
        <td>2</td>
        <td>3</td>
        <td>4</td>
    </tr>
    <tr>
        <td>2</td>
        <td>3</td>
        <td>4</td>
        <td>5</td>
    </tr>
</table>
<?php
$filas = 74;
$columnas = 54;
echo "<table border=1>";
for($a=0;$a<$filas;$a++)
{
    echo "<tr>";
    for($b=0;$b<$columnas;$b++)
    {
        if($a==0)
        {
            echo "<td>";
            echo $b;
            echo "</td>";
        }
        else if($b==0)
        {
            echo "<td>";
            echo $a;
            echo "</td>";
        }
        else 
        {
            echo "<td>";
            echo $a*$b;
            echo "</td>";
        }
        
    }
    echo "</tr>";    
}

echo "</table>";

















