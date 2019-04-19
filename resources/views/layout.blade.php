@include ('includes.header')


        <!-- main-content -->
        <div class="main-content">
          <div class="row">

              <!-- sidebar -->
            
               <div class="col-lg-4 col-md-5">
                 <div class="sidebar">
                    

                    @include('includes.sidebar')

               </div>  
            </div><!-- ./sidebar -->   


              <!-- right-content -->
            
              <div class="col-lg-8 col-md-7">
                  <div class="right-content">

                   @yield('content') 

                  </div>  
              </div><!-- ./sidebar -->        

                  
                            
          </div><!-- ./row -->   
        </div>
        <!-- ./main-content -->

        
@include ('includes.footer')