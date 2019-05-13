@extends('layout.app')
@section('content')


    <div class="row">       
        @if ($characters)   
          @foreach ($characters as $character)
                <div class=" col-xs-12 col-md-4 col-sm-6 col-lg-3">
                    <a href="{{route('details', ['id'=>$character['id'] ])}}">

                    <div class="card" style="">
                        <img src="{{$character['thumbnail']}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <a href="{{route('details', ['id'=> $character['id']])}}">
                                {{$character['name']}}
                            </a>
                        </div>
                    </div>
                </a>

                </div>
            @endforeach           
         @endif

         @if ($errors)
         <div class="container">
            Não foi possível exibir essa página no momento! Por favor tente novamente mais tarde!
         </div>
         @endif
    </div>
@endsection