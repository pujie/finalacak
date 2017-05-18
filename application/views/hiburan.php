<style>
#hiburan{
    padding:5px;
    width: 100%;
}
#hiburan tbody tr td{
    border: 1px solid black;
    margin: 5px;
    padding : 8px;
}
.button{
    padding: 5px;
    color: green;
    border: 1px solid red;
}
</style>
<table id="hiburan">
    <thead>
        <tr>
            <th colspan=4><a target="_blank" href="/main/cetakhiburan"><img src="/images/printer.svg" title="Cetak" /></a>
            </th>
            <th colspan=4><a href="/main/gethiburan"><img src="/images/refresh.svg" title="Refresh" /></a>
            </th>
            <th colspan=4><a target="_blank" href="/main/getutama"><img src="/images/crown.svg" title="Pemenang Utama" /></a>
            </th>
        </tr>
        <tr>
            <th colspan=4><a target="_blank" href="/main/cetakhiburan">Cetak</a>
            </th>
            <th colspan=4><a href="/main/gethiburan">Refresh</a>
            </th>
            <th colspan=4><a target="_blank" href="/main/getutama">Utama</a>
            </th>
        </tr>        
        <tr><th colspan=12>300 Pemenang Hadiah Hiburan</th></tr>
    </thead>
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
