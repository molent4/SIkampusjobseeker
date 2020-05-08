<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
    <?= $this->session->flashdata('message'); ?>
    <div class="row">
        <div class="col-lg-8">

            <?= form_open_multipart('mahasiswa/edit'); ?>

            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $mahasiswa['nama']; ?>">
                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="nim" class="col-sm-2 col-form-label">nim</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nim" name="nim" value="<?= $mahasiswa['nim']; ?>">
                    <?= form_error('nim', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="tmpt_lahir" class="col-sm-2 col-form-label">tanggal_lahir</label>
                <div class="col-sm-8">
                    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= date('d F Y', $mahasiswa['tgl_lahir']); ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="tmpt_lahir" class="col-sm-2 col-form-label">tempat_lahir</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="tmpt_lahir" name="tmpt_lahir" value="<?= $mahasiswa['tmpt_lahir']; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="fakultas" class="col-sm-2 col-form-label">fakultas</label>
                <div class="col-sm-10">
                    <select name="fakultas" id="fakultas" class="form-control">
                        <option value="">Select Faculty</option>
                        <?php foreach ($fakultas as $fkl) : ?>
                            <option value="<?= $fkl['id_fakultas']; ?>"><?= $fkl['fakultas']; ?></option>
                            <?php ?>
                        <?php endforeach;   ?>
                    </select>
                    <?= form_error('fakultas', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="jurusan" class="col-sm-2 col-form-label">jurusan</label>
                <div class="col-sm-10">
                    <select name="jurusan" id="jurusan" class="form-control">
                        <option value="">Select Course</option>
                        <?php foreach ($jurusan as $j) : ?>
                            <option value="<?= $j['id_jurusan']; ?>"><?= $j['jurusan']; ?></option>
                            <?php ?>
                        <?php endforeach;   ?>
                    </select>
                    <?= form_error('jurusan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="semester" class="col-sm-2 col-form-label">semester</label>
                <div class="col-sm-10">
                    <select name="semester" id="semester" class="form-control">
                        <option value="">Select Semester</option>
                        <?php foreach ($semester as $s) : ?>
                            <option value="<?= $s['id_semester']; ?>" ><?= $s['semester']; ?></option>
                            <?php ?>
                        <?php endforeach;   ?>
                    </select>
                    <?= form_error('semester', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="no_hp" class="col-sm-2 col-form-label">no hand phone</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $mahasiswa['no_hp']; ?>">
                    <?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="alamat" class="col-sm-2 col-form-label">alamat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $mahasiswa['alamat']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2">picture</div>
                <div class="col sm 10">
                    <div class="row">
                        <div class="col sm 3">
                            <img src="<?= base_url('assets/img/profile/mahasiswa/') . $mahasiswa['foto'] ?>" class="img-thumbnail">
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

            <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">edit</button>
                </div>
            </div>


            </form>

        </div>
    </div>




</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->