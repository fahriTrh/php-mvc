<div class="container mt-3">
    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>
    
    <div class="row mb-3">
        <div class="col-lg-6">
            <!-- Button trigger modal -->
            <button type="button" id="tombol-tambah-data" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formModal">
                Tambah Data Mahasiswa
            </button>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <form>
                <div class="input-group">
                <input type="text" class="form-control" placeholder="Cari Mahasiswa.." aria-describedby="button-addon2" id="keyword" autocomplete="off">
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <h3 class="mt-3">
                <?php if (!empty($data['mhs'])) :?>
                    Daftar Mahasiswa
                <?php else :?>
                    Data tidak ditemuakan!
                <?php endif ;?>
            </h3>
            <ul class="list-group">
                <?php foreach($data['mhs'] as $mhs) : ?>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <?= $mhs['nama']; ?>
                        <div>
                            <a href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['id']; ?>" class="text-decoration-none">
                                <span class="badge bg-primary">detail</span>
                            </a>
                            <a href="<?= BASEURL; ?>/mahasiswa/ubah/<?= $mhs['id']; ?>" class="text-decoration-none tampilModalUbah" data-bs-toggle="modal" data-bs-target="#formModal"data-id="<?= $mhs['id']; ?>" >
                                <span class="badge bg-warning">ubah</span>
                            </a>
                            <a onclick="return confirm('hapus?');" href="<?= BASEURL; ?>/mahasiswa/hapus/<?= $mhs['id']; ?>" class="text-decoration-none">
                                <span class="badge bg-danger">hapus</span>
                            </a>
                        </div>
                    </li>
                <?php endforeach ; ?>
            </ul>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="judulModal">Tambah Data Mahasiswa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL; ?>/mahasiswa/tambah" method="post">
            <input type="hidden" id="id" name="id">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama">
            </div>
            <div class="mb-3">
                <label for="nrp" class="form-label">Nrp</label>
                <input type="number" class="form-control" id="nrp" name="nrp">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <label for="jurusan">Jurusan</label>
            <select class="form-select mt-2" aria-label="Default select example" id="jurusan" name="jurusan">
                <option value="Sistem Informasi">Sistem Informasi</option>
                <option value="Kedokteran">Kedokteran</option>
                <option value="Teknik Mesin">Teknik Mesin</option>
                <option value="Biologi">Biologi</option>
                <option value="Matematika">Matematika</option>
            </select>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
      </div>
        </form>
    </div>
  </div>
</div>