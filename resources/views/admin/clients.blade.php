@extends('layouts.admin')

@section('content')
    <div class="content">
        <a class="btn  ajout "   data-toggle="modal" data-target="#modalAjout" href="#" >
            <i class="fa fa-plus"></i> Ajouter un client
        </a>
        <div class="women_main">
            <!-- start content -->
            <ul>
                @foreach ($clients as $key=>$client)
                    <li >
                        <div>
                            <img src="/storage/uploads/users/{{ $client->details->image }}" class="imge">
                            <h4 >{{ $client->details->first_name }} {{ $client->details->last_name }}</h4>
                            <a class="btn  consulter" data-toggle="modal" data-target="#dataModal{{ $key }}">Consulter</a>
                            <form action="{{ route('admin.deleteClient', ['id'=>$client->user_id]) }}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <input class="btn btn-danger dan" type="submit" value="Suprimer">
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
             {{ $clients->setPath(url()->current())->render() }}
        <!-- end content -->
        </div>
    </div>

    <script>
        $('query').on('change', function () {
            $ajax({
                type: "GET",
                response:json,
                url: "/search_clients?query"+this.value,
                success: function(response){
                    console.log(response);
                },
                errror: function (response) {
                    console.log(response);
                }
            });
        })
    </script>

    @foreach ($clients as $key=>$client)
        <div class="modal video-modal fade" id="dataModal{{ $key }}" tabindex="-1" role="dialog" aria-labelledby="dataModal{{ $key }}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>                 
                    </div>
                    <section>
                    <div class="modal-body">
                        <div class="w3_login_module">
                            <div class="module form-module">
                                <div class="toggle"><i class="fa fa-times fa-pencil"></i>
                                    <div class="tooltip">mise a jour</div>
                                </div>
                                <div class="form">
                                        <img src="/storage/uploads/users/{{ $client->details->image }}" style="width: 40%;height: 40%;margin-left: 10%">
                                        <h3>Nom: {{ $client->details->last_name }}</h3>
                                        <h3>Prénom: {{ $client->details->first_name }}</h3>
                                        <h3>Email: {{ $client->details->email }}</h3>
                                        <h3>Adresse: {{ $client->details->address }}</h3>
                                        <h3>Telephone: {{ $client->details->phone }}</h3>
                                        <a class="btn btn-info" href="{{ route('admin.clientOrders', $client->user_id) }}">Commandes</a>
                                </div>
                                <div class="form">
                                    <form method="POST" action="{{ route('admin.updateClient', $client->user_id) }}" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="_method" value="PATCH">
                                        <img src="/storage/uploads/users/{{ $client->details->image }}" style="width: 30%;height: 30%;margin-left: 10%">
                                        <input type="file" name="image" class="form-control-file" style="margin: 2%">
                                        <input type="text" name="last_name" placeholder="Nom" value="{{ $client->details->last_name }}">
                                        <input type="text" name="first_name" placeholder="Prénom" value="{{ $client->details->first_name }}">
                                        <input type="text" name="email" placeholder="Email" value="{{ $client->details->email }}">
                                        <input type="text" name="address" placeholder="Addresse" value="{{ $client->details->address }}">
                                        <input type="text" name="phone" placeholder="Télé" value="{{ $client->details->phone }}">
                                        <input type="submit" value="Mise a jour">
                                        <input type="reset" value="Annuler">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    @endforeach
   <script>
      $('.toggle').click(function(){
        // Switches the Icon
        $(this).children('i').toggleClass('fa-pencil');
        // Switches the forms  
        $('.form').animate({
         height: "toggle",
         'padding-top': 'toggle',
         'padding-bottom': 'toggle',
         opacity: "toggle"
        }, "slow");
      });
   </script>


<!---modal mte3 l'ajout-->
<div class="modal video-modal fade" id="modalAjout" tabindex="-1" role="dialog" aria-labelledby="modalAjout">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
         
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>                 
            </div>
            <section>
               <div class="modal-body">
                  <div class="w3_login_module">
                     <div class="module form-module">
                       <div class="toggle" style="background-color: white;border-top: 5px solid #0aca89;">
                        
                       </div>
                    
                       <div class="form">
                        <h3>Ajouter un client</h3>
                        <form method="POST" action="{{ route('admin.addClient') }}" enctype="multipart/form-data">
                            @csrf
                            <img src="/images/clients-pic.jpg" style="width: 70%;height: 30%;margin-left: 10%">
                            <input type="file" name="image" class="form-control-file" style="margin: 2%">
                            <input type="text" name="last_name" placeholder="Nom" required>
                            <input type="text" name="first_name" placeholder="Prénom" required>
                            <input type="email" name="email" placeholder="Email" required>
                            <input type="text" name="address" placeholder="Addresse" required>
                            <input type="text" name="phone" placeholder="Telephone" required>
                            <input type="submit" value="Ajouter">
                            <input type="reset" value="Annuler">
                        </form>
                       </div>
                     </div>
                  </div>
               </div>
            </section>
         </div>
      </div>
   </div>
@endsection
