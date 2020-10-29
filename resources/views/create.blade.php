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

                        <a class="btn btn-primary" href="{{route('JobOffers')}}">Lister les offres</a>
                        <p></p>
                    <form action="{{route('store')}}" method="get">
                        {{csrf_field()}}

                        <div class="row">
                            <div class="col-12">
                                <label class="col-form-label">Company</label>
                                <select class="form-control" name="company_id">
                                   @foreach( App\Company::all() as $company)
                                    <option  value="{{$company->id}}">{{$company->Name}}</option>
                                       @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label class="col-form-label">Title</label>
                                <input class="form-control" type="text" name="Title" value="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label class="col-form-label">Description</label>
                                <input class="form-control" type="text" name="Description" value="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label class="col-form-label">Date</label>
                                <input class="form-control" type="date" name="Date" value="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label class="col-form-label">Skills</label>
                                <input class="form-control" type="text" name="Skills" value="">
                            </div>
                        </div>
                        <p></p>

                        <div class="row">
                            <div class="col-6">
                                <input class="btn btn-success" type="submit"  value="Ajouter">
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
