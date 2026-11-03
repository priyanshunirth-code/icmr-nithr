<div class="bg-primary mt-1">
    <div class="p-3">
        <div class="row gx-4 justify-content-between">
            <div class="col-auto">
                <div class="">
                    {{-- <img src="/img/team-1.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm"> --}}
                    <img src="{{asset('img/icmr-new-logo.jpg')}}" alt="">

                </div>
            </div>
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h5 class="mb-1  text-light">
                        {{ auth()->user()->full_name ?? 'Name' }} 
                    </h5>
                    <p class="mb-0 font-weight-bold text-sm text-light">
                        
                       {{ env('REGISTRATION_PREFIX') }}{{ auth()->user()->registration_no }} 

                    </p> 
                    
                     <a href="{{route('logoutt')}}" class="mb-0 font-weight-bold text-sm  text-light" >
                        Log-Out
                    </a> <br>
                    <a href="{{route('registration')}}" class="mb-0 font-weight-bold text-sm  text-light" >
                        Home
                    </a>
                </div>
            </div>
            
        </div>
    </div>
</div>

