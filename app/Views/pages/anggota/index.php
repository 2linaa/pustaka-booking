<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container mt-3">
  <div class="row">
    <div class="col">
      <a href="/anggota/create" class="btn btn-primary shadow-sm">Tambah</a>
      <h1>Daftar Anggota</h1>
      <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
          <?= session()->getFlashdata('pesan') ?>
        </div>
      <?php endif ?>
      <?php if (session()->has('error')) : ?>
        <div class="alert alert-danger">
          <?= session('error') ?>
        </div>
      <?php endif; ?>

      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">No.</th>
            <th scope="col">Nama</th>
            <th scope="col">Alamat</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $i = 1;
          foreach ($anggota as $a) :
          ?>
            <tr>
              <th scope="row"><?= $i++; ?></th>
              <td><?= $a['nama']; ?></td>
              <td><?= $a['alamat']; ?></td>
              <td><a href="/anggota/<?= $a['id_anggota']; ?>" class="btn btn-success">Detail</a></td>
            </tr> <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?= $this->endsection(); ?>