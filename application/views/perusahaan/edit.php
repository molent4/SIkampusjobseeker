<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="row">
        <div class="col-lg-8">
            <?php echo form_open_multipart('perusahaan/edit'); ?>

            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label for="nama_perusahaan" class="col-sm-2 col-form-label">Nama Perusahaan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" value="<?= $perusahaan['nama_perusahaan']; ?>">
                    <?= form_error('nama_perusahaan', '<small class="text-danger pl-1">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat Perusahaan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $perusahaan['alamat']; ?>">
                    <?= form_error('alamat', '<small class="text-danger pl-1">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="kontak" class="col-sm-2 col-form-label">Kontak Perusahaan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="kontak" name="kontak" value="<?= $perusahaan['kontak']; ?>">
                    <?= form_error('kontak', '<small class="text-danger pl-1">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="kontak" class="col-sm-2 col-form-label">Logo Perusahaan</label>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('assets/img/profile/perusahaan/') . $perusahaan['foto'] ?>" class="img-thumbnail">
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="form-group">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Edit</button>
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