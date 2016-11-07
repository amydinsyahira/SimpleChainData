<?php
include"config.php";
?>
<html>
<head>
<title>Tes Combobox</title>
<script type='text/javascript'>
function createRequestObject()
{
var ro;
var browser = navigator.appName;
if(browser == "Microsoft Internet Explorer")
{
ro = new ActiveXObject("Microsoft.XMLHTTP");
}
else
{
ro = new XMLHttpRequest();
}
return ro;
}

var xmlhttp = createRequestObject();
function rubah(pilih)
{
var idPropinsi = pilih.value;

if (!idPropinsi) return;
xmlhttp.open('get', 'ambildata.php?idPropinsi='+idPropinsi, true);
xmlhttp.onreadystatechange = function()
{
if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200))
document.getElementById("kabupaten").innerHTML = xmlhttp.responseText;
return false;
}

xmlhttp.send(null);
}
</script>
</head>
<body>
<form>
<select name="idPropinsi" onChange="javascript:rubah(this)">
<option value=''>-- Pilih Provinsi --</option>
<?php
$pilih="SELECT * FROM propinsi";
$query=mysql_query($pilih);
while($row=mysql_fetch_array($query))
{
echo"
<option value='$row[idPropinsi]'>$row[propinsi]</option>
";
}
?>
</select>
<select id="kabupaten"></select>
</form>
</body>
</html>
