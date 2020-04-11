@extends('layouts.app')

@section('content')

<div class="container-scroller">
  <p class="font-weight-bold">
    <h1 class="display-1 text-center">C<img src="https://img.icons8.com/nolan/48/coronavirus.png" />VID-19</h1>
  </p>
  <div class="container-fluid page-body-wrapper full-page-wrapper">

    <div class="content-wrapper d-flex align-items-center auth">

      <!-- content -->
      <div class="content-wrapper">

        <div class="page-header">
          <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
              <i class="mdi mdi-earth"></i>
            </span> Worldwide </h3>
          <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page">
                <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
              </li>
            </ul>
          </nav>
        </div>
        <div class="row">
          <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-danger card-img-holder text-white">
              <div class="card-body">
                <img src="/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                <h4 class="font-weight-normal mb-3">Deaths <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                </h4>
                <h2 class="mb-5"> <span class="count-numbers">{{ $worldwide['deaths'] }}</span></h2>
                <h6 class="card-text">Increased by 60%</h6>
              </div>
            </div>
          </div>
          <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-info card-img-holder text-white">
              <div class="card-body">
                <img src="/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                <h4 class="font-weight-normal mb-3">Cases <i
                    class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                </h4>
                <h2 class="mb-5"><span class="count-numbers"> {{$worldwide['cases']}}</span></h2>
                <h6 class="card-text">Decreased by 10%</h6>
              </div>
            </div>
          </div>
          <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-success card-img-holder text-white">
              <div class="card-body">
                <img src="/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                <h4 class="font-weight-normal mb-3">Recovered <i class="mdi mdi-diamond mdi-24px float-right"></i>
                </h4>
                <h2 class="mb-5"> <span class="count-numbers"> {{$worldwide['recovered']}}</span></h2>
                <h6 class="card-text">Increased by 5%</h6>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="clearfix">
                  <h4 class="card-title float-left">Visit And Sales Statistics</h4>
                  <div id="visit-sale-chart-legend"
                    class="rounded-legend legend-horizontal legend-top-right float-right"></div>
                </div>
                <canvas id="world-wide-chart" width="300" height="200"></canvas>
              </div>
            </div>
          </div>
        </div>
        <h3 class="page-title">
          <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-earth"></i>
          </span> Demographics </h3> <br/> 
        <div class="row">
          <div class="col-12 grid-margin">
            <div class="card">
              <div class="card-body">
                @php
                    $dateJson = $worldwide['updated'];
                    $timestamp = json_decode($dateJson, true);

                    $timestamp = preg_replace( '/[^0-9]/', '', $timestamp);
                    $updateddate = date("Y-m-d H:i:s", $timestamp / 1000)
                @endphp
                <h4 class="card-title">Last Updated: {{$updateddate}}</h4>
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th> Country </th>
                        <th> Total Cases </th>
                        <th> Today Cases </th>
                        <th> Deaths </th>
                        <th> Today Deaths </th>
                        <th> Recovered </th>
                        <th> Active </th>
                        <th> Critical </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($countries as $country)
                      <tr>
                        <td>
                          <img src="{{ $country['countryInfo']['flag']}}" class="mr-2" alt="image"> {{$country['country']}} </td>
                        <td> <label class="badge badge-gradient-info">{{$country['cases']}}</label> </td>
                        <td>
                          <label class="badge badge-gradient-info">{{$country['todayCases']}}</label>
                        </td>
                        <td> <label class="badge badge-gradient-danger">{{$country['deaths']}}</label> </td>
                        <td> <label class="badge badge-gradient-danger">{{$country['todayDeaths']}}</label>  </td>
                        <td>  <label class="badge badge-gradient-success">{{$country['recovered']}}</label> </td>
                        <td>  <label class="badge badge-gradient-warning">{{$country['active']}}</label> </td>
                        <td>  <label class="badge btn-gradient-dark btn-fw">{{$country['critical']}}</label> </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>


      </div>

    </div>
    <!-- content-wrapper ends -->
  </div>
  <!-- page-body-wrapper ends -->
</div>

<div class="navbar navbar-default navbar-fixed-bottom">
  <div class="container">
    <p class="navbar-text pull-left">© 2020 - Site Built By M. Hamsheed
    </p>
    
    <a href="mailto:hamsheed993@gmail.com" class="navbar-btn btn-danger btn pull-right">
    <span class="glyphicon glyphicon-star"></span>  Email me </a>
  </div>  
</div>

@endsection