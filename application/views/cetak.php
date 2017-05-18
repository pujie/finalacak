<h1>300 Pemenang Hadiah Hiburan</h1>
<style>
#hiburan tbody tr td{
    border: 1px solid black;
    margin: 5px;
    padding : 8px;
}
</style>
<table id="hiburan">
<thead><tr><th colspan=12>Nomor</th></tr></thead>
<tbody>
<?php for($row = 0; $row <25;$row ++){?>
    <tr>
        <?php for($col=1;$col<=12;$col++){?>
        <?php $index = $col+($row*12);?>
        <td ><?php 
        echo $numbers[$index];
        }?>
        </td>
    </tr>
<?php }?>
</tbody>
</table>
<script>
window.print();
</script>
