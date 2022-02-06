<div class="content-wrapper">
   <section class="content-header">
      <h1>
         Penyakit
         <small>Tambah </small>
      </h1>
   </section>
   <section class="content">
      <div class="row">
         <div class="col-lg-6">
            <a href="<?php echo base_url().'dashboard/penyakit'; ?>" class="btn
               btn-sm btn-primary">Kembali</a>
            <br/>
            <br/>
            <div class="box box-primary">
               <div class="box-header">
                  <h3 class="box-title">Penyakit</h3>
               </div>
               <div class="box-body">
                  <form method="post" action="<?php echo
                     base_url('dashboard/penyakit_aksi') ?>">
                     <div class="box-body">
                        <div class="form-group">
                           <label>Nama Penyakit</label>
                           <input type="text"
                              name="nama" class="form-control" placeholder="Masukkan nama penyakit ..">
                           <?php echo
                              form_error('nama'); ?>
                        </div>
                        <div class="form-group">
                           <label>Keterangan Penyakit</label>
                           <input type="text"
                              name="ket" class="form-control" placeholder="Keterangan Penyakit( seperti Gejala dll) ..">
                           <?php echo
                              form_error('ket'); ?>
                        </div>
                      
                       
                       
                     </div>
                     <div class="box-footer">
                        <input type="submit" class="btn btn-success" value="Simpan">
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>