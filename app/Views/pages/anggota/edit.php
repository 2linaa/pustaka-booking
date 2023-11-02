<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container mt-3">
    <div class="row">
        <div class="col">
            <h1>Form ubah data Anggota</h1>
            <?php if (session()->has('pesan')) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= session('pesan') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>
            <form action="<?= base_url('/anggota/update/' . $anggota['id_anggota']) ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <input type="hidden" name="id_anggota" value="<?= $anggota['id_anggota']; ?>">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" autofocus value="<?= (old('nama'))?old('nama'):$anggota['nama'] ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('nama'); ?> 
                    </div>
                 
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $anggota['alamat']; ?>">
                </div>
                <div class="mb-3">
                    <label for="telp" class="form-label">No telp</label>
                    <input type="text" class="form-control" id="telp" name="telp" value="<?= $anggota['telp']; ?>">
                </div>
                
                <button type="submit" class="btn btn-primary">Ubah</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endsection(); ?>