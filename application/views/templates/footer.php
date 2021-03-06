<footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2020 <div class="bullet"></div> Develop By <a href="#">IwayRiway</a>
        </div>
        <div class="footer-right">
          
        </div>
      </footer>
    </div>
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
  <script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.flash.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>

  <!-- JS Libraies -->
  <script src="<?=base_url('assets/modules/cleave-js/dist/cleave.min.js')?>"></script>
  <script src="<?=base_url('assets/modules/cleave-js/dist/addons/cleave-phone.us.js')?>"></script>
  <script src="<?=base_url('assets/modules/jquery-pwstrength/jquery.pwstrength.min.js')?>"></script>
  <script src="<?=base_url('assets/modules/bootstrap-daterangepicker/daterangepicker.js')?>"></script>
  <script src="<?=base_url('assets/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')?>"></script>
  <script src="<?=base_url('assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js')?>"></script>
  <script src="<?=base_url('assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')?>"></script>
  <script src="<?=base_url('assets/modules/select2/dist/js/select2.full.min.js')?>"></script>
  <script src="<?=base_url('assets/modules/jquery-selectric/jquery.selectric.min.js')?>"></script>

  <!-- Page Specific JS File -->
  <script src="<?=base_url('assets/js/page/forms-advanced-forms.js')?>"></script>
  
  <!-- Template JS File -->
  <script src="<?=base_url('assets/js/scripts.js')?>"></script>
  <script src="<?=base_url('assets/js/custom.js')?>"></script>

  <script>

  function success(params) {
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Berhasil',
        text: params,
        showConfirmButton: false,
        timer: 2500
      });
  }
  
    const gagal = $('.gagal').data('flashdata');
    if (gagal) {
      Swal.fire({
        position: 'center',
        icon: 'error',
        title: 'Gagal',
        text: gagal,
        showConfirmButton: false,
        timer: 2500
      })
    }

    const sukses = $('.sukses').data('flashdata');
    if (sukses) {
      success(sukses);
      // Swal.fire({
      //   position: 'center',
      //   icon: 'success',
      //   title: 'Berhasil',
      //   text: sukses,
      //   showConfirmButton: false,
      //   timer: 2500
      // })
    }

    const warning = $('.warning').data('flashdata');
    if (warning) {
      Swal.fire({
        position: 'center',
        icon: 'warning',
        title: 'Peringatan',
        text: warning,
        showConfirmButton: false,
        timer: 2500
      })
    }

    const info = $('.info').data('flashdata');
    if (info) {
      Swal.fire({
        position: 'center',
        icon: 'info',
        title: 'Informasi',
        text: info,
        showConfirmButton: false,
        timer: 2500
      })
    }

    $('.tombol-hapus').on('click', function (e) {
      e.preventDefault();
      const href = $(this).attr('href');
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
          document.location.href = href;
        }
      })
    });

  </script>

</body>
</html>