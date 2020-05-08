<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    
    <div class="rom">
        <div class="col-lg-6">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
			 <?php
 
				header("Content-type: application/vnd-ms-excel");
				
				header("Content-Disposition: attachment; filename=$title.xls");
				
				header("Pragma: no-cache");
				
				header("Expires: 0");
				
				?>
            <a href="perusahaan/employe" class="btn btn-primary mb-3" name="exporthis" id="exporthis">Back</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">NIM Pelamar</th>
                        <th scope="col">Nama Pelamar</th>
                        <th scope="col">Email Pelamar</th>
                        <th scope="col">ID perusahaan</th>
                        <th scope="col">Nama Pekerjaan</th>
                        <th scope="col">CV</th>
                      

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($emp as $e) : ?>
                        <?php if( $e['id_perusahaan'] != $perusahaan['id_perusahaan'] ) : ?>
                            <?php continue; ?>
                        <?php endif; ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $e['nim']; ?></td>
                            <td><?= $e['nama']; ?></td>
                            <td><?= $e['email']; ?></td>
                            <td><?= $e['id_perusahaan']; ?></td>
                            <td><?= $e['nama_pekerjaan']; ?></td>
                            <td><?= $e['cv']; ?></td>
                     

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