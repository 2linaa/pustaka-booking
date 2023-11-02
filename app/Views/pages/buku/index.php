<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container mt-3">
  <div class="row">
    <div class="col">
      <a href="/buku/create" class="btn btn-primary shadow-sm">Tambah</a>
      <h1>Daftar Buku</h1>
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
            <th scope="col">Sampul</th>
            <th scope="col">Judul</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $i = 1;
          foreach ($buku as $b) :
          ?>
            <tr>
              <th scope="row"><?= $i++; ?></th>
              <td><img src="/img/<?= $b['sampul']; ?>" alt="" width="75"></td>
              <td><?= $b['judul']; ?></td>
              <td><a href="/buku/<?= $b['id_buku']; ?>" class="btn btn-success">Detail</a></td>
            </tr> <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?= $this->endsection(); ?>