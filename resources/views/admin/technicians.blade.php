@extends('layouts.admin')

@section('content')
    <div class="content">
        <a class="btn ajout" data-toggle="modal" data-target="#modalAjout"  >
            <i class="fa fa-plus"></i> Ajouter un technicien
        </a>
        <div class="women_main">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @elseif (session('fail'))
                <div class="alert alert-danger">
                    {{ session('fail') }}
                </div>
            @endif
            <!-- start content -->
             @if($techs->isNotEmpty())
            <ul>
                @foreach ($techs as $key=>$tech)
                    <li >
                        <div>
                            <img src="/storage/uploads/users/{{ $tech->details->image }}" class="imge">
                            <h4>{{ $tech->details->first_name }} {{ $tech->details->last_name }}</h4>
                            <a data-toggle="modal" data-target="#dataModal{{$key}}" class="btn consulter">Consulter</a>
                            <form action="{{ route('admin.deleteTechnician', $tech->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <input class="btn btn-danger dan" type="submit" value="Suprimer">
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
            @else
                <h3>Pas des Techniciens</h3>
            @endif
        <!-- end content -->
        {{ $techs->setPath(url()->current())->render() }}
        </div>
    </div>
@foreach ($techs as $key=>$tech)
    <div class="modal video-modal fade" id="dataModal{{$key}}" tabindex="-1" role="dialog" aria-labelledby="dataModal{{$key}}">
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
                                    <img src="/storage/uploads/users/{{ $tech->details->image }}" style="width: 40%;height: 40%;margin-left: 10%">
                                    <h3><span>Nom:</span> {{ $tech->details->last_name }}</h3>
                                    <h3><span>Prénom:</span> {{ $tech->details->first_name }}</h3>
                                    <h3><span>cin:</span> {{ $tech->cin }}</h3>
                                    <h3><span>Email:</span> {{ $tech->details->email }}</h3>
                                    <h3><span>Adresse:</span> {{ $tech->details->address }}</h3>
                                    <h3><span>Telephone:</span> {{ $tech->details->phone }}</h3>
                                    <h3><span>Post:</span>{{ $tech->post}}</h3>
                                    <h3><span>Bio:</span> {{ $tech->bio }}</h3>
                                    <a href="{{ route('admin.techniciansOrders', $tech->id) }}" class="btn button-submit">Commandes</a>
                                        @if ($tech->admin)
                                            <form method="POST" action="{{ route('admin.unmakeAdmin', $tech->id) }}">
                                                @csrf
                                                <input type="hidden" value="PATCH" name="_method">
                                                <input type="submit" class="btn button-danger" value="Retirer des Admins">
                                            </form>
                                        @else
                                            <form method="POST" action="{{ route('admin.makeAdmin', $tech->id) }}">
                                                @csrf
                                                <input type="hidden" value="PATCH" name="_method">
                                                <input type="submit" class="btn button-submit" value="Ajouter aux Admins">
                                            </form>
                                        @endif
                                    
                                </div>
                                <div class="form">
                                    <form method="POST" action="{{ route('admin.updateTechnician', $tech->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="_method" value="PATCH">
                                        <img src="/storage/uploads/users/{{ $tech->details->image }}" style="width: 30%;height: 30%;margin-left: 10%">
                                        <input type="file" name="image" class="form-control-file" style="margin: 2%">
                                        <input type="text" name="last_name" placeholder="Nom" value="{{ $tech->details->last_name }}">
                                        <input type="text" name="first_name" placeholder="Prénom" value="{{ $tech->details->first_name }}">
                                        <input type="text" name="cin" placeholder="Cin" value="{{ $tech->cin }}">
                                        <input type="text" name="email" placeholder="Email" value="{{ $tech->details->email }}">
                                        <input type="text" name="address" placeholder="Addresse" value="{{ $tech->details->address }}">
                                        <input type="text" name="phone" placeholder="Tel" value="{{ $tech->details->phone }}">
                                        <select name="post">
                                            <option selected disabled>Poste</option>
                                            @foreach (['Technicien Hardware','Technicien Software','Technicien Informatique','Ingenieur Informatique'] as $job)
                                                @if($job==$tech->post)
                                                    <option selected value="{{ $job }}">{{ $job }}</option>
                                                @else
                                                    <option value="{{ $job }}">{{ $job }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <textarea name="bio" cols="40" rows="6" style="resize: none">{{ $tech->bio }}</textarea>
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
                                <h3>Ajouter un technicien</h3>
                                <form method="POST" action="{{ route('admin.createTechnician') }}" enctype="multipart/form-data">
                                    @csrf
                                    <img src="/images/repair.png" style="width: 30%;height: 30%;margin-left: 10%">
                                    <input type="file" name="image" class="form-control-file" style="margin: 2%">
                                    <input type="text" name="last_name" placeholder="Nom" required>
                                    <input type="text" name="first_name" placeholder="Prénom" required>
                                    <input type="text" name="cin" placeholder="Cin" required>
                                    <input type="text" name="email" placeholder="Email" required>
                                    <input type="text" name="address" placeholder="Adresse" required>
                                    <input type="text" name="phone" placeholder="Téléphone" required>
                                    <select name="post" >
                                        <option selected disabled>Poste</option>
                                        @foreach (['Technicien Hardware','Technicien Software','Technicien Informatique','Ingenieur Informatique'] as $job)
                                            <option value="{{ $job }}">{{ $job }}</option>
                                        @endforeach
                                    </select>
                                    <textarea name="bio" cols="40" rows="6" style="resize: none"></textarea>

                                    <input type="submit" value="ajouter">
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
