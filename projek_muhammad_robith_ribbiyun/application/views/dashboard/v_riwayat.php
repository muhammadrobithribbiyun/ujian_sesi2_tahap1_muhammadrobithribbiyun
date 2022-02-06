 <?php 
if($this->session->userdata('level') == "dokter"){ ?>
<div class="content-wrapper">
   <section class="content-header">
      <h1>
         Rekam
         <small>Medik</small>
      </h1>
   </section>
   <section class="content">
      <div class="row">
         <div class="col-lg-12">
            <br/>
            <br/>
             <?php
               if(isset($_GET['alert'])){
                  if($_GET['alert']=="done"){
                     echo "<div class='alert alert-success font-weight-bold text-center'>Berhasil Merekam.</div>";
                  }else if($_GET['alert']=="update"){
                     echo "<div class='alert alert-success font-weight-bold text-center'>Berhasil Mengedit Penyakit.</div>";
                  }else if($_GET['alert']=="done2"){
                     echo "<div class='alert alert-danger font-weight-bold text-center'>Berhasil Menghapus.</div>";
                  }
               }
               ?>
            <div class="box box-primary">
               <div class="box-header">

               <h3 class="box-title">Pasien Yang Ditangani</h3>
               </div>
               <div class="box-body">
                  <div class="table-responsive">
                  <table class="table table-bordered">
                     <thead>
                        <tr>
                           <th width="1%">NO</th>
                           <th>Nama Pasien</th>
                           <th>Penyakit</th>
                           <th>Tindakan</th>
                           <th>Resep</th>
                           
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           $no = 1;
                           foreach($riwayat as $p){
                           
                              if($this->session->userdata('id') ==  $p->riwayat_dokter){
                           ?>
                        <tr>
                           <td><?php echo
                              $no++; ?></td>
                           <td><?php echo $p->pengguna_nama; ?></td>
                           <td><?php echo $p->penyakit_nama; ?></td>
                           <td><?php echo $p->riwayat_tindakan; ?></td>
                           <td><?php echo $p->riwayat_resep; ?></td>
                           
                        </tr>
                        <?php } }?>
                     </tbody>
                  </table>
               </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
<?php } ?>


<?php 
if($this->session->userdata('level') == "pasien"){ ?>
<div class="content-wrapper">
   <section class="content-header">
      <h1>
         Rekam
         <small>Medik</small>
      </h1>
   </section>
   <section class="content">
      <div class="row">
         <div class="col-lg-12">
            <br/>
            <br/>
            <div class="box box-primary">
               <div class="box-header">

               <h3 class="box-title">Data Periksa Saya</h3>
               </div>
               <div class="box-body">
                  <div class="table-responsive">
                  <table class="table table-bordered">
                     <thead>
                        <tr>
                           <th width="1%">NO</th>
                           <th>Nama Dokter</th>
                           <th>Penyakit</th>
                           <th>Tindakan</th>
                           <th>Resep</th>
                           <th >Status</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           $no = 1;
                           foreach($pasien as $p){
                              if($this->session->userdata('id') ==  $p->riwayat_pasien){
                           ?>
                        <tr>
                           <td><?php echo
                              $no++; ?></td>
                           <td><?php echo $p->pengguna_nama; ?></td>
                           <td><?php echo $p->penyakit_nama; ?></td>
                           <td><?php echo $p->riwayat_tindakan; ?></td>
                           <td><?php echo $p->riwayat_resep; ?></td>
                           <td>
                              <?php
                                    if($p->riwayat_status=="lunas"){
                                       echo "<span class='label label-success'>Lunas</span>";
                                    }else{
                                       echo "<span class='label label-warning'>Harap Selesaikan Administrasi</span>";
                                    }
                                    ?>
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
<?php } ?>