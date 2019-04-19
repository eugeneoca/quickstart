@extends ('layout')

@section('content')

                    <!-- card -->
                    <div class="card">
                    <?php $origin = session('origin_form'); ?>
                      <div class="card-header text-left">
                       APPRAISER REGISTRATION
                      </div>
                      <div class="card-body">
                         <p>Broad Street Valuations, Inc is currently seeking skilled and experienced appraisal professionals to add to our approved appraiser list. We offer timely payment, professional and courteous communication, and higher fee structures than most other national appraisal management companies. We do expect reliable and professional service, responsiveness, and consistent communication during normal business hours. We look forward to working with you.</p>

                        
                         <form class="ml-5 mr-5" method="POST" action="{{url('home/sendappraiser')}}" id="appraisalform">
                         {{ csrf_field() }}
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
                          <h5>Personal</h5>

                          <div class="form-group">
                            <label for="ap-fname">First Name</label>
                            <input type="text" class="form-control {{ $errors->has('firstname') && $origin=='emailappraiser' ? ' is-invalid' : '' }}" id="ap-fname" name="firstname" required>
                          </div>

                          <div class="form-group">
                            <label for="ap-lname">Last Name</label>
                            <input type="text" class="form-control {{ $errors->has('lastname') && $origin=='emailappraiser' ? ' is-invalid' : '' }}" id="ap-lname" name="lastname" required>
                          </div>

                          <div class="form-group">
                            <label for="ap-email">Email</label>
                            <input type="email" class="form-control {{ $errors->has('email') && $origin=='emailappraiser' ? ' is-invalid' : '' }}" id="ap-email" name="email" required>
                          </div>

                          <div class="form-group">
                            <label for="ap-addemail">Additional Email</label>
                            <input type="email" class="form-control" id="ap-addemail" name="addemail1">
                          </div>

                          <div class="form-group">
                            <label for="ap-addemail2">Additional Email</label>
                            <input type="email" class="form-control" id="ap-addemail2" name="addemail2">
                          </div>

                          <h5>Phones</h5>

                          <div class="form-group">
                            <label for="ap-phone">Office Phone Number</label>
                            <input type="number" class="form-control {{ $errors->has('phone') && $origin=='emailappraiser' ? ' is-invalid' : '' }}" id="ap-phone" name="phone" required>
                          </div>

                          <div class="form-group">
                            <label for="ap-cellnumber">Cell Number</label>
                            <input type="number" class="form-control" id="ap-cellnumber" name="ap-cellnumber">
                          </div>

                          <div class="form-group">
                            <label for="ap-faxnumber">Fax Number</label>
                            <input type="number" class="form-control" id="ap-faxnumber">
                          </div>

                          <h5>Company</h5>

                          <div class="form-group">
                            <label for="ap-company">company</label>
                            <input type="text" class="form-control {{ $errors->has('company') && $origin=='emailappraiser' ? ' is-invalid' : '' }}" id="ap-company" name="company" required>
                          </div>

                          <div class="form-group">
                            <label for="ap-street">Street</label>
                            <input type="text" class="form-control {{ $errors->has('street') && $origin=='emailappraiser' ? ' is-invalid' : '' }}" id="ap-street" name="street" required>
                          </div>

                          <div class="form-group">
                            <label for="ap-city">City</label>
                            <input type="text" class="form-control {{ $errors->has('city') && $origin=='emailappraiser' ? ' is-invalid' : '' }}" id="ap-city" name="city" required>
                          </div>

                          <div class="form-group">
                            <input type="hidden" value="{{ URL::asset('js/state.json') }}" id="statejson">
                            <label for="apstate">State</label>
                            <select class="form-control" id="apstate" name="state" required>
                            </select>
                          </div>

                          <div class="form-group">
                            <label for="ap-zip">Zip Code</label>
                            <input type="number" class="form-control {{ $errors->has('code') && $origin=='emailappraiser' ? ' is-invalid' : '' }}" id="ap-zip" name="code" required>
                          </div>

                          <div class="form-group">
                            <label for="ap-tax">Tax ID</label>
                            <input type="text" class="form-control" id="ap-tax" name="tax">
                          </div>


                          <h5>Physical Address</h5>
                          <p>If different than Company address above.</p>

                          <div class="form-group">
                            <label for="ap-pa-street">Street</label>
                            <input type="text" class="form-control" id="ap-pa-street" name="pastreet">
                          </div>

                          <div class="form-group">
                            <label for="ap-pa-city">City</label>
                            <input type="text" class="form-control" id="ap-pa-city" name="pacity">
                          </div>

                          <div class="form-group">
                            <label for="ap-pa-state">State</label>
                            <select class="form-control" id="ap-pa-state" name="pastate">
                            </select>
                          </div>

                          <div class="form-group">
                            <label for="ap-pa-zip">Zip Code</label>
                            <input type="number" class="form-control" id="ap-pa-zip" name="pazip">
                          </div>

                          <h5>License</h5>

                          <div class="form-group">
                            <label for="ap-license">License Type</label>
                            <select class="form-control" id="ap-license" name="license">
                              <option value>Select</option>
                              <option value="1">State Licensed Appraiser</option>
                              <option value="2">Certified Residential Appraiser</option>
                              <option value="3">Certified General Appraiser</option>
                            </select>
                          </div>

                          <div class="form-group">
                            <label for="ap-lic-number">License Number</label>
                            <input type="number" class="form-control" id="ap-lic-number" name="licenseNumber">
                          </div>

                          <div class="form-group">
                            <label for="ap-lic-exp">License Expiration</label>
                            <input type="text" class="form-control" id="ap-lic-exp" name="licenseexp">
                          </div>


                          <h5>Errors & Omissions</h5>

                          <div class="form-group">
                              <label>Errors & Omissions Insurance</label> <br>
                              <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" id="ap-eo-yes" name="eo" class="custom-control-input">
                                  <label class="custom-control-label" for="ap-eo-yes">Yes</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" id="ap-eo-no" name="eo" class="custom-control-input" checked>
                                  <label class="custom-control-label" for="ap-eo-no">No</label>
                                </div>

                          </div> 

                          <div class="form-group">
                            <label for="ap-eo-limit">E&O Liability Limit</label>
                            <input type="text" class="form-control" id="ap-eo-limit" name="eolimit">
                          </div> 

                          <div class="form-group">
                            <label for="ap-eo-exp">E&O Expiration Date</label>
                            <input type="text" class="form-control" id="ap-eo-exp" name="eoexp">
                          </div> 


                          <h5>Miscellaneous</h5>

                          <div class="form-group">
                              <label>FHA Approved</label> <br>
                              <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" id="fha-yes" name="fha" class="custom-control-input">
                                  <label class="custom-control-label" for="fha-yes">Yes</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" id="fha-no" name="fha" class="custom-control-input" checked>
                                  <label class="custom-control-label" for="fha-no">No</label>
                                </div>

                          </div> 

                          <div class="form-group">
                            <label for="ap-software">Appraisal Software</label>
                            <input type="text" class="form-control" id="ap-software" name="software">
                          </div>

                          <div class="form-group">
                            <label for="ap-approval-list">Client Approval Lists</label>
                            <textarea class="form-control" id="ap-approval-list" rows="3" name="approvalList"></textarea>
                          </div>

                          <div class="form-group">
                            <label for="ap-comments">Comments</label>
                            <textarea class="form-control" id="ap-comments" rows="3" name="comments"></textarea>
                          </div>

                          <h5>Coverage</h5>

                          <div class="form-group">
                            <label for="ap-select-state">Select State for Coverage</label>
                            <select class="form-control" id="ap-select-state" name="selectstate">
                            </select>
                          </div>

                          <div class="form-group">
                            <label for="ap-select-countries">Select Countries</label>
                            <select size="5" class="form-control" id="ap-select-countries" name="selectcountries">
                            </select>
                          </div>

                          <div class="form-group">
                            <label for="ap-countries-covered">Countries Covered</label>
                            <select multiple size="5" class="form-control {{ $errors->has('countriescovered') && $origin=='emailappraiser' ? ' is-invalid' : '' }}" id="ap-countries-covered" name="countriescovered" required>
                            </select>
                             <small id="emailHelp" class="form-text text-muted">Click to Remove</small>
                          </div>
                                                  

                          <input hidden name="form_id" value="emailappraiser">
                          <div class="g-recaptcha" data-sitekey="6Ld2-J4UAAAAAKd_TYc0BjiqfgiV4S9miVBJOvEk"></div>
                          <span id="captcha" class="has-error">Captcha is required.</span><br/>
                          <div class="form-group">
                              <button type="submit" class="btn btn-primary">Submit</button>
                              <button type="reset" class="btn btn-primary">Cancel</button>
                          </div>
                          
                        </form>

                         







                      </div>
                    </div> <!-- ./card --> 


	

@stop