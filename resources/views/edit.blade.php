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
                        <a class="btn btn-primary" href="{{route('JobOffers')}}">Lister les offres</a>
                        <p></p>
                    <h2>Modifier: {{$JobOffer->Title}}</h2>

                    <form action="{{route('update',['id'=>$JobOffer->id])}}" method="get">
                        {{csrf_field()}}

                        <div class="row">
                            <div class="col-12">
                                <label class="col-form-label">Company</label>
                                <select class="form-control" name="company_id">
                                   @foreach( App\Company::all() as $company)
                                    <option @if($JobOffer->company->id ==$company->id) selected @endif value="{{$company->id}}">{{$company->Name}}</option>
                                       @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label class="col-form-label">Title</label>
                                <input class="form-control" type="text" name="Title" value="{{$JobOffer->Title}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label class="col-form-label">Description</label>
                                <input class="form-control" type="text" name="Description" value="{{$JobOffer->Description}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label class="col-form-label">Date</label>
                                <input class="form-control" type="date" name="Date" value="{{$JobOffer->Date}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label class="col-form-label">Skills</label>
                                <input class="form-control" type="text" name="Skills" value="{{$JobOffer->Skills}}">
                            </div>
                        </div>
                        <p></p>

                        <div class="row">
                            <div class="col-6">
                                <input class="btn btn-success" type="submit"  value="Modifier">
                                <input class="btn btn-primary" type="reset"  value="Annuler">
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
