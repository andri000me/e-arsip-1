<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="refresh" content="900;url=<?php echo site_url('logout'); ?>" />
  <title><?php echo get_val_setting('TITLE_APPS');?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/font-awesome-4.4.0/css/font-awesome.min.css');?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css'); ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
  folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/skins/_all-skins.min.css'); ?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php get_header() ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Daftar Arsip
        </h1>
      </section>

      <!-- Main content -->
      <section class="content">
        <?php echo show_messaga_dialog();?>
        <div class="row">
          <div class="col-md-12">
            <a class="btn btn-primary btn-block margin-bottom" href="<?php echo site_url('dokuments/tambah'); ?>">Tambah Dokument</a>
            <div class="box">
              <div class="box-body">
                <table id="example2" class="table table-strip table-hover">
                  <thead>
                    <tr>
                      <th>Nomor</th>
                      <th>Judul</th>
                      <th>Status</th>
                      <th>Kelompok</th>
                      <th>Tgl Surat</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($dokuments->result() as $row) { ?>
                      <tr>
                        <td><?php echo $row->nomor;?></td>
                        <td><?php echo $row->title;?></td>
                        <td><?php echo $row->jenis;?></td>
                        <td><?php echo $row->ket;?></td>
                        <td><?php echo DateToIndo($row->tgl_surat);?></td>
                        <td width="50">
                          <div class="btn-group">
                            <a href="#" data-toggle="dropdown" class="btn btn-info btn-mini dropdown-toggle">
                              Action
                              <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu pull-right">
                              <?php if(get_session_name('status') == '1'){?>
                              <li><a onclick="javascript: if(!confirm('Anda yakin mau hapus data?')) return false;" href="<?php echo site_url('dokuments/hapus/' . $row->id); ?>"><i class="fa fa-trash fa-fw"></i> Hapus</a></li>
                            <?php }?>
                              <li><a href="<?php echo base_url('/assets/uploads/dokuments/'.$row->name_file); ?>" target="_blank"><i class="fa fa-search fa-fw"></i> Lihat Dokument</a></li>
                              <li><a href="<?php echo site_url('dokuments/detail/'.$row->id); ?>" target="_blank"><i class="fa fa-file fa-fw"></i> Detail Dokument</a></li>
                              <li><a href="<?php echo site_url('dokuments/download/' . $row->id); ?>"><i class="fa fa-download fa-fw"></i> Unduh</a></li>
                            </ul>
                          </div>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </div><!-- /.col -->
        </div>
      </section><!-- /.content -->
    </div><!-- /.content-wrapper -->


  </div><!-- ./wrapper -->

  <!-- jQuery 2.1.4 -->
  <script src="<?php echo base_url('assets/plugins/jQuery/jQuery-2.1.4.min.js'); ?>"></script>
  <!-- Bootstrap 3.3.5 -->
  <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
  <!-- DataTables -->
  <script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.min.js'); ?>"></script>
  <!-- SlimScroll -->
  <script src="<?php echo base_url('assets/plugins/slimScroll/jquery.slimscroll.min.js'); ?>"></script>
  <!-- FastClick -->
  <script src="<?php echo base_url('assets/plugins/fastclick/fastclick.min.js'); ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url('assets/dist/js/app.min.js'); ?>"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo base_url('assets/dist/js/demo.js'); ?>"></script>
  <!-- page script -->
  <script>
  $(function () {
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": false
    });
  });
  </script>
</body>
</html>
