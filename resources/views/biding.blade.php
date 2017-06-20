@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/proposal') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                            <div class="col-md-12">

                              <div class="col-md-6">

                      <div class="form-group{{ $errors->has('c_name') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                              <input id="c_name" type="hidden" class="form-control" name="c_name" value="{{ Auth::user()->c_name }}">
                              <input id="kra_pin" type="hidden" class="form-control" name="kra_pin" value="{{ Auth::user()->kra_pin }}">
                              <input id="regNo" type="hidden" class="form-control" name="regNo" value="{{ Auth::user()->regNo }}">
                              <input id="category" type="hidden" class="form-control" name="category" value="{{ Auth::user()->org_type }}">

                                @if ($errors->has('category'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                                  </div>

                                </div>
                                <div class="col-md-12">
                                  <div><h3> Tender Details</h3></div><hr>
                                  <div class="col-md-12">

                                        <div class="col-md-4">
                                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                            <label for="title" class="col-md-12 control-label">Tender Title</label>
                                              <div class="col-md-12">
                                              <input id="title" type="text" class="form-control" name="title" value="{{ $tender->title }}">
                                              @if ($errors->has('title'))
                                                <span class="help-block">
                                              <strong>{{ $errors->first('title') }}</strong>
                                                </span>
                                              @endif
                                            </div>
                                        </div>
                                        </div>
                             <div class="col-md-4">
                                  <div class="form-group{{ $errors->has('org_type') ? ' has-error' : '' }}">
                                <label for="org_type" class="col-md-12 control-label">Tender Type:</label>

                              <div class="col-md-12">
                                   <input class="form-control" type="text" id="org_type" name="org_type" required="true" value="{{ $tender->category }}" >
                                 <input class="form-control" type="hidden" id="tender_id" name="tender_id" required="true" value="{{ $tender->id }}" >

                                  </div>
                              </div>
                              </div>


                      </div>

                   <div class="col-md-6">
                    <div class="form-group{{ $errors->has('proposal') ? ' has-error' : '' }}">
                        <label for="proposal" class="col-md-12 control-label">Proposal:</label>

                        <div class="col-md-12">
                             <textarea id="proposal" class="form-control ckeditor" name="proposal" placeholder="Write a propasal describing why you are the best candidate for the tender."></textarea>

                             @if ($errors->has('proposal'))
                                 <span class="help-block">
                                     <strong>{{ $errors->first('proposal') }}</strong>
                                 </span>
                             @endif
                        </div>
                    </div>

                   </div>

                   <div class="col-md-3">
                    <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
                        <label for="file" class="col-md-12 control-label">Upload Proposal File:</label>

                        <div class="col-md-12" style="padding-top:20px;">
                             <input class="form-control" type="file" name="file" required="true">

                             @if ($errors->has('file'))
                                 <span class="help-block">
                                     <strong>{{ $errors->first('file') }}</strong>
                                 </span>
                             @endif
                        </div>
                    </div>
                   </div>

                     <div class="col-md-3" style="padding-top:30px;">
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-refresh"></i> Submit
                                </button>
                            </div>
                        </div>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
