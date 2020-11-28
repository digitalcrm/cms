@extends('layouts.master')

@section('title', 'CMS Settings')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">CMS Settings</h1>
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
                    <a href="{{ route('bookservices.index') }}" class="trash-link">
                        <span class=""><i class="fa fa-money-bill fa-2x"></i></span>
                        <div class="text-bold mt-2">
                            ToolBar Active/Inactive
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
                    <a href="{{ route('activity_type') }}" class="trash-link">
                        <span class=""><i class="fa fa-money-bill fa-2x"></i></span>
                        <div class="text-bold mt-2">
                            Other Menu...continue..
                        </div>
                    </a>
                </div>
                <!-- /.card -->
            </div>
        </div>

      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->

@endsection
