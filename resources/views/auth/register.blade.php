@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                            <div class="col-md-12">
                              <div><h3>Personal Details</h3></div><hr>
                              <div class="col-md-6">

                      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                          <label for="fname" class="col-md-12 control-label">First Name</label>

                          <div class="col-md-12">
                              <input id="fname" type="text" class="form-control" name="fname" value="{{ old('fname') }}">

                              @if ($errors->has('fname'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('fname') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  <label for="email" class="col-md-12 control-label">E-Mail Address</label>

                  <div class="col-md-12">
                      <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                      @if ($errors->has('email'))
                          <span class="help-block">
                              <strong>{{ $errors->first('email') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>


                              </div>
                                  <div class="col-md-6">

                          <div class="form-group{{ $errors->has('lname') ? ' has-error' : '' }}">
                              <label for="lname" class="col-md-12 control-label">Last Name</label>

                              <div class="col-md-12">
                                  <input id="lname" type="text" class="form-control" name="lname" value="{{ old('lname') }}">

                                  @if ($errors->has('lname'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('lname') }}</strong>
                                      </span>
                                  @endif
                              </div>
                                </div>

                        <div class="form-group{{ $errors->has('phoneno') ? ' has-error' : '' }}">
                            <label for="phoneno" class="col-md-12 control-label">Mobile No</label>

                            <div class="col-md-12">
                                <input id="phoneno" type="text" class="form-control" name="phoneno" value="{{ old('phoneno') }}">

                                @if ($errors->has('phoneno'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phoneno') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                                  </div>
                                </div>
                                <div class="col-md-12">
                                  <div><h3> Company Details</h3></div><hr>
                                  <div class="col-md-6">

                          <div class="form-group{{ $errors->has('c_name') ? ' has-error' : '' }}">
                              <label for="c_name" class="col-md-12 control-label">Company Name</label>

                              <div class="col-md-12">
                                  <input id="c_name" type="text" class="form-control" name="c_name" value="{{ old('c_name') }}">

                                  @if ($errors->has('c_name'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('c_name') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                  <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                      <label for="address" class="col-md-12 control-label">Postal Address</label>

                      <div class="col-md-12">
                          <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}">

                          @if ($errors->has('address'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('address') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>
                        <div class="form-group{{ $errors->has('county') ? ' has-error' : '' }}">
                            <label for="county" class="col-md-12 control-label">County:</label>

                            <div class="col-md-12">
                                 <select class="form-control" id="county" name="county" required="true" value="{{ old('county') }}" style="background-color : inherit">
                                     <option  value="">Select County</option>
                       <option value="Baringo">Baringo</option>
                       <option value="Bomet">Bomet</option>
                       <option value="Bungoma">Bungoma</option>
                       <option value="Busia">Busia</option>
                       <option value="Marakwet">Elgeyo Marakwet</option>
                       <option value="Embu">Embu</option>
                       <option value="Garissa">Garissa</option>
                       <option value="Homa">Homa Bay</option>
                       <option value="Isiolo">Isiolo</option>
                       <option value="Kajiado">Kajiado</option>
                       <option value="Kakamega">Kakamega</option>
                       <option value="Kericho">Kericho</option>
                       <option value="Kiambu">Kiambu</option>
                       <option value="Kilifi">Kilifi</option>
                       <option value="Kirinyaga">Kirinyaga</option>
                       <option value="Kisii">Kisii</option>
                       <option value="Kisumu">Kisumu</option>
                       <option value="Kitui">Kitui</option>
                       <option value="Kwale">Kwale</option>
                       <option value="Laikipia">Laikipia</option>
                       <option value="Lamu">Lamu</option>
                       <option value="Machakos">Machakos</option>
                       <option value="Makueni">Makueni</option>
                       <option value="Mandera">Mandera</option>
                       <option value="Meru">Meru</option>
                       <option value="Migori">Migori</option>
                       <option value="Marsabit">Marsabit</option>
                       <option value="Mombasa">Mombasa</option>
                       <option value="Muranga">Muranga</option>
                       <option value="Nairobi">Nairobi</option>
                       <option value="Nakuru">Nakuru</option>
                       <option value="Nandi">Nandi</option>
                       <option value="Narok">Narok</option>
                       <option value="Nyamira">Nyamira</option>
                       <option value="Nyandarua">Nyandarua</option>
                       <option value="Nyeri">Nyeri</option>
                       <option value="Samburu">Samburu</option>
                       <option value="Siaya">Siaya</option>
                       <option value="Taveta">Taita Taveta</option>
                       <option value="Tana">Tana River</option>
                       <option value="Tharaka">Tharaka Nithi</option>
                       <option value="Nzoia">Trans Nzoia</option>
                       <option value="Turkana">Turkana</option>
                       <option value="Uasin">Uasin Gishu</option>
                       <option value="Vihiga">Vihiga</option>
                       <option value="Wajir">Wajir</option>
                       <option value="Pokot">West Pokot</option>

                                 </select>
                            </div>
                        </div>

                                  <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                      <label for="password" class="col-md-12 control-label">Password</label>

                                      <div class="col-md-12">
                                          <input id="password" type="password" class="form-control" name="password">

                                          @if ($errors->has('password'))
                                              <span class="help-block">
                                                  <strong>{{ $errors->first('password') }}</strong>
                                              </span>
                                          @endif
                                      </div>
                                  </div>

                                  </div>
                                      <div class="col-md-6">
                                      <div class="col-md-6">

                                        <div class="form-group{{ $errors->has('regNo') ? ' has-error' : '' }}">
                                            <label for="regNo" class="col-md-12 control-label">Company Registation No:</label>

                                            <div class="col-md-12">
                                                <input id="regNo" type="text" class="form-control" name="regNo" value="{{ old('regNo') }}">

                                                @if ($errors->has('regNo'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('regNo') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                      </div>
                             <div class="col-md-6">
                              <div class="form-group{{ $errors->has('kra_pin') ? ' has-error' : '' }}">
                                  <label for="kra_pin" class="col-md-12control-label">KRA Pin:</label>

                                  <div class="col-md-12">
                                      <input id="kra_pin" type="text" class="form-control" name="kra_pin" value="{{ old('kra_pin') }}">

                                      @if ($errors->has('kra_pin'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('kra_pin') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>
                            </div>

                          <div class="form-group{{ $errors->has('town') ? ' has-error' : '' }}">
                              <label for="town" class="col-md-12 control-label">City/Town</label>

                              <div class="col-md-12">
                                  <input id="town" type="text" class="form-control" name="town" value="{{ old('town') }}">

                                  @if ($errors->has('town'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('town') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                      <div class="form-group{{ $errors->has('org_type') ? ' has-error' : '' }}">
                          <label for="org_type" class="col-md-12 control-label">Organisation Type:</label>

                          <div class="col-md-12">
                               <select class="form-control" id="org_type" name="org_type" required="true" value="{{ old('org_type') }}" style="background-color : inherit">
                                   <option  value="">Select Type</option>
                                  <option  value="Co-operate">Co-operate</option>
                                   <option  value="Youth Self-help Group">Youth Self-help Group</option>
                                    <option  value="Women Self-help Group">Women Self-help Group</option>


                               </select>
                          </div>
                      </div>
                      <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                          <label for="password-confirm" class="col-md-12 control-label">Confirm Password</label>

                          <div class="col-md-12">
                              <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                              @if ($errors->has('password_confirmation'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('password_confirmation') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                                </div>
                                    </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
