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
                        {{csrf_field()}}
                        <input id="mot" type="text" class="form-control" name="mot" placeholder="Tapez mot clé et voir le résultat dans le console du Javascript" />
                        <p></p>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Company </th>
                            <th>Title </th>
                            <th>Description </th>
                            <th>Date</th>
                            <th>Skills</th>
                        <th colspan="2">Actions </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($JobOffers as $JobOffer)
                        <tr>

                            <td>{{$JobOffer->company->Name}} </td>
                            <td>{{$JobOffer->Title}} </td>
                            <td>{{$JobOffer->Description}} </td>
                            <td>{{$JobOffer->Date}} </td>
                            <td>{{$JobOffer->Skills}} </td>
                            <td><a class="btn badge-secondary" href="{{route('edit',['id'=>$JobOffer->id])}}">Modifier</a>  </td>
                            <td><a class="btn badge-danger" onclick="return confirm('Voulez cous vraiment supprimer cette compagnie ?')" href="{{route('destroy',['id'=>$JobOffer->id])}}">Supprimer</a>  </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$JobOffers ->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="{{asset('js/jquery-1.8.3.min.js')}}"></script>
<script>
    $( document ).ready(function() {

        $("#mot").keyup(function () {
            var _token= $('input[name="_token"]').val();
            var mot= $('input[name="mot"]').val();
            $.ajax({
                url:"api/get_job/"+mot,
                datatype:'html',

                method:'GET',
                success: function (r) {
                    if(r.length > 0){

                       console.log(r);
                    }else{

                        console.log('Pas de résultat');
                    }
                }
            });
        });
    });
</script>
