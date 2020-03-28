@extends('layouts.app')

@section('content')

<h1> Corona Virus (Covid-19) Tracker Application </h1>
<p> This application lists the current number of cases reported across the globe as of today {{ date('d-F-Y') }}</p>
<div class="jumbotron text-center">


    <div class="row justify-content-center">
        <div class="col-md-4">
          <div class="card-counter primary">
            <i class="fas fa-briefcase-medical"></i>
            <span class="count-numbers">{{ $worldwide['cases'] }}</span>
            <span class="count-name">Cases</span>
          </div>
        </div>
    
        <div class="col-md-4">
          <div class="card-counter success">
            <i class="fas fa-heartbeat"></i>
            <span class="count-numbers">{{ $worldwide['recovered'] }}</span>
            <span class="count-name">Recovered</span>
          </div>
        </div>
    
        <div class="col-md-4">
            <div class="card-counter danger">
            <i class="fas fa-cross"></i>
            <span class="count-numbers">{{ $worldwide['deaths'] }}</span>
            <span class="count-name">Deaths</span>
          </div>
        </div>
      </div>
</div>

<h3> Current Demographics Breakdown </h3>

<div class="row col-md-14">
    <table class="table table-striped custab">
    <thead>
        <tr>
            <th>Country</th>
            <th class="text-center">Total Cases</th>
            <th class="text-center">Today Cases</th>
            <th class="text-center">Deaths</th>
            <th class="text-center">Today Deaths</th>
            <th class="text-center">Recovered</th>
        </tr>
    </thead>
  
            @foreach ($countries as $country)
            <tr>
                <td> <img src="{{ $country['countryInfo']['flag'] }}" width="24" height="24"> &nbsp; {{$country['country']}}   </td>
                <td class="text-center">{{$country['cases']}}</td>
                <td class="text-center"> @if( $country['todayCases'] == '0' )
                    {{$country['todayCases']}}
                @else
                <a class="btn btn-info btn-xs" href="#"> {{ $country['todayCases'] }} </a>
                @endif </td>
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