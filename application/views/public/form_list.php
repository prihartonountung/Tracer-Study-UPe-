<table class="table datatablesGeneral">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($list as $row): ?>
        <tr>
            <td><?=$row['id']?></td>
            <td>
                <a href="<?=base_url("public/form/detail/".$row['id'])?>">
                    <?=$row['nama_lengkap']?>
                </a>
            </td>
            <td><?=$row['email']?></td>    
        </tr>
        <?php endforeach; ?>
    </tbody>       
</table>