
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>QR &mdash; Code</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?=base_url('assets/modules/bootstrap/css/bootstrap.min.css')?>">
  <link rel="stylesheet" href="<?=base_url('assets/modules/fontawesome/css/all.min.css')?>">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?=base_url('assets/modules/bootstrap-social/bootstrap-social.css')?>">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?=base_url('assets/css/style.css')?>">
  <link rel="stylesheet" href="<?=base_url('assets/css/components.css')?>">
<!-- Start GA -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-sm-10 offset-sm-1">
            <div class="login-brand">
              <img src="<?=base_url('assets/img/logo.png')?>" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
              <div class="card-header" style="flex-direction:'row'; justify-content:'space-between'">
                  <h4 style="flex:1">Search QR Code</h4>
                  <div style="width:50px">
                  <a href="<?=base_url('auth')?>" >Login</a>
                  </div>
               </div>

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
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kategori</th>
                                <th>Merk</th>
                                <th>Serial No</th>
                                <th>Customer</th>
                                <th>Tanggal Beli</th>
                                <th>Tanggal Garansi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>

              </div>
            </div>
            <div class="simple-footer">
              Copyright &copy; IwayRiway <?=date('Y')?>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="<?=base_url('assets/modules/jquery.min.js')?>"></script>
  <script src="<?=base_url('assets/modules/popper.js')?>"></script>
  <script src="<?=base_url('assets/modules/tooltip.js')?>"></script>
  <script src="<?=base_url('assets/modules/bootstrap/js/bootstrap.min.js')?>"></script>
  <script src="<?=base_url('assets/modules/nicescroll/jquery.nicescroll.min.js')?>"></script>
  <script src="<?=base_url('assets/modules/moment.min.js')?>"></script>
  <script src="<?=base_url('assets/js/stisla.js')?>"></script>
  
  <!-- JS Libraies -->
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

  <!-- Page Specific JS File -->
  
  <!-- Template JS File -->
  <script src="<?=base_url('assets/js/scripts.js')?>"></script>
  <script src="<?=base_url('assets/js/custom.js')?>"></script>

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

    $(document).ready(function() {
      var table = $('#example').DataTable();

        $("#search").click(function(){
            var keyword = $("#keyword").val();

            if(keyword === ''){
               alertErr("SILAHKAN MASUKKAN DATA YANG INGIN DICARI");
            }

            $.ajax({
               url:"<?= base_url('home/search')?>",
               type:"POST",
               dataType: 'json',
               data:{keyword:keyword},
               success:function(data){
                  if(data.length <= 0){
                     alertErr("DATA TIDAK DITEMUKAN");
                  }

                  var r = 1;
                  table.clear();
                  $.each(data, function (i, key) {
                     var aksi = `<a class="btn btn-icon btn-sm btn-info mr-2" title="Print QR Code" href="<?=base_url('home/print/')?>`+data[i].qr_code+`" target="_blank"><i class="fas fa-eye"></i></a>`;

                     table.row.add([
                        r++,
                        data[i].kategori,
                        data[i].merk,
                        data[i].serial_no,
                        data[i].nama,
                        data[i].tgl_beli,
                        data[i].garansi,
                        aksi
                     ]);
                     table.draw();
                  });
               }
            });

        });

    });
</script>
</body>
</html>