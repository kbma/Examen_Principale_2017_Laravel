@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a class="btn btn-primary" href="{{route('create')}}">Ajouter une offre</a>
                        <a class="btn btn-primary" href="{{route('companies')}}">Lister companies</a>
                        <p></p>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Company </th>
                            <th>Title </th>
                            <th>Description </th>
                            <th>Skills </th>

                        <th > </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($companies as $companie)

                            @foreach($companie->joboffers as $offers)
                            <tr>
                                <td>{{$companie->Name}} </td>
                            <td>{{$offers->Title}} </td>
                            <td>{{$offers->Description}} </td>
                             <td>{{$offers->Skills}} </td>
                            <td>
                                @if((\App\JobOfferUser::where('joboffer_id',$offers->id))->where('user_id',auth()->id())->count() )
                                    <a class="btn badge-danger" href="{{route('retirer_favoris',['joboffer_id'=>$offers->id])}}">Retirer Favoris</a>
                                    @else
                                    <a class="btn badge-success" href="{{route('ajouter_favoris',['joboffer_id'=>$offers->id])}}">Favoris</a>

                                @endif

                                  </td>
                            </tr>
                            @endforeach

                        @endforeach
                        </tbody>
                    </table>
                    {{$companies ->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
