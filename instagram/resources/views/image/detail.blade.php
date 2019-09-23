@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @include('includes.message')

                <div class="card pub_image pub_image_detail">
                    <div class="card-header">
                        @if($image->user->image)
                            <div class="container-avatar">
                                <img src="{{ route('user.avatar', ['filename' => $image->user->image]) }}" class="avatar" />
                            </div>
                        @endif
                        <div class="data-user">
                            {{ $image->user->name.' '.$image->user->surname }}
                            <span class="nickname">
                        {{ ' | @'.$image->user->nick }}
                    </span>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="image-container image-detail">
                            <img src="{{ route('image.file', ['filename' => $image->image_path]) }}" />
                        </div>
                        <div class="description">
                            <span class="nickname">
                                {{ '@'.$image->user->nick }}
                            </span>
                            <span class="nickname date">
                                {{ ' | '. FormatTime::LongTimeFilter($image->created_at) }}
                            </span>
                            <p>
                                {{ $image->description }}
                            </p>
                            <div class="likes">
                                <img src="{{ asset('/img/heart-black.png') }}" />
                            </div>
                            <div class="clearfix"></div>
                            <div class="comments">
                                <h2>Comentarios ({{ count($image->comments) }})</h2>
                                <hr>

                                <form method="post" action="{{ route('comment.save') }}">
                                    @csrf

                                    <input type="hidden" name="image_id" value="{{ $image->id }}" />
                                    <p>
                                        <textarea class="form-control @error('content') is-invalid @enderror" name="content"></textarea>
                                        @error('content')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </p>
                                    <button type="submit" class="btn btn-success">
                                        Enviar
                                    </button>
                                </form>

                                <hr>

                                @foreach($image->comments as $comment)
                                <div class="comment">
                                    <span class="nickname">
                                        {{ '@'.$comment->user->nick }}
                                    </span>
                                    <span class="nickname date">
                                        {{ ' | '. FormatTime::LongTimeFilter($comment->created_at) }}
                                    </span>
                                    <p>
                                        {{ $comment->content }}
                                    </p>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
