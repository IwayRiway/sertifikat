<!-- Main Content -->
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Add Sertifikat Karyawan</h1>
             <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Add Sertifikat Karyawan</a></div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="<?=base_url('sertifikat_karyawan/save')?>" enctype="multipart/form-data">
                            
                                <div class="row">
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <label>Pilih Karyawan</label>
                                    <select class="form-control select2" name='karyawan_id' id='karyawan_id' required>
                                    <option value="" disabled selected>Pilih Karyawan</option>
                                    <?php foreach($karyawan as $db):?>
                                      <option value="<?=$db['id']?>|<?=$db['nik']?>|<?=$db['divisi']?>"><?=$db['nik']?> - <?=$db['nama']?></option>
                                      <?php endforeach?>
                                    </select> 
                                  </div>

                                  <div class="row">
                                      <div class="form-group col-sm-12">
                                      <label for="nik">NIK</label>
                                      <input id="nik" type="text" class="form-control" name="nik" required readonly>
                                      </div>
                                  </div>

                                  <div class="row">
                                      <div class="form-group col-sm-12">
                                      <label for="divisi">Divisi</label>
                                      <input id="divisi" type="text" class="form-control" name="divisi" required readonly>
                                      </div>
                                  </div>
                                  
                                </div>
                                
                                <div class="col-sm-6">
                                      <div class="row">
                                        <div class="col-sm-12">
                                          <p><strong>Pilih Sertifikat</strong></p>
                                            <div class="table-responsive">
                                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                          <th>
                                                            <div class="custom-checkbox custom-control">
                                                              <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                                              <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                                            </div>
                                                          </th>
                                                            <th>Nama Sertifikat</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                      </div>
                                </div>

                                </div>

                                <div class="card-footer text-center">
                                 <button class="btn btn-primary mr-1" type="submit">Simpan</button>
                                 <a href="<?=base_url('sertifikat_karyawan')?>" class="btn btn-danger">Batal</a>
                              </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </section>
      </div>
      
  <script>
    $(document).ready(function() {
      $('#example').DataTable();
      
      $("#checkbox-all").click(function(){
        $('input:checkbox').not(this).prop('checked', this.checked);
      });

        $( "#karyawan_id" ).change(function() {
          var karyawan_id = $('#karyawan_id').val().split("|");
          $("#nik").val(karyawan_id[1]);
          $("#divisi").val(karyawan_id[2]);

          $.ajax({
                url:"<?= base_url('sertifikat_karyawan/getSertikat')?>",
                type:"POST",
                dataType: 'json',
                data:{id:karyawan_id[0]},
                success:function(data){
                  console.log(data);
                }
          });

        });
    });
  </script>