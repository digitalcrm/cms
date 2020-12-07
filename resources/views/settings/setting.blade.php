@extends('layouts.master')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Settings</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row text-center">

        <div class="col-lg-4">
            <div class="card shadow card-danger card-outline">
                <!--/.card-header-->
                <div class="card-body">
                    <a href="{{ route('appointments') }}" class="trash-link">
                        <span class=""><i class="fa fa-money-bill fa-2x"></i></span>
                        <div class="text-bold mt-2">
                            Appointments Setting
                        </div>
                    </a>
                </div>
                <!-- /.card -->
            </div>
        </div>

        @hasanyrole('superadmin|admin')
        <div class="col-lg-4">
            <div class="card shadow card-danger card-outline">
                <!--/.card-header-->
                <div class="card-body">
                    <a href="{{ route('cms_settings') }}" class="trash-link">
                        <span class=""><i class="fa fa-money-bill fa-2x"></i></span>
                        <div class="text-bold mt-2">
                            CMS Setting
                        </div>
                    </a>
                </div>
                <!-- /.card -->
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow card-danger card-outline">
                <!--/.card-header-->
                <div class="card-body">
                    <a href="{{ route('generals') }}" class="trash-link">
                        <span class=""><i class="fa fa-money-bill fa-2x"></i></span>
                        <div class="text-bold mt-2">
                            General Setting
                        </div>
                    </a>
                </div>
                <!-- /.card -->
            </div>
        </div>
        @endhasanyrole

      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->

@endsection
