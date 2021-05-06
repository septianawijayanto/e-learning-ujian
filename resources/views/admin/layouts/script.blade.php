<!-- Argon Scripts -->
<!-- Core -->
<script src="{{asset('admin/')}}/assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="{{asset('admin/')}}/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('admin/')}}/assets/vendor/js-cookie/js.cookie.js"></script>
<script src="{{asset('admin/')}}/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
<script src="{{asset('admin/')}}/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
<!-- Optional JS -->
<script src="{{asset('admin/')}}/assets/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{asset('admin/')}}/assets/vendor/chart.js/dist/Chart.extension.js"></script>
<!-- Argon JS -->
<script src="{{asset('admin/')}}/assets/js/argon.js?v=1.2.0"></script>

<script type="text/javascript" src="{{asset('js/handlebars.js')}}"></script>
<script src="{{ asset('js/sweetalert.min.js') }}"></script>
<script src="{{ asset('js/TimeCircles.min.js') }}"></script>
<script src="{{ asset('js/summernote.min.js') }}"></script>
<script type="text/javascript" src="{{asset('DataTables/datatables.min.js')}}"></script>
<script src="{{asset('summernote/summernote.min.js')}}"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $(".preloader").fadeOut();

    $('.mytable').DataTable()
  })


  $(function() {


    $(document).ready(function() {


      var flash = "{{ Session::has('sukses') }}";
      if (flash) {
        var pesan = "{{ Session::get('sukses') }}"
        swal("Sukses", pesan, "success");
      }

      var gagal = "{{ Session::has('gagal') }}";
      if (gagal) {
        var pesan = "{{ Session::get('gagal') }}"
        swal("Error", pesan, "error");
      }

      var peringatan = "{{ Session::has('peringatan') }}";
      if (peringatan) {
        var pesan = "{{ Session::get('peringatan') }}"
        swal("Warning", pesan, "warning");
      }
      var info = "{{ Session::has('info') }}";
      if (info) {
        var pesan = "{{ Session::get('info') }}"
        swal("Info", pesan, "info");
      }


      $('body').on('click', '.menu-sidebar', function(e) {
        $('.preloader').fadeIn();
      })

      $('body').on('click', '.btn-refresh', function(e) {
        e.preventDefault();
        $('.preloader').fadeIn();
        location.reload();
      })

      // btn hapus di klik
      $('body').on('click', '.btn-hapus', function(e) {
        e.preventDefault();
        var url = $(this).attr('href');
        $('#modal-hapus').find('form').attr('action', url);
        $('#modal-hapus').modal();
      });

    });
  })
</script>