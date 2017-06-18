@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Bid Alert</div>

                <div class="panel-body">
                    Your have successfully bid on this tender. Click <a href="{{url('/addtenders')}}">here</a> to bid on other tenders.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
