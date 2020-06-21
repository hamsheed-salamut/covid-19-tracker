@extends('layouts.app')

@section('content')

<h1 class="text-center" style="text-align: center; font-family: Cambria; font-size:60px;"> C<img src="https://img.icons8.com/nolan/64/coronavirus.png"/>VID-19 </h1>
<p class="text-center"> This application tracks the current number of coronavirus (covid-19) cases reported across the globe as of today {{ date('d-F-Y') }}</p>
<div class="jumbotron text-center">


    <div class="row justify-content-center">
        <div class="col-md-4">
          <div class="card-counter primary">
            <i class="fas fa-briefcase-medical fa-5x"></i>
            <span class="count-numbers">{{ $worldwide['cases'] }}</span>
            <span class="count-name">Total Cases</span>
          </div>
        </div>
    
        <div class="col-md-4">
          <div class="card-counter success">
            <i class="fas fa-heartbeat fa-5x"></i>
            <span class="count-numbers">{{ $worldwide['recovered'] }}</span>
            <span class="count-name">Recovered</span>
          </div>
        </div>
    
        <div class="col-md-4">
            <div class="card-counter danger">
            <i class="fas fa-cross fa-5x"></i>
            <span class="count-numbers">{{ $worldwide['deaths'] }}</span>
            <span class="count-name">Deaths</span>
          </div>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-md-4">
          <div class="card-counter info">
            <i class="fas fa-capsules fa-5x"></i>
            <span class="count-numbers">{{ $worldwide['active'] }}</span>
            <span class="count-name">Active Cases</span>
          </div>
        </div>
    
        <div class="col-md-4">
          <div class="card-counter warning">
            <i class="fas fa-head-side-cough fa-5x"></i>
            <span class="count-numbers">{{ $worldwide['critical'] }}</span>
            <span class="count-name">Critical</span>
          </div>
        </div>
    
        <div class="col-md-4">
            <div class="card-counter critical">
            <i class="fas fa-lungs-virus fa-5x"></i>
            <span class="count-numbers">{{ $worldwide['todayCases'] }}</span>
            <span class="count-name">Today Cases</span>
          </div>
        </div>
      </div>

</div>

<div class="row col-md-14">
    <div class="card">
      <div class="card-body">
        <h3 class="card-title text-center">Worldwide Statistics</h3>
        <canvas id="lineChart"></canvas>
      </div>
    </div>
</div>

<br/>


<div class="row col-md-16 center">
   <h3 class="text-center"> Current Demographics Breakdown </h3>

    <table class="table table-striped custab">
    <thead>
        <tr>
            <th>Country</th>
            <th class="text-center">Total Cases</th>
            <th class="text-center">Today Cases</th>
            <th class="text-center">Active Cases</th>
            <th class="text-center">Deaths</th>
            <th class="text-center">Today Deaths</th>
            <th class="text-center">Recovered</th>
        </tr>
    </thead>
  
            @foreach ($countries as $country)
            
            <tr data-toggle="modal" data-id={{$country['country']}} data-flag={{$country['countryInfo']['flag']}} data-target="#orderModal">
                <td> <img src="{{ $country['countryInfo']['flag'] }}" width="24" height="24"> &nbsp; {{$country['country']}}   </td>
                <td class="text-center">{{$country['cases']}}</td>
                <td class="text-center"> @if( $country['todayCases'] == '0' )
                    {{$country['todayCases']}}
                @else
                <a class="btn btn-info btn-xs" href="#"> {{ $country['todayCases'] }} </a>
                @endif </td>
                <td class="text-center"> <a class='btn btn-warning btn-xs' href="#"> {{$country['active']}} </a></td>
                <td class="text-center"> @if( $country['deaths'] == '0' )
                    {{$country['deaths']}}
                @else
                <a class="btn btn-danger btn-xs" href="#"> {{ $country['deaths'] }} </a>
                @endif </td>
                
                <td class="text-center">{{$country['todayDeaths']}}</td>
                <td class="text-center"><a class='btn btn-success btn-xs' href="#">{{$country['recovered']}} </a></td>
            </tr>
            @endforeach
    </table>
    </div>
    <br> <br>

    <div class="navbar navbar-default navbar-fixed-bottom">
        <div class="container">
          <p class="navbar-text pull-left">© 2020 - Site Built By M. Hamsheed
          </p>
          
          <a href="mailto:hamsheed993@gmail.com" class="navbar-btn btn-danger btn pull-right">
          <span class="glyphicon glyphicon-star"></span>  Email me </a>
        </div>  
      </div>

@endsection