@extends('layouts.admin')

@section('content')
    <div class="content">
        <a class="btn ajout" data-toggle="modal" data-target="#modalAjout" >
            <i class="fa fa-plus"></i> Ajouter une promotion
        </a>
        <div class="women_main">
            <!-- start content -->
            <ul>
                @foreach ($promotions as $key=>$promotion)
                    <li >
                        <div>
                           <img class="imge" src="/storage/uploads/promotions/{{ $promotion->image }}">
                            <h4 > {{ $promotion->title }} </h4>
                           <a id="login" href="#" class="btn consulter" data-toggle="modal" data-target="#dataModal{{ $key }}">consulter</a>
                            <form action="{{ route('admin.promotions.delete', ['id'=>$promotion->id]) }}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <input class="btn btn-danger dan" type="submit" value="Suprimer">
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
            {{ $promotions->links() }}
        <!-- end content -->
        </div>
    </div>

        @foreach ($promotions as $key=>$promotion)
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
                                                <h3>{{ $promotion->title }}</h3>
                                                <img src="/storage/uploads/promotions/{{ $promotion->image }}" style="width: 70%;height: 70%;margin-left: 10%">
                                                <h3>Categorie: <span>{{ $promotion->category }}</span></h3>
                                            </div>
                                        <div class="form ">
                                            <form method="POST" action="{{ route('admin.promotions.update', $promotion->id) }}" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="_method" value="PATCH">
                                                <img src="/storage/uploads/promotions/{{ $promotion->image }}" style="width: 70%;height: 70%;margin-left: 10%">
                                                <input type="file" name="image" class="form-control-file" style="margin: 2%">
                                                <select  name="category" >
                                                    <option selected disabled>Categorie</option>
                                                    @foreach (['smartphone', 'laptop', 'accessorie'] as $cat)
                                                        @if($cat==$promotion->category)
                                                            <option selected value="{{ $cat }}">{{ $cat }}</option>
                                                        @else
                                                            <option value="{{ $cat }}">{{ $cat }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                <input type="text" name="title" placeholder="description" value="{{ $promotion->title }}">
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
            $('.toggle').click(function () {
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
                                <div class="toggle" style="background-color: white;border-top: 5px solid #0aca89;display: none;">

                                </div>
                                <div class="form">
                                    <h3>promotion</h3>
                                    <form method="POST" action="{{ route('admin.promotions.create') }}" enctype="multipart/form-data">
                                        @csrf
                                        <img src="/images/promo.png" style="width: 70%;height: 70%;margin-left: 10%">
                                        <input type="file" name="image" class="form-control-file" style="margin: 2%">
                                        <select name="category" >
                                            <option selected disabled>Categorie</option>
                                            @foreach (['smartphone', 'laptop', 'accessorie'] as $cat)
                                                <option value="{{ $cat }}">{{ $cat }}</option>
                                            @endforeach
                                        </select>
                                        <input type="text" name="title" placeholder="description" required="">
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
@endsection 