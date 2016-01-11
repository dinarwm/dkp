      <footer class="main-footer no-print">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>

      </footer>
    
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class='control-sidebar-bg'></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url() ?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='<?php echo base_url() ?>assets/plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url() ?>assets/dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- <script src="<?php echo base_url() ?>assets/dist/js/demo.js" type="text/javascript"></script> -->

        <!-- bootstrap-select -->
    <script src="<?php echo base_url() ?>assets/bootstrap-select/js/bootstrap-select.js"></script>
    <script src="<?php echo base_url() ?>assets/bootstrap-select/dist/js/bootstrap-select.js"></script>
    <script src="<?php echo base_url() ?>assets/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    
    <!-- InputMask -->
    <script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
    <!-- date-range-picker -->
    <script src="<?php echo base_url() ?>assets/moment.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- bootstrap color picker -->
    <script src="<?php echo base_url() ?>assets/plugins/colorpicker/bootstrap-colorpicker.min.js" type="text/javascript"></script>
    <!-- bootstrap time picker -->
    <script src="<?php echo base_url() ?>assets/plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="<?php echo base_url() ?>assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- iCheck 1.0.1 -->
    <script src="<?php echo base_url() ?>assets/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- DATA TABES SCRIPT -->
    <script src="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/bootstrap3/base.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/bootstrap3/bootstrap-datetimepicker.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/bootstrap3/moment-with-locales.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/bootstrap3/prettify-1.0.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/docs.js"></script>
    <!-- Page script -->
    <script>
  if (top.location != location) {
    top.location.href = document.location.href ;
  }
    $(function(){
      window.prettyPrint && prettyPrint();
      $('#dp1').datepicker({
        format: 'mm-dd-yyyy'
      });
      $('#dp2').datepicker();
      $('#dp3').datepicker();
      $('#dp3').datepicker();
      $('#dpYears').datepicker();
      $('#dpMonths').datepicker();
      $('#pny_tgl_surat').datepicker({
        format: 'mm-dd-yyyy'
      });
      $('#pny_tgl_penyaluran').datepicker({
        format: 'mm-dd-yyyy'
      });
      var startDate = new Date(2012,1,20);
      var endDate = new Date(2012,1,25);
      $('#dp4').datepicker()
        .on('changeDate', function(ev){
          if (ev.date.valueOf() > endDate.valueOf()){
            $('#alert').show().find('strong').text('The start date can not be greater then the end date');
          } else {
            $('#alert').hide();
            startDate = new Date(ev.date);
            $('#startDate').text($('#dp4').data('date'));
          }
          $('#dp4').datepicker('hide');
        });
      $('#dp5').datepicker()
        .on('changeDate', function(ev){
          if (ev.date.valueOf() < startDate.valueOf()){
            $('#alert').show().find('strong').text('The end date can not be less then the start date');
          } else {
            $('#alert').hide();
            endDate = new Date(ev.date);
            $('#endDate').text($('#dp5').data('date'));
          }
          $('#dp5').datepicker('hide');
        });

        // disabling dates
        var nowTemp = new Date();
        var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

        var checkin = $('#dpd1').datepicker({
          onRender: function(date) {
            return date.valueOf() < now.valueOf() ? 'disabled' : '';
          }
        }).on('changeDate', function(ev) {
          if (ev.date.valueOf() > checkout.date.valueOf()) {
            var newDate = new Date(ev.date)
            newDate.setDate(newDate.getDate() + 1);
            checkout.setValue(newDate);
          }
          checkin.hide();
          $('#dpd2')[0].focus();
        }).data('datepicker');
        var checkout = $('#dpd2').datepicker({
          onRender: function(date) {
            return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
          }
        }).on('changeDate', function(ev) {
          checkout.hide();
        }).data('datepicker');
    });
  </script>
    <script type="text/javascript">
      $(function () {
        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
                {
                  ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                    'Last 7 Days': [moment().subtract('days', 6), moment()],
                    'Last 30 Days': [moment().subtract('days', 29), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
                  },
                  startDate: moment().subtract('days', 29),
                  endDate: moment()
                },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        );

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
          showInputs: false
        });
      });
    </script>
    <script type="text/javascript">
      $(function () {
        $('.data_table').dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": true,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false
        });
      });
    </script>
    <script language="javascript">
    function batal()
    {
       document.getElementById('awal').style.display='block';
       document.getElementById('editkan').style.display='none';
       document.getElementById('status').value="lama";
    }

    function edit_tanggal()
    {
       document.getElementById('awal').style.display='none';
       document.getElementById('editkan').style.display='block';
       document.getElementById('status').value="baru";
    }

    function showJanji()
    {
       document.getElementById('janji').style.display='block';
       document.getElementById('noJanji').style.display='none';
       document.getElementById('status').value="janji";
    }

    function hideJanji()
    {
       document.getElementById('janji').style.display='none';
       document.getElementById('noJanji').style.display='block';
       document.getElementById('status').value="";
    }
    </script>
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker12').datetimepicker({
                inline: true,
                sideBySide: true
            });
        });
    </script>
    
    <script type="text/javascript">
        $(function () {
             $('#yearpicker').datetimepicker({
                    format: 'YYYY',
                    sideBySide: true,
                    inline: true
                });
        });
    </script>
     <script type="text/javascript">
        $(function () {
             $('#btnInsertUser').click(function(){
                $('#insertUserModal').modal('show');
             });
        });
    </script>
   <script type="text/javascript">
      var jumlah_detail = 0;
      $("#btnAddBarang").click(function () {
        jumlah_detail++;
        document.getElementsByName("jumlah_detail")[0].value = jumlah_detail;
        var kode_barang_add = document.getElementsByName("kode_barang_add")[0].value;
        var selectedIndex = document.getElementsByName("kode_barang_add")[0].selectedIndex;
        var nama_barang_add = document.getElementsByName("kode_barang_add")[0][selectedIndex].innerHTML;
        var lokasi_barang_add = document.getElementsByName("lokasi_barang_add")[0].value;
        var jml_barang_add = document.getElementsByName("jml_barang_add")[0].value;
        var str =
        '/<tr id="rec_'+jumlah_detail+'">'+
        '<input type="hidden" readonly name="kode_barang_'+jumlah_detail+'" value="'+kode_barang_add+'">'+
        '<td><center><input type="text" readonly name="nama_barang_'+jumlah_detail+'" value="'+nama_barang_add+'"></center></td>'+
        '<td><center><input type="text" readonly name="lokasi_barang_'+jumlah_detail+'" value="'+lokasi_barang_add+'"></center></td>'+
        '<td><center><input type="text" readonly name="jumlah_barang_'+jumlah_detail+'" value="'+jml_barang_add+'"></center></td>'+
        '<td><center><div class="btn btn-danger btn-social" onclick="del(' + jumlah_detail + ')"><i class="fa fa-trash"></i>Hapus Barang</div></center></td>'+
        '</tr>';
        $("#tableDetailBarang").append(str);
      });
      function del(id){
        document.getElementsByName("deleted")[0].value = document.getElementsByName("deleted")[0].value + id + ",";
        document.getElementById("rec_" + id).remove();
      }
    </script>
  </body>
</html>
