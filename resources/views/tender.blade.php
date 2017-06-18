@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
      <div class="col-md-12 text-center">
      <h2><b>Tender Details</h2><hr>
      </div>
    </div>
  @foreach($details as $key)
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">{{$key->title}}</div>
                <div class="panel-body">
                  <div class="col-md-12" style="margin-bottom:10px;">
                  <div class="col-md-6">
                 <div><b>No of bids:</b> <em>{{ $count}}</em></div>
                 <div><b>Tender Status:</b> <em>{{ $key->status}}</em></div>
                 @if($key->status === 'active')
                 <div><b>Application Dateline:</b> {{ $key->dateline}}</div>
                 @elseif($key->status === 'closed')
                 <div><b>Closed On:</b> {{ $key->updated_at}}</div>
                 @endif
                 <div><b>Awarded To:</b> {{ $key->c_name}}</div>
               </div>
               <div class="col-md-4">
               </div>
             </div>
             <div class="col-md-12">
                <div class="jumbotron">
                  {{$key->description}}
              </div>
         </div>

            </div>
        </div>
    </div>
  </div>
    @endforeach
</div>
@endsection
