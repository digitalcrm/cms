@extends('layouts.master')
@section('title', $roleName.': Dashboard')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    {{-- {{ $roleName }} --}}
                    Dashboard
                </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Starter Page</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <x-dashboard.small-box :roleName="$roleName"/>
        {{-- charts div --}}
        <div class="row">
            <section class="col-lg-7 connectedSortable">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Post Chart
                        </h3>
                    </div>
                    <div class="card-body">
                        <div id="chart" style="height: 300px;"></div>
                    </div>
                </div>
            </section>
            <section class="col-lg-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-chart-pie mr-1"></i>
                            CMS Chart
                        </h3>
                    </div>
                    <div class="card-body">
                      <div id="cms-chart" style="height: 300px;"></div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

@section('scripts')
@parent
<script src="{{ asset('js/chartjs/chart-js.js') }}"></script>
<script>
    const chart = new Chartisan({
        el: '#chart',
        url: "@chart('my_chart')",
        loader: {
          color: '#ff00ff',
          size: [30, 30],
          type: 'bar',
          text: 'Loading articles chart data...',
        },
        hooks: new ChartisanHooks()
            .colors(['#4299E1', '#FE0045', '#C07EF1', '#67C560'])
            .responsive()
            .title('POST')
            .datasets('bar')
    });

    const cms_chart = new Chartisan({
        el: '#cms-chart',
        url: "@chart('cms_chart')",
        loader: {
          color: '#ff00ff',
          size: [30, 30],
          type: 'bar',
          text: 'Loading articles chart data...',
        },
        hooks: new ChartisanHooks()
            .responsive()
            .title('CMS')
            .datasets('doughnut')
            .pieColors()
    });
</script>
@endsection
@endsection
