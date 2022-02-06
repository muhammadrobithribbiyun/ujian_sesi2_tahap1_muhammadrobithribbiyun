<div class="content-wrapper">
   <section class="content-header">
      <h1>
         Pengguna
         <small>Akun</small>
      </h1>
   </section>
   <section class="content">
      <div class="row">
         <div class="col-lg-12">
            <a href="<?php echo base_url().'dashboard/pengguna_tambah'; ?>"
               class="btn btn-sm btn-primary">Buat pengguna baru</a>
            <br/>
            <br/>
             <?php
               if(isset($_GET['alert'])){
                  if($_GET['alert']=="done"){
                     echo "<div class='alert alert-danger font-weight-bold text-center'>Berhasil Menghapus Pengguna.</div>";
                  }
               }
               ?>
            <div class="box box-primary">
               <div class="box-header">

               <h3 class="box-title">Dokter</h3>
               </div>
               <div class="box-body">
                  <div class="table-responsive">
                  <table class="table table-bordered">
                     <thead>
                        <tr>
                           <th width="1%">NO</th>
                           <th>Nama</th>
                           <th>Email</th>
                           <th>Username</th>
                           <th>Level</th>
                           <th>Status</th>
                           <th width="10%">OPSI</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           $no = 1;
                           foreach($pengguna as $p){
                              if ($p->pengguna_level == "dokter") {
                           ?>
                        <tr>
                           <td><?php echo
                              $no++; ?></td>
                           <td><?php echo $p->pengguna_nama; ?></td>
                           <td><?php echo $p->pengguna_email; ?></td>
                           <td><?php echo $p->pengguna_username; ?></td>
                           <td><?php echo $p->pengguna_level; ?></td>
                           <td>
                              <?php
                                 if($p->pengguna_status == 1){
                                 echo "Aktif";
                                 }else{
                                 echo "Non Aktif";
                                 }
                                 ?>
                           </td>
                           <td>
                              <a
                                 href="<?php echo base_url().'dashboard/pengguna_edit/'.$p->pengguna_id; ?>" class="btn btn-warning
                                 btnsm"> <i class="fa fa-pencil"></i> </a>
                              <a
                                 href="<?php echo base_url().'dashboard/pengguna_hapus/'.$p->pengguna_id; ?>" class="btn btn-danger
                                 btn-sm"> <i class="fa fa-trash"></i> </a>
                           </td>
                        </tr>
                        <?php }} ?>
                     </tbody>
                  </table>
               </div>
               </div>
            </div>
            <div class="box box-primary">
               <div class="box-header">

               <h3 class="box-title">Pegawai</h3>
               </div>
               <div class="box-body">
                  <div class="table-responsive">
                  <table class="table table-bordered">
                     <thead>
                        <tr>
                           <th width="1%">NO</th>
                           <th>Nama</th>
                           <th>Email</th>
                           <th>Username</th>
                           <th>Level</th>
                           <th>Status</th>
                           <th width="10%">OPSI</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           $no = 1;
                           foreach($pengguna as $p){
                              if ($p->pengguna_level == "pegawai") {
                           ?>
                        <tr>
                           <td><?php echo
                              $no++; ?></td>
                           <td><?php echo $p->pengguna_nama; ?></td>
                           <td><?php echo $p->pengguna_email; ?></td>
                           <td><?php echo $p->pengguna_username; ?></td>
                           <td><?php echo $p->pengguna_level; ?></td>
                           <td>
                              <?php
                                 if($p->pengguna_status == 1){
                                 echo "Aktif";
                                 }else{
                                 echo "Non Aktif";
                                 }
                                 ?>
                           </td>
                           <td>
                              <a
                                 href="<?php echo base_url().'dashboard/pengguna_edit/'.$p->pengguna_id; ?>" class="btn btn-warning
                                 btnsm"> <i class="fa fa-pencil"></i> </a>
                              <a
                                 href="<?php echo base_url().'dashboard/pengguna_hapus/'.$p->pengguna_id; ?>" class="btn btn-danger
                                 btn-sm"> <i class="fa fa-trash"></i> </a>
                           </td>
                        </tr>
                        <?php }} ?>
                     </tbody>
                  </table>
               </div>
               </div>
            </div>
               <div class="box box-primary">
               <div class="box-header">

               <h3 class="box-title">Pasien</h3>
               </div>
               <div class="box-body">
                  <div class="table-responsive">
                  <table class="table table-bordered">
                     <thead>
                        <tr>
                           <th width="1%">NO</th>
                           <th>Nama</th>
                           <th>Email</th>
                           <th>Username</th>
                           <th>Level</th>
                           <th>Status</th>
                           <th width="10%">OPSI</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           $no = 1;
                           foreach($pengguna as $p){
                              if ($p->pengguna_level == "pasien") {
                           ?>
                        <tr>
                           <td><?php echo
                              $no++; ?></td>
                           <td><?php echo $p->pengguna_nama; ?></td>
                           <td><?php echo $p->pengguna_email; ?></td>
                           <td><?php echo $p->pengguna_username; ?></td>
                           <td><?php echo $p->pengguna_level; ?></td>
                           <td>
                              <?php
                                 if($p->pengguna_status == 1){
                                 echo "Aktif";
                                 }else{
                                 echo "Non Aktif";
                                 }
                                 ?>
                           </td>
                           <td>
                              <a
                                 href="<?php echo base_url().'dashboard/pengguna_edit/'.$p->pengguna_id; ?>" class="btn btn-warning
                                 btnsm"> <i class="fa fa-pencil"></i> </a>
                              <a
                                 href="<?php echo base_url().'dashboard/pengguna_hapus/'.$p->pengguna_id; ?>" class="btn btn-danger
                                 btn-sm"> <i class="fa fa-trash"></i> </a>
                           </td>
                        </tr>
                        <?php }} ?>
                     </tbody>
                  </table>
               </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>