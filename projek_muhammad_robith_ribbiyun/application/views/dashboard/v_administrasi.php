<div class="content-wrapper">
   <section class="content-header">
      <h1>
         Data
         <small>Administrasi</small>
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
                     echo "<div class='alert alert-success font-weight-bold text-center'>Pembayaran Berhasil.</div>";
                  }               
               }
               ?>
            <div class="box box-primary">
               <div class="box-header">

               <h3 class="box-title">Pembayaran</h3>
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
                           <th >Status</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           $no = 1;
                           foreach($pasien as $p){
                              if ($p->riwayat_status == "belum") {
                                 
                              
                           ?>
                        <tr>
                           <td><?php echo
                              $no++; ?></td>
                           <td><?php echo $p->pengguna_nama; ?></td>
                           <td><?php echo $p->penyakit_nama; ?></td>
                           <td><?php echo $p->riwayat_tindakan; ?></td>
                           <td><?php echo $p->riwayat_resep; ?></td>
                           <td>
                              <a href="<?php echo base_url().'dashboard/administrasi/'.$p->riwayat_id; ?>">
                              <?php
                                    if($p->riwayat_status=="belum"){
                                       echo "<span class='label label-primary'>Pembayaran</span>";
                                    }
                                    ?></a>
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

               <h3 class="box-title">Data Administrasi</h3>
               </div>
               <div class="box-body">
                  <div class="table-responsive">
                  <table class="table table-bordered">
                     <thead>
                        <tr>
                           <th width="1%">NO</th>
                           <th>Pegawai Administrasi</th>
                           <th>Kode Rekam Medik</th>
                           <th>Tindakan</th>
                           <th>Total Biaya</th>
                           <th >Status</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           $no = 1;
                           foreach($administrasi as $p){
                              if ($p->riwayat_status=="lunas") {
         
                           ?>
                        <tr>
                           <td><?php echo
                              $no++; ?></td>
                           <td><?php echo $p->pengguna_nama; ?></td>
                           <td><?php echo $p->riwayat_id; ?></td>
                           <td><?php echo $p->riwayat_tindakan; ?></td>
                           <td><?php echo $p->pembayaran_total; ?></td>
                           <td>
                             
                              <?php
                                    if($p->riwayat_status=="lunas"){
                                       echo "<span class='label label-success'>Lunas</span>";
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
