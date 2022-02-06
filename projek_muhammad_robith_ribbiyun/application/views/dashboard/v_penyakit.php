<div class="content-wrapper">
   <section class="content-header">
      <h1>
         List
         <small>Penyakit</small>
      </h1>
   </section>
   <section class="content">
      <div class="row">
         <div class="col-lg-12">
            <a href="<?php echo base_url().'dashboard/penyakit_tambah'; ?>"
               class="btn btn-sm btn-primary">Tambah Daftar Penyakit</a>
            <br/>
            <br/>
             <?php
               if(isset($_GET['alert'])){
                  if($_GET['alert']=="done"){
                     echo "<div class='alert alert-success font-weight-bold text-center'>Berhasil Menginput Penyakit.</div>";
                  }else if($_GET['alert']=="update"){
                     echo "<div class='alert alert-success font-weight-bold text-center'>Berhasil Mengedit Penyakit.</div>";
                  }else if($_GET['alert']=="done2"){
                     echo "<div class='alert alert-danger font-weight-bold text-center'>Berhasil Menghapus.</div>";
                  }
               }
               ?>
            <div class="box box-primary">
               <div class="box-header">

               <h3 class="box-title">List Penyakit</h3>
               </div>
               <div class="box-body">
                  <div class="table-responsive">
                  <table class="table table-bordered">
                     <thead>
                        <tr>
                           <th width="1%">NO</th>
                           <th>Nama Penyakit</th>
                           <th>Keterangan</th>
                           <th width="10%">OPSI</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           $no = 1;
                           foreach($penyakit as $p){
                              
                           ?>
                        <tr>
                           <td><?php echo
                              $no++; ?></td>
                           <td><?php echo $p->penyakit_nama; ?></td>
                           <td><?php echo $p->penyakit_desc; ?></td>
                           <td>
                              <a
                                 href="<?php echo base_url().'dashboard/penyakit_edit/'.$p->penyakit_id; ?>" class="btn btn-warning
                                 btnsm"> <i class="fa fa-pencil"></i></a>
                              <a
                                 href="<?php echo base_url().'dashboard/penyakit_hapus/'.$p->penyakit_id; ?>" onclick="return confirm('Anda yakin mau Menghapus ini ?')" class="btn btn-danger
                                 btn-sm"> <i class="fa fa-trash"></i> </a>
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