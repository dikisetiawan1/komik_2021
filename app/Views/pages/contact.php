

<?= $this->extend('layout/template');?>

<?= $this->section('content');?>
<div class="container">
    <div class="row">
        <div class="col">

        <h2>Contact Us</h2>

        <?php foreach ($alamat as $a )  : ?>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><?= $a['tipe']; ?></li>
                <li class="list-group-item"><?= $a['alamat']; ?></li>
                <li class="list-group-item"><?= $a['telp']; ?></li>
                <li class="list-group-item"><?= $a['kota']; ?></li>
            
            </ul>
        <?php endforeach; ?>

        </div>
    </div>
</div>

<?= $this->endSection('');?>