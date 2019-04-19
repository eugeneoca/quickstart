@extends ('layout')

@section('content')

                    <!-- card -->
                    <?php $origin = session('origin_form'); ?>
                    <div class="card">
                      <div class="card-header text-left">
                       APPRAISER REGISTRATION
                      </div>
                      <div class="card-body">
                      
                         <p>Broad Street Valuations, Inc is currently seeking skilled and experienced appraisal professionals to add to our approved appraiser list. We offer timely payment, professional and courteous communication, and higher fee structures than most other national appraisal management companies. We do expect reliable and professional service, responsiveness, and consistent communication during normal business hours. We look forward to working with you.</p>

                         @if (count($errors) >0 && $origin=='emailappraiser')
                              <div class="alert alert-danger">
                                  <ul>
                                    @foreach($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                    @endforeach  
                                  </ul>
                              </div>  
                          @endif
                          @if (($message = session('success')) && $origin=='emailappraiser')
                              <div class="alert alert-success" role="alert">
                                  {{ __($message) }}
                              </div>
                          @endif 
                         <form class="ml-5 mr-5" method="post" action="{{url('home/sendappraiser')}}" id="appraiserform">
                         {{ csrf_field() }}
                          <h5>Personal</h5>

                          <div class="form-group">
                            <label>{{ __('First Name') }}</label>
                            <input type="text" class="form-control {{ $errors->has('firstname') && $origin=='emailappraiser' ? ' is-invalid' : '' }}" name="firstname">
                          </div>

                          <div class="form-group">
                            <label>{{ __('Last Name') }}</label>
                            <input type="text" class="form-control {{ $errors->has('lastname') && $origin=='emailappraiser' ? ' is-invalid' : '' }}" name="lastname">
                          </div>

                          <div class="form-group">
                            <label>{{ __('Email') }}</label>
                            <input type="email" class="form-control {{ $errors->has('email') && $origin=='emailappraiser' ? ' is-invalid' : '' }}" name="email">
                          </div>

                          <div class="form-group">
                            <label>{{ __('Additional Email') }}</label>
                            <input type="email" class="form-control {{ $errors->has('aemail') && $origin=='emailappraiser' ? ' is-invalid' : '' }}" name="aemail">
                          </div>

                          <div class="form-group">
                            <label>{{ __('Additional Email') }}</label>
                            <input type="email" class="form-control {{ $errors->has('bemail') && $origin=='emailappraiser' ? ' is-invalid' : '' }}" name="bemail">
                          </div>

                          <h5>Phones</h5>

                          <div class="form-group">
                            <label>{{ __('Office Phone Number') }}</label>
                            <input type="text" class="form-control {{ $errors->has('officephone') && $origin=='emailappraiser' ? ' is-invalid' : '' }}" name="officephone">
                          </div>

                          <div class="form-group">
                            <label>{{ __('Cell Number') }}</label>
                            <input type="text" class="form-control {{ $errors->has('cellphone') && $origin=='emailappraiser' ? ' is-invalid' : '' }}" name="cellphone">
                          </div>

                          <div class="form-group">
                            <label>{{ __('Fax Number') }}</label>
                            <input type="text" class="form-control {{ $errors->has('fax') && $origin=='emailappraiser' ? ' is-invalid' : '' }}" name="fax">
                          </div>

                          <h5>Company</h5>

                          <div class="form-group">
                            <label>{{ __('Company Name') }}</label>
                            <input type="text" class="form-control {{ $errors->has('companyname') && $origin=='emailappraiser' ? ' is-invalid' : '' }}" name="companyname">
                          </div>

                          <div class="form-group">
                            <label>{{ __('Street') }}</label>
                            <input type="text" class="form-control {{ $errors->has('street') && $origin=='emailappraiser' ? ' is-invalid' : '' }}" name="street">
                          </div>

                          <div class="form-group">
                            <label>{{ __('City') }}</label>
                            <input type="text" class="form-control {{ $errors->has('city') && $origin=='emailappraiser' ? ' is-invalid' : '' }}" name="city">
                          </div>

                          <div class="form-group">
                            <label for="exampleFormControlSelect1">{{ __('State') }}</label>
                            <select class="form-control {{ $errors->has('state') && $origin=='emailappraiser' ? ' is-invalid' : '' }}" name="state">
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                            </select>
                          </div>

                          <div class="form-group">
                            <label>{{ __('Zip Code') }}</label>
                            <input type="text" class="form-control {{ $errors->has('code') && $origin=='emailappraiser' ? ' is-invalid' : '' }}" name="code">
                          </div>

                          <div class="form-group">
                            <label>{{ __('Tax ID') }}</label>
                            <input type="text" class="form-control {{ $errors->has('taxid') && $origin=='emailappraiser' ? ' is-invalid' : '' }}" name="taxid">
                          </div>


                          <h5>Physical Address</h5>
                          <p>If different than Company address above.</p>

                          <div class="form-group">
                            <label>{{ __('Street') }}</label>
                            <input type="text" class="form-control {{ $errors->has('optstreet') && $origin=='emailappraiser' ? ' is-invalid' : '' }}" name="optstreet">
                          </div>

                          <div class="form-group">
                            <label>{{ __('City') }}</label>
                            <input type="text" class="form-control {{ $errors->has('optcity') && $origin=='emailappraiser' ? ' is-invalid' : '' }}" name="optcity">
                          </div>

                          <div class="form-group">
                            <label for="exampleFormControlSelect1">{{ __('State') }}</label>
                            <select class="form-control {{ $errors->has('optstate') && $origin=='emailappraiser' ? ' is-invalid' : '' }}" name="optstate">
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                            </select>
                          </div>

                          <div class="form-group">
                            <label>{{ __('Zip Code') }}</label>
                            <input type="text" class="form-control {{ $errors->has('optcode') && $origin=='emailappraiser' ? ' is-invalid' : '' }}" name="optcode">
                          </div>

                          <h5>License</h5>

                          <div class="form-group">
                            <label for="exampleFormControlSelect1">{{ __('License Type') }}</label>
                            <select class="form-control {{ $errors->has('licensetype') && $origin=='emailappraiser' ? ' is-invalid' : '' }}" name="licensetype">
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                            </select>
                          </div>

                          <div class="form-group">
                            <label>{{ __('License Number') }}</label>
                            <input type="text" class="form-control {{ $errors->has('licensenumber') && $origin=='emailappraiser' ? ' is-invalid' : '' }}" name="licensenumber">
                          </div>

                          <div class="form-group">
                            <label>{{ __('License Expiration') }}</label>
                            <input type="text" class="form-control {{ $errors->has('licenseexpire') && $origin=='emailappraiser' ? ' is-invalid' : '' }}" name="licenseexpire">
                          </div>


                          <h5>Errors & Omissions</h5>

                          <div class="form-group">
                              <label>{{ __('Errors & Omissions Insurance') }}</label> <br>
                              <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
                                  <label class="custom-control-label" for="customRadioInline1">Yes</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
                                  <label class="custom-control-label" for="customRadioInline2">No</label>
                                </div>

                          </div> 

                          <div class="form-group">
                            <label>E&O Liability Limit</label>
                            <input type="text" class="form-control" id="">
                          </div> 

                          <div class="form-group">
                            <label>E&O Expiration Date</label>
                            <input type="text" class="form-control" id="">
                          </div> 


                          <h5>Miscellaneous</h5>

                          <div class="form-group">
                              <label>FHA Approved</label> <br>
                              <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" id="customRadioInline3" name="customRadioInline2" class="custom-control-input">
                                  <label class="custom-control-label" for="customRadioInline3">Yes</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" id="customRadioInline4" name="customRadioInline2" class="custom-control-input">
                                  <label class="custom-control-label" for="customRadioInline4">No</label>
                                </div>

                          </div> 

                          <div class="form-group">
                            <label>Appraisal Software</label>
                            <input type="text" class="form-control" id="">
                          </div>

                          <div class="form-group">
                            <label>Appraisal Software</label>
                            <input type="text" class="form-control" id="">
                          </div>

                          <div class="form-group">
                            <label>Client Approval Lists</label>
                            <textarea class="form-control" id="" rows="3"></textarea>
                          </div>

                          <div class="form-group">
                            <label>Comments</label>
                            <textarea class="form-control" id="" rows="3"></textarea>
                          </div>

                          <h5>Coverage</h5>

                          <div class="form-group">
                            <label for="">Select State for Coverage</label>
                            <select class="form-control" id="">
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                            </select>
                          </div>

                          <div class="form-group">
                            <label for="">Select Counties</label>
                            <select multiple class="form-control" id="">
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                            </select>
                          </div>

                          <div class="form-group">
                            <label for="">Counties Covered</label>
                            <select multiple class="form-control" id="">
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                            </select>
                             <small id="emailHelp" class="form-text text-muted">Click to Remove</small>
                          </div>
                                                  

                          
                          <div class="form-group">
                              <button type="submit" class="btn btn-primary">Submit</button>
                              <button type="reset" class="btn btn-primary">Cancel</button>
                          </div>
                          
                        </form>

                         







                      </div>
                    </div> <!-- ./card --> 


	

@stop