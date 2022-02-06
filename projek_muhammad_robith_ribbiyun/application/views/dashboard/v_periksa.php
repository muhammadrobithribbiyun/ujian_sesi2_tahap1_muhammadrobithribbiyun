<div class="content-wrapper">
   <section class="content-header">
      <h1>
         Rekam Riwayat
         <small>Medik</small>
      </h1>
   </section>
   <section class="content">
      <div class="row">
         <div class="col-lg-6">
            <a href="<?php echo base_url().'dashboard/pasien'; ?>" class="btn btn-sm btn-primary">Kembali</a>
            <br/>
            <br/>
             <?php
               if(isset($_GET['alert'])){
                  if($_GET['alert']=="gagal"){
                     echo "<div class='alert alert-danger font-weight-bold text-center'>Gagal Edit Penyakit.</div>";
                  }
               }
               ?>
            <div class="box box-primary">
               <div class="box-header">
                  <h3 class="box-title">Rekam Medik</h3>
               </div>
               <div class="box-body">
                  <?php foreach($periksa as $p){ ?>
                  <form method="post" action="<?php echo base_url('dashboard/pasien_aksi') ?>">
                     <div class="box-body">
                        <div class="form-group">
                           <label>Nama Pasien</label>
                           <input type="hidden" name="id2" value="<?php echo $p->pengguna_id; ?>">
                           <input type="text" name="nama" class="form-control" placeholder="Masukkan nama pengguna .." value="<?php echo $p->pengguna_nama; ?>" disabled>
                           <?php echo form_error('nama'); ?>
                        </div>
                        
                        <div class="form-group">
                           <label>Penyakit</label>
                         <select class="form-control" name="penyakit"required>
                              <option value="">- Penyakit</option>
                              <?php foreach($penyakit as $k){ ?>
                                 <option <?php if(set_value('penyakit') == $k->penyakit_id){echo "selected='selected'";} ?> value="<?php echo $k->penyakit_id ?>">
                                    <?php echo $k->penyakit_nama; ?>
                                 </option>
                              <?php } ?>
                           </select>
                           <?php echo
                           form_error('penyakit'); ?>
                        </div>
                         <div class="form-group">
                           <label>Tindakan</label>
                           <input type="text" name="tindakan" class="form-control" placeholder="Tindakan Yang Dianbil .." required="" >
                           <?php echo form_error('tindakan'); ?>
                        </div>
                         <div class="form-group">
                           <label>Resep Obat</label>
                           <input type="text" name="obat" class="form-control" placeholder="Resep Obat .." required="" >
                           <input type="hidden" name="status" class="form-control"  value="belum" required="" >
                           <?php echo form_error('obat'); ?>
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