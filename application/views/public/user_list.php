<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
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
            <td><?=$row['data_id']?></td>
            <td>
                <a href="<?=base_url("public/form/detail/".$row['data_id'])?>">
                    <?=$row['nama_lengkap']?></td>
                </a>
            </td>
            <td><?=$row['email']?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
                </div>
            </div>
        </div>
    </div>
</div>

