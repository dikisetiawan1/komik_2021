<?= $this->extend('layout/template'); ?>



<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">

        <h1 class=" mt-4">Daftar Komik</h1>
        <table class=" table table-striped">
            <thead>
            <tr>
                <th> No</th>
                <th> Sampul</th>
                <th> Judul</th>
                <th> Aksi</th>
            </tr>

            </thead>
            <tbody>
                <?php $i=1; ?>
           
            <?php foreach ($komik as $k) : ?>
                
                
            <tr>
            <th><?= $i++; ?></th>
           
                <td><img src="/img/<?= $k['sampul']?>" alt="" class="sampul"></td>
                <td><?= $k['judul']?></td>
                <td>
                    <a href="/komik/<?= $k['slug']?>" class="btn btn-success">Detail</a>
                </td>
            </tr>
            <?php endforeach; ?>

            </tbody>
         
           
        </table>
        </div>
    </div>
</div>



<?= $this->endSection(); ?>