@extends('layouts.public')
@section('content')
<div style="margin-top: 3%">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               Se connecter & S'inscrire                 
            </div>
            <section>
                @if (count($errors) > 0)
                    @foreach($errors as $error)
                        <span class="invalid-feedback">
                            <strong>{{ $error }}</strong>
                        </span>
                    @endforeach
                @endif
               <div class="modal-body">
                  <div class="w3_login_module">
                     <div class="module form-module">
                       <div class="toggle"><a href="{{ route('register') }}"><i class="fa fa-times fa-pencil"></i></a>
                        <div class="tooltip"> S'inscrire</div>
                       </div>
                       <div class="form">
                        <h3>Vous avez un compte?</h3>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <input type="text" name="email" placeholder="Email" required>
                            <input type="password" placeholder="Mot de passe" name="password" required>
                            <input type="submit" value="Se Connecter">
                        </form>
                       </div>
                       <div class="cta"><a href="#">Mot de passe oublié?</a></div>
                     </div>
                  </div>
               </div>
            </section>
         </div>
      </div>
   </div>
@endsection