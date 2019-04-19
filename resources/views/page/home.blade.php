@extends ('main')

@section('content')
	         <!-- sidebar -->
            <?php $origin = session('origin_form'); ?>
               <div class="col-lg-4 col-md-5 order-2">
                 <div class="sidebar">
                    <!-- card -->
                    <div class="card">
                      <div class="card-header">
                        request information
                      </div>
                      <div class="card-body">
                        <p >Contact a Broad Street Valuations, Inc solutions consultant today at (888) 885 - 7770 or by completing the brief form below.</p>
                        @if (count($errors) >0 && $origin=='emailrequest')
                              <div class="alert alert-danger">
                                  <ul>
                                    @foreach($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                    @endforeach  
                                  </ul>
                              </div>  
                          @endif
                          @if (($message = session('success')) && $origin=='emailrequest')
                              <div class="alert alert-success" role="alert">
                                  {{ __($message) }}
                              </div>
                          @endif 
                        <form method="POST" action="{{url('home/sendrequest')}}" id="emailform">
                        {{ csrf_field() }}
                          <div class="form-group">
                            <label for="InputFullname">{{ __('Full Name') }}</label>
                            <input type="text" class="form-control {{ $errors->has('fullname') && $origin=='emailrequest' ? ' is-invalid' : '' }}" id="InputFullname" name="fullname">
                          </div>
                          <div class="form-group">
                            <label for="InputEmail1">{{ __('Email') }}</label>
                            <input type="email" class="form-control {{ $errors->has('email') && $origin=='emailrequest' ? ' is-invalid' : '' }}" id="InputEmail1" aria-describedby="emailHelp" name="email" value="{{ old('email') }}">
                          </div>
                          <div class="form-group">
                            <label for="InputPhone">{{ __('Phone number') }}</label>
                            <input type="number" class="form-control {{ $errors->has('phone') && $origin=='emailrequest' ? ' is-invalid' : '' }}" id="InputPhone" name="phone">
                          </div>
                          <div class="form-group">
                            <label for="AreaComment">{{ __('Questions / Comments') }}</label>
                            <textarea class="form-control {{ $errors->has('comment') && $origin=='emailrequest' ? ' is-invalid' : '' }}" id="AreaComment" rows="3" name="comment"></textarea>
                          </div>
                          <input hidden name="form_id" value="mailcomment">
                          <div class="g-recaptcha" data-sitekey="6Ld2-J4UAAAAAKd_TYc0BjiqfgiV4S9miVBJOvEk"></div>
                          <span id="captcha" class="has-error">Captcha is required.</span><br/>
                          <button type="submit" class="btn btn-brown">{{ __('Submit Form') }}</button>  <button type="reset" class="btn btn-brown">{{ __('Clear Form') }}</button>
                        </form>

                      </div>
                    </div> <!-- ./card -->


                    <!-- card -->
                    <div class="card">
                      <div class="card-header">
                        contact information
                      </div>
                      <div class="card-body">
                        <h6>Broad Street Valuations, Inc </h6>
                        <p>211 Elm Street <br> Holly, MI 48442 </p>

                        <br>

                        <p><strong>Phone:</strong> (888) 885-7770 <br>
                        <strong>Fax:</strong> (866) 885-8771 <br>
                        <strong>Email:</strong><a href="#"> sales@broadstreetvaluations.com </a></p>


                      </div>
                    </div> <!-- ./card -->


               </div>  
            </div><!-- ./sidebar -->   


            <!-- right-content -->
            
              <div class="col-lg-8 col-md-7">
                  <div class="right-content">
                     <!-- slider -->
                      <div class="bd-example">
                        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                          
                          <div class="carousel-inner">
                            <div class="carousel-item active">
                              <img src="img/1.jpg" class="d-block w-100" alt="...">
                              <div class="carousel-caption">
                                <h5>Why Broad Street?</h5>
                                <p>Simply stated, we have been and will continue to be an essential, reliable partner for our clients, allowing them to close more loans.</p>
                              </div>
                            </div>

                          <div class="carousel-item">
                              <img src="img/2.jpg" class="d-block w-100" alt="...">
                              <div class="carousel-caption d-none d-md-block">
                                <h5>Products</h5>
                                <p>Broad Street Valuations provides all traditional residential appraisal products required for mortgage lending as well as custom designed products.</p>
                              </div>
                            </div>
                            <div class="carousel-item">
                              <img src="img/3.jpg" class="d-block w-100" alt="...">
                              <div class="carousel-caption d-none d-md-block">
                                <h5>Technology</h5>
                                <p>Broad Street Valuations' clients and employees enjoy the benefits of cutting edge technology, both standardized and proprietary.</p>
                              </div>
                            </div> 
                            <div class="carousel-item">
                              <img src="img/4.jpg" class="d-block w-100" alt="...">
                              <div class="carousel-caption d-none d-md-block">
                                <h5>Advantages</h5>
                                <p>The Broad Street Valuations team has many years of appraisal and appraisal management experience, and we are looking forward to a successful partnership.</p>
                              </div>
                            </div> 



                          </div>
                          <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                          </a>
                          <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                          </a>
                        </div>
                      </div>


                     <!-- ./slider -->

                     <div class="inner-content">
                     <p class="lead text-white">Broad Street Valuations, Inc is an independent nationwide Appraisal Management Company specializing in residential real estate appraisals in all areas of all 50 states. We offer our clients fantastic customer service, state of the art technology, and customizable appraisal solutions. Our expansive appraiser panel allows us to meet your needs for compliance, turn time, and quality. We have the experience, the technology, the talent, and the appraiser panel to quickly establish our company as the leading appraisal provider on your approved list.</p>
                    </div>

                    <hr class="mb-4 my-4">

                    <h4 class="text-white mb-4">National Appraisal Management Company</h4>

                    <div class="inner-content">
                     <ul class="front-list">
                        <li>National Conventional, FHA, and USDA appraisal coverage</li>
                        <li>Appraiser Independence Requirements and Truth in Lending Act Compliant</li>
                        <li>Dedicated and highly available account managers</li>
                        <li>State of the Art web portal: Order and monitor appraisal progress 24x7</li>
                        <li>Flexible invoicing options with central credit card processing for payments</li>
                        <li>Access to major lender approval lists</li>
                        <li>Aggressive turnaround times</li>
                     </ul>
                    </div>

                  </div>  
            </div><!-- ./right-content -->
	

@stop