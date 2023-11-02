<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
  <div class="row">
    <div class="col">
      <h3 class="mt-2">Detail Anggota</h3>

      <div class="card mb-3" style="max-width: 390px;">
        <div class="row no-gutters">
         
          <div class="col-md-8">
            <div class="card-body">
            
              <p class="card-text"><b>Nama        : <?= $anggota['nama']; ?></b></p>
              <p class="card-text"><b>Alamat      : <?= $anggota['alamat']; ?></b></p>
              <p class="card-text"><b>No Telepon  : <?= $anggota['telp']; ?></b></p>
            
              <a href="edit/<?= $anggota['id_anggota']; ?>" class="btn btn-warning">Ubah</a>
              <form action="<?= base_url('/anggota/delete') . '/' . $anggota['id_anggota']  ?>" method="post" class="d-inline">
                <?= csrf_field() ?>
                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Hapus</button>
              </form>

              <br><br>
              <a href="/anggota">Kembali Ke Daftar anggota</a>
            </div>
          </div>
        </div>
      </div>
      <?= $this->endsection(); ?>