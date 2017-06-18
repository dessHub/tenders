@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Closed Tenders</div>
                <div class="panel-body">
                @foreach($tenders as $key)
                <div class="col-md-12">
                <div class="col-md-1">{{$key->id}}</div>
                <div class="col-md-6">{{$key->title}}</div>
<hr>
              </div>

                @endforeach

            </div>
        </div>
    </div>
</div>
@endsection
