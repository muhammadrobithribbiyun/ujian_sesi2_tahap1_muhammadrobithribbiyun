<div class="content-wrapper">
   <section class="content-header">
      <h1>
         Rekam
         <small>Administrasi</small>
      </h1>
   </section>
   <section class="content">
      <div class="row">
         <div class="col-lg-6">
            <a href="<?php echo base_url().'dashboard/pembayaran'; ?>" class="btn btn-sm btn-primary">Kembali</a>
            <br/>
            <br/>
            <div class="box box-primary">
               <div class="box-header">
                  <h3 class="box-title">Pembayaran</h3>
               </div>
               <div class="box-body">
                  <?php foreach($administrasi as $p){ ?>
                  <form method="post" action="<?php echo base_url('dashboard/administrasi_aksi') ?>">
                     <div class="box-body">
                        <div class="form-group">
                           <label>Nama Pasien</label>
                           <input type="hidden" name="id2" value="<?php echo $p->riwayat_id; ?>">
                           <input type="text" name="nama" class="form-control" value="<?php echo $p->pengguna_nama; ?>" disabled>
                           <?php echo form_error('nama'); ?>
                        </div>
                        <div class="form-group">
                           <label>Tindakan</label>
                           <input type="text" name="tindakan" class="form-control" value="<?php echo $p->riwayat_tindakan; ?>" disabled>
                           <?php echo form_error('tindakan'); ?>
                        </div>
                        <div class="form-group">
                           <label>Tindakan</label>
                           <input type="text" name="tindakan" class="form-control" value="<?php echo $p->riwayat_resep; ?>" disabled>
                        <input type="hidden" name="status" class="form-control" value="lunas" >
                           <?php echo form_error('tindakan'); ?>
                        </div>
                        <div class="form-group">
                           <label>Total Pembayaran</label>
                        <input type="text" name="bayar" class="form-control" placeholder="Total Pembayaran contoh: (1000000)" required="">
                           <?php echo form_error('bayar'); ?>
                        </div>
                        
                        
                     </div>
                     <div class="box-footer">
                        <input type="submit"
                           class="btn btn-success" value="Rekam">
                     </div>
                  </form>
                  <?php } ?>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>