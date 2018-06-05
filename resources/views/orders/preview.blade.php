@extends('layouts.public')
@section('content')
    <div class="container">
        <div class="row">
            <div class="comments-container">
                <ul id="comments-list" class="comments-list ScrollStyle">
                    @if ($order->discussion->history->isEmpty())
                        Pas de messages
                    @else
                        @foreach ($order->discussion->history->sortByDesc('created_at') as $msg)
                            <li>
                                <div class="comment-main-level">
                                <!-- Avatar -->
                                    <div class="comment-avatar"><img src="/storage/uploads/users/{{ $msg->sender->image }}" alt=""></div>
                                    <!-- Contenedor del Comentario -->
                                    <div class="comment-box">
                                        <div class="comment-head">
                                            <h6 class="comment-name">{{ $msg->sender->first_name }} {{ $msg->sender->last_name }}</h6>
                                            <span>{{ $msg->created_at->diffForHumans() }}</span>
                                        </div>
                                        <div class="comment-content">
                                            {{ $msg->context }}
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    @endif
                </ul>
                <div class="row">

                    <div class="col-md-12">
                        <div class="widget-area no-padding blank">
                            <div class="status-upload">
                                <form method="POST" action="{{ route('discussion.reply', $order->discussion->id) }}">
                                @csrf
                                    <textarea name="context" placeholder="Nouveau message..." ></textarea>
                                    <button type="submit" class="btn btn-success green"><i class="fa fa-share"></i>Envoiyer</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection