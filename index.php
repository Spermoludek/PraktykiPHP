<?php 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2137</title>

    <style>
        html {
            background-color: linear-gradient(to right, white, black);
        }
        * {
            font-family: "Tahoma";
        }

        table {
            table-layout: fixed;
        }
        td {
            padding: 1em;
        }
        form {
        display:flex;
        justify-content:space-evenly;
        padding: 20px;
        margin: 10px;
    }
        input:placeholder {
                 background: -webkit-linear-gradient(aquamarine, purple);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
    
}


    </style>
</head>
<body>

<form method='POST'>
<label for = 'city'> Szukaj miasto
<input name='city' id='city' placeholder = 'Miasto...'>


<label for = 'code'> Szukaj kodu
<input name= 'code' id = 'code' placeholder = 'Kod pocztowy...'>

<label for = 'addr'> Uwzględnić adres? 
    <input name = 'addr' id = 'addr' type = 'checkbox' checked>

<button> Wyślij! </button></form>

<table border>
<tr> 
    <th> ID   </th>
    <th> KOD  </th>
    <th> NAZWA </th>
    <th> MIEJSCOWOŚĆ </th>
    <th> ADRES </th>
    <th> WOJEWÓDZTWO </th>
    <th> POWIAT </th>
    <th> GMINA </th>
    
</tr> 
  
<?php 
$db = new mysqli('localhost', 'kierownik', 'dupa123', 'kody');
if ($db -> connect_error) {
    print_r( $db -> connect_error);
}


$city = $_POST['city'] ?? '';
$code = $_POST['code'] ?? '';
$includeAddr = $_POST['addr'] ?? false;

 $query = $db -> query("SELECT * FROM kody WHERE miej = \"{$city}\" OR kod = \"{$code}\";");


 while ($row = $query -> fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['kod']}</td>";
        echo "<td>{$row['nazwa']}</td>";
        echo "<td>{$row['miej']}</td>";
        if ($includeAddr) {
        echo "<td>{$row['adres']}</td>";
        }
        else {
            echo "<td>-</td>";
        }
        echo "<td>{$row['woj']}</td>";
        echo "<td>{$row['powiat']}</td>";
        echo "<td>{$row['gmina']}</td>";
        echo "</tr>";

    }
    ?>

</table>


</body>
</html>