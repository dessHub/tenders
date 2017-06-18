@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
      <div class="col-md-12 text-center">
      <h2><b>{{$tender->title}}</b> tender proposals</h2><hr>
      </div>
    </div>
  @foreach($proposals as $key)
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">{{$key->c_name}}</div>
                <div class="panel-body">
                  <div class="col-md-12" style="margin-bottom:10px;">
                  <div class="col-md-6">
                 <div><b>Kra Pin:</b> {{ $key->kra_pin}}</div>
                 <div><b>Bided on:</b> {{ $key->created_at}}</div>
               </div>
               <div class="col-md-4">
                 <button class="btn btn-default"><a href="{{ url('/award'.$key->user_id.$tender->id)}}">
                       <i class="fa fa-btn fa-plus"></i> Award </a>
                   </button>
               </div>
             </div>
             <div class="col-md-12">
                <div class="jumbotron">
                  {{$key->proposal}}
              </div>
         </div>

            </div>
        </div>
    </div>
  </div>
    @endforeach
</div>
@endsection
