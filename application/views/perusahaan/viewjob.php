<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    
    <div class="rom">
        <div class="col-lg-6">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
             <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Pekerjaan</th>
                        <th scope="col">Bidang Pekerjaan</th>
                        <th scope="col">Jenis Pekerjaan</th>
                        <th scope="col">Gaji</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($job_d as $jd) : ?>
                        <?php if( $jd['id_perusahaan'] != $perusahaan['id_perusahaan'] ) : ?>
                            <?php continue; ?>
                        <?php endif; ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $jd['nama_pekerjaan']; ?></td>
                            <td><?= $jd['nama_bidang']; ?></td>
                            <td><?= $jd['jenis_pekerjaan']; ?></td>
                            <td><?= $jd['gaji']; ?></td>
                            <td><?= $jd['deskripsi']; ?></td>
                            <td>
                                <a href="" class="badge badge-pill badge-success">edit</a>
                                <a href="" class="badge badge-pill badge-danger">delete</a>
                            </td>

                        </tr>
                        <?php $i++; ?>
                    <?php endforeach;   ?>
                </tbody>
            </table>
        </div>
    </div>





</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->