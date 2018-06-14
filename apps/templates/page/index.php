<table>
    <?php
    foreach ($data as $k =>$v){
    ?>
    <tr><td><?= $v->id;?></td><td><?= $v->user;?></td><td><?= $v->password;?></td><td><?= $v->is_default;?></td></tr>
    <?php } ?>
</table>