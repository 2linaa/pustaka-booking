<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container mt-3">
    <div class="row">
        <div class="col">
            <h1>Form ubah data Buku</h1>
            <?php if (session()->has('pesan')) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= session('pesan') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>
            <form action="<?= base_url('/buku/update/' . $buku['id_buku']) ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <input type="hidden" name="id_buku" value="<?= $buku['id_buku']; ?>">
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" id="judul" name="judul" autofocus value="<?= (old('judul'))?old('judul'):$buku['judul'] ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('judul'); ?> </div>
                 
                </div>
                <div class="mb-3">
                    <label for="pengarang" class="form-label">Pengarang</label>
                    <input type="text" class="form-control" id="pengarang" name="pengarang" value="<?= (old('pengarang'))?old('pengarang'):$buku['pengarang'] ?>">
                </div>
                <div class="mb-3">
                    <label for="penerbit" class="form-label">Penerbit</label>
                    <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?= (old('penerbit'))?old('penerbit'):$buku['penerbit'] ?>">
                </div>
                <div class="mb-3">
                    <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                    <input type="year" class="form-control" id="tahun_terbit" name="tahun_terbit" value="<?= (old('tahun_terbit'))?old('tahun_terbit'):$buku['tahun_terbit'] ?>">
                </div>
                <div class="mb-3">
                    <label for="sampul" class="form-label">Sampul Saat Ini</label><br>
                    <img src="/img/<?= $buku['sampul']; ?>" class="img-thumbnail" width="150" alt="Sampul Buku">
                </div>
                <div class="mb-3">
                    <label for="sampul" class="form-label">Pilih Sampul Baru (Opsional)</label>
                    <input class="form-control" type="file" id="sampul" name="sampul">
                </div>
                <button type="submit" class="btn btn-primary">Ubah</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endsection(); ?>