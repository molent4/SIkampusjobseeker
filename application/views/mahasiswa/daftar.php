<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="row">
        <div class="col-lg-8">
            <?php echo form_open_multipart('mahasiswa/apply'); ?>

            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">ID_lowongan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="id_lowongan" name="id_lowongan" value="<?= $detail_lowongan['id_lowongan']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email Mahasiswa</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nim" name="nim" value="<?= $mahasiswa['nim']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="id_lowongan" class="col-sm-2 col-form-label">id_lowongan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="detail_lowongan" name="detail_lowongan" value="<?= $detail_lowongan['id_lowongan']; ?>" readonly>
                    <?= form_error('detail_lowongan', '<small class="text-danger pl-1">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="alamat" class="col-sm-2 col-form-label">id_perusahaan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="id_perusahaan" name="id_perusahaan" value="<?= $detail_lowongan['id_perusahaan']; ?>"readonly>
                    <?= form_error('alamat', '<small class="text-danger pl-1">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="kontak" class="col-sm-2 col-form-label">Nama Pekerjaan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="kontak" name="nama_pekerjaan" value="<?= $detail_lowongan['nama_pekerjaan']; ?>" readonly>
                    <?= form_error('kontak', '<small class="text-danger pl-1">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="kontak" class="col-sm-2 col-form-label">Bidang</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="bidang" name="bidang" value="<?= $detail_lowongan['bidang']; ?>" readonly>
                    <?= form_error('kontak', '<small class="text-danger pl-1">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="kontak" class="col-sm-2 col-form-label">Jenis</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="jenis" name="jenis" value="<?= $detail_lowongan['jenis']; ?>" readonly>
                    <?= form_error('kontak', '<small class="text-danger pl-1">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="kontak" class="col-sm-2 col-form-label">Deskripsi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?= $detail_lowongan['deskripsi']; ?>" readonly>
                    <?= form_error('kontak', '<small class="text-danger pl-1">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="kontak" class="col-sm-2 col-form-label">Curiculum Vitae</label>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('assets/pdf/') . $lamar['cv'] ?>" class="img-thumbnail">
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="cv" name="cv">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                            <!-- <?= form_error('cv', '<small class="text-danger pl-1">', '</small>'); ?> -->
                        </div>

                    </div>
                </div>

            </div>
            <div class="form-group">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Apply</button>
                </div>
            </div>
        </div>



    </div>




    </form>

</div>
</div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->