<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="row">
        <div class="col-lg-8">
            <?php echo form_open_multipart('perusahaan/addjob'); ?>

            <div class="form-group row">
                <label for="nama_pekerjaan" class="col-sm-2 col-form-label">Nama Pekerjaan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_pekerjaan" name="nama_pekerjaan">
                    <?= form_error('nama_pekerjaan', '<small class="text-danger pl-1">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="bidang" class="col-sm-2 col-form-label">Bidang Pekerjaan</label>
                <div class="col-sm-10">
                    <select class="form-control" id="bidang" name="bidang">
                        <option>Pilih Bidang</option>
                        <?php foreach ($bidang as $b) : ?>
                            <option value="<?= $b['id_bidang']; ?>"><?= $b['nama_bidang']; ?></option>
                            <?php ?>
                        <?php endforeach;   ?>
                    </select>
                    <?= form_error('bidang ', '<small class="text-danger pl-1">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="jenis" class="col-sm-2 col-form-label">Jenis Pekerjaan</label>
                <div class="col-sm-10">
                    <select class="form-control" id="jenis" name="jenis">
                        <option>Pilih Jenis</option>
                        <?php foreach ($jenis as $j) : ?>
                            <option value="<?= $j['id_jenis']; ?>"><?= $j['jenis_pekerjaan']; ?></option>
                            <?php ?>
                        <?php endforeach;   ?>
                    </select>
                    <?= form_error('jenis', '<small class="text-danger pl-1">', '</small>'); ?>
                </div>
            </div>

           
        <div class="form-group row">
                <label for="gaji" class="col-sm-2 col-form-label">Gaji</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="gaji" name="gaji">
                    <?= form_error('gaji', '<small class="text-danger pl-1">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi Pekerjaan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="deskripsi" name="deskripsi">
                    <?= form_error('deskripsi', '<small class="text-danger pl-1">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Tambah</button>
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