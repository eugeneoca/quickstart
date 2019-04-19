@extends ('layout')

@section('content')

                    <!-- card -->
                    <?php $origin = session('origin_form'); ?>
                    <div class="card">
                      <div class="card-header text-left">
                       LENDER/CLIENT REGISTRATION
                      </div>
                      <div class="card-body">
                      
                         <p>Please enter the following information about your company and the contacts with whom we will communicate. A Broad Street Valuations, Inc representative will contact you today to introduce you to our process and answer any questions you may have. We appreciate your interest in Broad Street Valuations, Inc and look forward to serving all your residential appraisal needs.</p>
                         @if (count($errors) >0 && $origin=='emailclient')
                              <div class="alert alert-danger">
                                  <ul>
                                    @foreach($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                    @endforeach  
                                  </ul>
                              </div>  
                          @endif
                          @if (($message = session('success')) && $origin=='emailclient')
                              <div class="alert alert-success" role="alert">
                                  {{ __($message) }}
                              </div>
                          @endif 
                        
                         <form class="ml-5 mr-5" method="POST" action="{{url('home/sendclientregistration')}}" id="emailclient">
                         {{ csrf_field() }}
                          <div class="form-group">
                            <label>{{ __('Name') }}</label>
                            <input type="text" class="form-control {{ $errors->has('name') && $origin=='emailclient' ? ' is-invalid' : '' }}" name="name">
                          </div>

                          <div class="form-group">
                            <label>{{ __('Company Name') }}</label>
                            <input type="text" class="form-control {{ $errors->has('companyname') && $origin=='emailclient' ? ' is-invalid' : '' }}" name="companyname">
                          </div>

                          <div class="form-group">
                            <label>{{ __('Address') }}</label>
                            <input type="text" class="form-control {{ $errors->has('address') && $origin=='emailclient' ? ' is-invalid' : '' }}" name="address">
                          </div>

                          <div class="form-group">
                            <label>{{ __('City') }}</label>
                            <input type="text" class="form-control {{ $errors->has('city') && $origin=='emailclient' ? ' is-invalid' : '' }}" name="city">
                          </div>

                          <div class="form-group">
                            <input type="hidden" value="{{ URL::asset('js/state.json') }}" id="statejson">
                            <label for="exampleFormControlSelect1">{{ __('State') }}</label>
                            <select class="form-control {{ $errors->has('state') && $origin=='emailclient' ? ' is-invalid' : '' }}" name="state" id="state">
                            </select>
                          </div>

                          <div class="form-group">
                            <label>{{ __('Postal / Zip Code') }}</label>
                            <input type="number" class="form-control {{ $errors->has('code') && $origin=='emailclient' ? ' is-invalid' : '' }}" name="code">
                          </div>

                          <div class="form-group">
                            <label>{{ __('Email') }}</label>
                            <input type="email" class="form-control {{ $errors->has('email') && $origin=='emailclient' ? ' is-invalid' : '' }}" name="email">
                          </div>

                          <div class="form-group">
                            <label>{{ __('Phone') }}</label>
                            <input type="number" class="form-control {{ $errors->has('phone') && $origin=='emailclient' ? ' is-invalid' : '' }}" name="phone">
                          </div>

                          <div class="form-group">
                            <label>{{ __('Fax') }}</label>
                            <input type="number" class="form-control {{ $errors->has('fax') && $origin=='emailclient' ? ' is-invalid' : '' }}" name="fax">
                          </div>
                          <input hidden name="form_id" value="emailclient">
                          <div class="g-recaptcha" data-sitekey="6Ld2-J4UAAAAAKd_TYc0BjiqfgiV4S9miVBJOvEk"></div>
                          <span id="captcha" class="has-error">Captcha is required.</span><br/>
                          <div class="form-group">
                              <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                              <button type="reset" class="btn btn-primary">{{ __('Clear') }}</button>
                          </div>
                          
                        </form>

                         







                      </div>
                    </div> <!-- ./card --> 


	

@stop