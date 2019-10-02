<p>Nama Lengkap: <?=$detail['nama_lengkap']?></p>

<p>Email: <?=$detail['email']?></p>

<?php foreach ($answer as $row): ?>

<p>
    <strong>
        <?=$question[$row['question_id']]['the_question']?>
    <strong>
</p>
<p><?=$row['the_answer']?></p>
<?php endforeach; ?>