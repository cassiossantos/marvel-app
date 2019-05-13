
@extends('layout.app')
@section('content')
<div class="row">
    @if ($character->count() > 0)
     @foreach ($character as $char)
        <div style='margin-bottom: 20px;' class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <img alt="..." src="{{$char['thumbnail']}}">
            </div>
            <div class="col-xs-12 col-md-6">
                <h2>{{$char['name']}}</h2>
                <p>
                    {{$char['description'] ? : "No description"}}
                </p>
                <div class="links">

                    @if ($char['urls'])
                    <a href="{{$char['urls'][2]['url']}}">Comics</a>
                    @endif
                </div>
        </div>
        @endforeach
    @else
    <div class="container">
        Nenhum contéudo! <a href="{{route('welcome')}}">Voltar para tela inicial!</a>
        </div>
    @endif
</div>
@endsection

