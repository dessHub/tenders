@extends('layouts.app')

@section('content')
<div class="container">
  @if(Auth::guest())

  @else
  @if(Auth::user()->role === 'admin')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Post Tender</div>

                <div class="panel-body">

                      <form class="form-horizontal" role="form" method="POST" action="{{ url('/addTender') }}" enctype="multipart/form-data">
                          {{ csrf_field() }}

                              <div class="col-md-12">
                                <div><h3>Tender Details</h3></div><hr>

                                <div class="col-md-4">
                                  <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                      <label for="title" class="col-md-12 control-label">Tender Title</label>

                                      <div class="col-md-12">
                                          <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}">

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
                                         <select class="form-control" id="org_type" name="org_type" required="true" value="{{ old('org_type') }}" style="background-color : inherit">
                                             <option  value="">Select Type</option>
                                            <option  value="Co-operate">Co-operate</option>
                                             <option  value="Youth Self-help Group">Youth Self-help Group</option>
                                              <option  value="Women Self-help Group">Women Self-help Group</option>


                                         </select>
                                    </div>
                                </div>
                              </div>

                       <div class="col-md-4">
                            <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                                <label for="date" class="col-md-12 control-label">Select Dateline</label>

                                <div class="col-md-12">
                                    <input class="form-control" type="text" name="date" id="datepicker">

                                    @if ($errors->has('date'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('date') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6">

                           <div class="col-md-12">
                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="description" class="col-md-12 control-label">Tender Descriptions:</label>

                                <div class="col-md-12">
                                     <textarea id="description" class="form-control ckeditor" name="description"></textarea>

                                     @if ($errors->has('description'))
                                         <span class="help-block">
                                             <strong>{{ $errors->first('description') }}</strong>
                                         </span>
                                     @endif
                                </div>
                            </div>
                          </div>

                          </div>
                          <div class="col-md-3">

                          <div class="col-md-12">
                           <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
                               <label for="file" class="col-md-12 control-label">Upload File:</label>

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

                          </div>

                        <div class="col-md-3" style="padding-top:30px;">
                          <div class="form-group">
                              <div class="col-md-6 col-md-offset-4">
                                  <button type="submit" class="btn btn-primary">
                                      <i class="fa fa-btn fa-plus"></i> Submit
                                  </button>
                              </div>
                          </div>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
    @endif
    @endif

    <div class="col-md-8">
    <div><h2>Active Tenders</h2></div><hr>
    @foreach($tenders as $key)
    <div class="col-md-12" style="background:silver;margin-top:20px;">
      <div class="col-md-6"><h4><b>{{ $key->title }}</b></h4></div>
      <div class="col-md-4 " ><h5>Posted On: <em>{{ $key->created_at }}</em></h5></div>
      <div class="col-md-2" style="padding-top:3px; ">
        @if(Auth::guest())

        <button class="btn btn-default" style="float:right;">
          <a href="{{ url('/bid'.$key->id)}}"><i class="fa fa-btn fa-plus"></i> Bid</a>
        </button>
        @else
        @if(Auth::user()->role === 'admin')
        <button class="btn btn-default" style="float:right;">
          <a href="{{ url('/del'.$key->id)}}"><i class="fa fa-btn fa-remove"></i> Remove</a>
        </button>

        @else
        <button class="btn btn-default" style="float:right;">
          <a href="{{ url('/bid'.$key->id)}}"><i class="fa fa-btn fa-plus"></i> Bid</a>
        </button>
        @endif
        @endif
      </div>
    </div>
    <div class="col-md-12 " style="padding-left:30px; padding-top:20px;">
      <div> <h4>Tender Category : <i></i>{{ $key->category }} </h4>
      <p>{{ $key->description }}</p>

      <a href="{{ URL::to( '../public/uploads/' . $key->file)  }}" target="_blank" style="margin-left:100px; margin-top:20px;"><i class="fa fa-download"></i>Download</a>
  
    </div>
  </div>
    <div class="col-md-12" style="">
      <div class="col-md-7"></div>
      <div class="col-md-4">Dateline: {{ $key->dateline }}</div>
    </div><hr>
    @endforeach
    </div>
    <div class="col-md-4" style="margin-top:70px;">
      <h3>Archives</h3><hr>
      @foreach($closed as $key)
      <div class="col-md-12" style="border-style:outset;">
        <div class="col-md-12" style="background-color:silver; width:100%;padding-right:1px;"><h5>{{ $key->title}}</h5></div><hr>
        <div style="margin-bottom:5px;">Awarded To: {{ $key->c_name}}</div>
        <p>{{ $key->description}}</p>
      </div>
      @endforeach
    </div>

</div>


@endsection
