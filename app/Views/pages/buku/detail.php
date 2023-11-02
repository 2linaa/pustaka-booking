<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
  <div class="row">
    <div class="col">
      <h3 class="mt-2">Detail Buku</h3>

      <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
          <div class="col-md-4">
            <img src="/img/<?= $buku['sampul']; ?>" class="card-img" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title"><?= $buku['judul']; ?></h5>
              <p class="card-text"><b>Pengarang : <?= $buku['pengarang']; ?></b></p>
              <p class="card-text"><small class="text-muted">Penerbit : <?= $buku['penerbit']; ?></small></p>
              <p class="card-text"><small class="text-muted">Tahun terbit : <?= $buku['tahun_terbit']; ?></small></p>
              <a href="edit/<?= $buku['id_buku']; ?>" class="btn btn-warning">Ubah</a>
              <form action="<?= base_url('/buku/delete') . '/' . $buku['id_buku']  ?>" method="post" class="d-inline">
                <?= csrf_field() ?>
                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Hapus</button>
              </form>

              <br><br>
              <a href="/buku">Kembali Ke Daftar buku</a>
            </div>
          </div>
        </div>
      </div>
      <?= $this->endsection(); ?>