<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome!</div>
                  <div class="card-body">
                   {{-- @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                           {{ __('A fresh mail has been sent to your email address.') }}
                       </div>
                   @endif --}}
                   <p>Email received from: {{ $fromEmail }}</p>
                   <p>User information:</p>
                       {{-- Name: --}}
                       Name : {!! $fromName !!}<br/>
                       {{-- Phone: --}}
                       Phone : {!! $phone !!}<br/>
                        {{-- Subject:  --}}
                        Subject : {{ $subject }}<br/>
                       {{-- Pesan:  --}}
                       Message : {{ $body }}<br/>
               </div>
           </div>
       </div>
   </div>
</div>