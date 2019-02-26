<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        <?php  
            $sum = 0;
            
            echo "<table>";
            echo "<tr><td><b>number</b></td><td style='padding-left:1rem;'><b>odd/even</b></td></tr>";
            for ($i=1; $i<=9; $i++) {
                $rand = rand(1, 1000);
                $sum += $rand;
                echo "<tr><td> $rand <td><td> " . ($rand%2 == 0 ? 'even' : 'odd') . "</td></tr>";
            }
            echo "</table>";
            
            echo "<p>SUM:";
            echo $sum;
            echo "</p>";
            
            echo "<p>AVG:";
            echo $sum / 9;
            echo "</p>";
            
            
            $weekdays = array();
            $weekdays[] = "M";
            $weekdays[] = "T"; 
            array_push($weekdays,"W"); 
            echo "Displaying values using var_dump:";
            var_dump($weekdays);
            echo "<br><br>";
            echo "Displaying values using print_r:";
            print_r($weekdays);

        ?>



    </body>
</html>