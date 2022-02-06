<div class="content-wrapper">
   <section class="content-header">
      <h1>
         Pegawai &
         <small>Investor</small>
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

               <h3 class="box-title">Pasien</h3>
               </div>
               <div class="box-body">
                  <div class="table-responsive">
                  <table class="table table-bordered">
                     <thead>
                        <tr>
                           <th width="1%">NO</th>
                           <th>Nama</th>
                           <th width="10%">OPSI</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           $no = 1;
                           foreach($pasien as $p){
                         ?>
                        <tr>
                           <td><?php echo
                              $no++; ?></td>
                           <td><?php echo $p->pengguna_nama; ?></td>
                           <td>
                              <a
                                 href="<?php echo base_url().'dashboard/pasien_periksa/'.$p->pengguna_id; ?>" class="btn btn-success
                                 btnsm"> <i class="fa fa-plus"></i> Periksa </a>
                           </td>
                        </tr>
                        <?php } ?>
                     </tbody>
                  </table>
               </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>