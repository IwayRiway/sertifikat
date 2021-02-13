<!-- Main Content -->
<div class="main-content">
<section class="section">
    <div class="section-header">
    <h1><?=$judul?></h1>
        <div class="section-header-button">
            <a href="<?=base_url('sertifikat_karyawan/create')?>" class="btn btn-primary">Add New</a>
        </div>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#"><?=$judul?></a></div>
        </div>
    </div>

    <div class="section-body">
        
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <div class="input-group">
                            <input id="keyword" type="text" class="form-control" name="keyword" tabindex="1" required autofocus>
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button" id="search">Search</button>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                        <div id="buttons2" style="padding: 10px; margin-bottom: 10px;width: 25%;">
                            <p>Download :</p>
                        </div>
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Sertifikat</th>
                                        <th>Aksi</th>
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


    </div>

</section>
</div>

<script>
function alertErr(gagal) {
      Swal.fire({
        position: 'center',
        icon: 'error',
        title: 'Gagal',
        text: gagal,
        showConfirmButton: true
      //   timer: 2500
      })
   }

   function hapus(params) {
    Swal.fire({
        title: 'Yakin?',
        text: "Data ini Akan dihapus..?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yakin!',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.value) {
          document.location.href = params;
        }
      })
   }

    $(document).ready(function() {
        var table2 = $('#example').DataTable();

        $("#search").click(function(){
            var keyword = $("#keyword").val();

            if(keyword === ''){
               alertErr("SILAHKAN MASUKKAN DATA YANG INGIN DICARI");
            }

            $.ajax({
               url:"<?= base_url('sertifikat_karyawan/search')?>",
               type:"POST",
               dataType: 'json',
               data:{keyword:keyword},
               success:function(data){
                  if(data.length <= 0){
                     alertErr("DATA TIDAK DITEMUKAN");
                  }

                  var r = 1;
                  table2.clear();
                  $.each(data, function (i, key) {
                     var aksi = `<a href="#" class="btn btn-icon btn-sm btn-danger mr-2" onclick='hapus("<?=base_url('sertifikat_karyawan/delete/')?>`+data[i].sertifikat_karyawan_id+`")' title="Delete"><i class="fas fa-trash"></i></a>`;

                     table2.row.add([
                        r++,
                        data[i].nama,
                        aksi
                     ]);
                     table2.draw();
                  });
               }
            });

        });

        var buttons2 = new $.fn.dataTable.Buttons(table2, {
            buttons: [{
                extend: 'excelHtml5',
                title: 'Daftar Sertifikat Karyawan',
                text: '<i class="fas fa-file-excel"></i>&nbsp; EXCEL',
                className: 'btn btn-success btn-sm btn-corner',
                titleAttr: 'Download as Excel'
            },{
                extend: 'pdfHtml5',
                title: 'Daftar Sertifikat Karyawan',
                orientation: 'potrait',
                pageSize: 'A4',
                className: 'btn btn-danger btn-sm btn-corner',
                text: '<i class="fas fa-file-pdf"></i>&nbsp; PDF',
                titleAttr: 'Download as PDF',
            }, ],
        }).container().appendTo($('#buttons2'));
    });
</script>
