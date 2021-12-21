<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div> 

    <div class="row">

        <div class="col-sm-6 col-lg-6 mb-4">
            <div class="card mb-4">

                <div class="card-body">

                    <div class="form-group">
                        <label>Harga Undangan</label>
                        <input id="harga" type="text" class="form-control" placeholder="Contoh : 10000" value="<?= $setting[0]->harga ?>" required>
                    </div>
                    <hr>
                    <label>Rekening Pembayaran</label>
                    <div class="form-group mt-2">
                        <label>Nama Bank</label>
                        <input id="bank" class="form-control" placeholder="Contoh : Bank BCA" value="<?= $setting[0]->nama_bank ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Nomor Rekening</label>
                        <input id="norek" type="text" class="form-control" placeholder="Contoh : 1635713513" value="<?= $setting[0]->norek ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Nama Pemilik Bank</label>
                        <input id="nama" type="text" class="form-control" placeholder="Contoh : Adinda Larasati" value="<?= $setting[0]->nama_pemilik ?>" required>
                    </div>
                    
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalSetting1">Simpan</button>
                </div>
            </div>
        </div>
<div class="col-sm-6 col-lg-6 mb-4">
            <div class="card mb-4">
                <div class="card-body">

                    <label>Setting Undangan</label>
                    <div class="form-group">
                        <label>Waktu Trial Undangan (hari)</label>
                        <input id="trial" type="number" class="form-control" value="<?= $setting[0]->trial ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Masa Aktif Undangan (hari)</label>
                        <input id="aktif" type="number" class="form-control" value="<?= $setting[0]->aktif ?>" required>
                    </div>
                    <hr>
                    <label>Contact Admin</label>
                    <div class="form-group">
                        <label>No Whatsapp</label>
                        <input id="no_wa" type="text" class="form-control" placeholder="contoh : 628xxxxxx" value="<?= $setting[0]->no_wa ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Pesan Whatsapp</label>
                        <textarea id="pesan_wa" class="form-control" required><?= $setting[0]->pesan_wa ?></textarea>
                    </div>


                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalSetting2">Simpan</button>
                </div>
            </div>
        </div>

     
    </div>
    
    <!--Row-->
</div>

<!-- Modal -->
<div class="modal fade" id="modalSetting1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah kamu yakin ingin menyimpan perubahan ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" id="simpanSetting1">Ya</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modalSetting2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah kamu yakin ingin menyimpan perubahan ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" id="simpanSetting2">Ya</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>

<script>
$('#simpanSetting1').on('click', function(event) {

var harga = $('#harga').val();
var bank = $('#bank').val();
var nama = $('#nama').val();
var norek = $('#norek').val();
$.ajax({
    url : "<?= base_url('admin/update_setting1') ?>",
    method : "POST",
    data : {harga: harga,bank: bank, nama: nama,norek:norek},
    async : true,
    dataType : 'html',
    success: function($hasil){
        if($hasil == 'sukses'){
            location.reload();
        }
    }
});

});
$('#simpanSetting2').on('click', function(event) {

var trial = $('#trial').val();
var aktif = $('#aktif').val();
var no_wa = $('#no_wa').val();
var pesan_wa = $('#pesan_wa').val();
$.ajax({
    url : "<?= base_url('admin/update_setting2') ?>",
    method : "POST",
    data : {trial:trial, aktif:aktif, no_wa:no_wa, pesan_wa:pesan_wa},
    async : true,
    dataType : 'html',
    success: function($hasil){
        if($hasil == 'sukses'){
            location.reload();
        }
    }
});

});
</script>