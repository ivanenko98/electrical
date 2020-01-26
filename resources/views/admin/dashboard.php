<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/jpg" href="/favicon.ico"/>

    <title>Админ панель</title>

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"/>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- summernote -->
    <link rel="stylesheet" href="/admin/plugins/summernote/summernote-bs4.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/admin/dist/css/adminlte.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <link rel="stylesheet" href="/admin/css/main.css">
    <link rel="stylesheet" href="/admin/css/main_anton.css">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
<!--                <a href="/" class="nav-link">BOOK MOVE</a>-->
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <?php include 'inc/sidebar.php' ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Заказы</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Заказы</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive table_mob_w_s_nw">
                                    <table id="example2" class="table table-bordered table-hover book_table">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Имя</th>
                                            <th>Телефон</th>
                                            <th>Електронный адрес</th>
                                            <th>Тип монтажа</th>
                                            <th>Особенности</th>
                                            <th>Дата</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php

                                        foreach ($requests as $request) {
                                            echo "<tr>
                                                <td>$request->id</td>
                                                <td>$request->name</td>
                                                <td>$request->phone</td>
                                                <td>$request->email</td>
                                                <td>$request->subject</td>
                                                <td>$request->message</td>
                                                <td>$request->created_at</td>
                                            </tr>";
                                        }

                                        ?>
<!--                                        @foreach($products as $product)-->
<!--                                        <tr>-->
<!--                                            <td>{{ $product->id }}</td>-->
<!--                                            <td>-->
<!--                                                <div class="product-image-wrap">-->
<!---->
<!--                                                    <img src="{{ $product->getImageProduct() }}" alt="">-->
<!--                                                </div>-->
<!--                                            </td>-->
<!--                                            <td>{{ $product->typeReservation->title ?? '' }}</td>-->
<!--                                            <td>{{ $product->ccn }}</td>-->
<!--                                            <td>{{ $product->country }}, {{ $product->town }}</td>-->
<!--                                            <td>{{ $product->getCreatedDateProductAdmin($product->created_at) }}</td>-->
<!--                                            <td>{{ $product->getZoneName() }}</td>-->
<!--                                            <td>{{ $product->getStatus() }}</td>-->
<!--                                            <td>-->
<!--                                                <div class="btn-group">-->
<!--                                                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-info">Edit</a>-->
<!--                                                    {{Form::open([-->
<!--                                                    'route' => ['admin.products.destroy', $product->id],-->
<!--                                                    'method' => 'delete'-->
<!--                                                    ])}}-->
<!--                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>-->
<!--                                                    {{Form::close()}}-->
<!--                                                </div>-->
<!--                                            </td>-->
<!--                                        </tr>-->
<!--                                        @endforeach-->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->



    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- Default to the left -->
        <strong>Админ панель
    </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="/admin/plugins/jquery/jquery.min.js"></script>
<script src="/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="/admin/plugins/chart.js/Chart.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

<!-- Bootstrap 4 -->
<script src="/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="/admin/plugins/datatables/jquery.dataTables.js"></script>
<script src="/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- Summernote -->
<script src="/admin/plugins/summernote/summernote-bs4.min.js"></script>
<!-- AdminLTE App -->
<script src="/admin/dist/js/adminlte.min.js"></script>

<script src='/admin/plugins/bs-iconpicker/jquery-menu-editor.js'></script>
<script src='/admin/plugins/bs-iconpicker/bootstrap-iconpicker.min.js'></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script src="/admin/js/common.js"></script>
<script src="/admin/js/common_anton.js"></script>

</body>
</html>
