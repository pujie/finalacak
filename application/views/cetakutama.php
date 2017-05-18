<html>
<head>
<style type="text/css" media="print">
#displaywinner{
    font-size: 190px;
}
</style>
</head>
<body>
<table>
<thead>
<tr>
<th>
Pemenang ke <?php echo $sesscount;?>
</th>
</tr>
</thead>
<tbody>
<tr>
<td>
<span id="displaywinner">
<?php
echo $number;
?>
</span>
</td>
</tr>
</tbody>
</table>
<script>
window.print();
window.location.href = "/main/getutama"
</script>
</body>
</html>