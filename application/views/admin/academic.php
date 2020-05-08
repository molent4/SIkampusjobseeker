<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <!-- fakultas -->
    <div class="rom">
        <div class="col-lg-6">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newfakultas">Add New Faculty</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ID</th>
                        <th scope="col">Fakultas</th>
                        <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($fakultas as $fkl) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $fkl['id_fakultas']; ?></td>
                            <td><?= $fkl['fakultas']; ?></td>

                        </tr>
                        <?php $i++; ?>
                    <?php endforeach;   ?>
                </tbody>
            </table>
        </div>
        <!-- jurusan -->
        <div class="col-lg-6">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newjurusanModal">Add New Course</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Fakultas</th>
                        <th scope="col">Jurusan</th>
                        <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($fakjur as $fj) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $fj['fakultas']; ?></td>
                            <td><?= $fj['jurusan']; ?></td>
                            <td></td>


                        </tr>
                        <?php $i++; ?>
                    <?php endforeach;   ?>
                </tbody>
            </table>
        </div>
        <!-- semester -->
        <div class="col-lg-6">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newsmtModal">Add New Semester</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Semester</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($semester as $s) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $s['semester']; ?></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach;   ?>
                </tbody>
            </table>
        </div>
        <!-- BIDANG -->
<div class="rom">
    <div class="col-lg-6">
        <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <?= $this->session->flashdata('message'); ?>
        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newbidangModal">Add New Bidang</a>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">bidang</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($nama_bidang as $bd) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $bd['nama_bidang']; ?></td>
                        <td></td>

                    </tr>
                    <?php $i++; ?>
                <?php endforeach;   ?>
            </tbody>
        </table>
    </div>
</div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<!-- Button trigger modal -->


<!-- Modal -->
<!-- modal fakultas -->
<div class="modal fade" id="newfakultas" tabindex="-1" role="dialog" aria-labelledby="newfakultasModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newfakultasModalLabel">Add New Fakultas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/fakultas'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">

                        <input type="text" class="form-control" id="fakultas" name="fakultas" placeholder="Faculty">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Faculty</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- modal jurusan -->
<div class="modal fade" id="newjurusanModal" tabindex="-1" role="dialog" aria-labelledby="newjurusanModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newjurusanModalLabel">Add New Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/jurusan'); ?>" method="post">
                <div class="modal-body">
                    <div class="from-group mb-3">
                        <select name="fakultas" id="fakultas" class="form-control">
                            <option value="">Select Faculty</option>
                            <?php foreach ($fakultas as $f) :  ?>
                                <option value="<?= $f['id_fakultas']; ?>"><?= $f['fakultas']; ?> </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="jurusan">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Course</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- modal smt -->
<div class="modal fade" id="newsmtModal" tabindex="-1" role="dialog" aria-labelledby="newsmtModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newsmtModalLabel">Add New Semester</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/semester'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="semester" name="semester" placeholder="e.g 1 - 8">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Course</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- modal bidang -->
<div class="modal fade" id="newbidangModal" tabindex="-1" role="dialog" aria-labelledby="newbidangModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newbidangModalLabel">Add New Bidang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/bidang'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama_bidang" name="nama_bidang" placeholder="bidang">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add new bidang</button>
                </div>
            </form>
        </div>
    </div>
</div>