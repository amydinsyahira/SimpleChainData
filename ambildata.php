<?php
//mengkoneksikan ke server MySQL
include"config.php";

$idPropinsi=$_GET['idPropinsi'];
//men-query yang memiliki id propinsi sama
$pilih="SELECT * FROM kabupaten WHERE idPropinsi=$idPropinsi";
$query=mysql_query($pilih);
while($row=mysql_fetch_array($query))
{
echo"
<option value='$row[idKabupaten]'>$row[kabupaten]</option>
";
}
?>