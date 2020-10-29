<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests\AddJobRequest;
use App\JobOffer;
use App\JobOfferUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobOfferController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $JobOffers =JobOffer::paginate(5);
        return view('index',['JobOffers'=>$JobOffers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddJobRequest $request)
    {
        $JobOffer = new JobOffer();
        $JobOffer->company_id=$request->company_id;
        $JobOffer->Title=$request->Title;
        $JobOffer->Description=$request->Description;
        $JobOffer->Date=$request->Date;
        $JobOffer->Skills=$request->Skills;
        $JobOffer->save();

        return redirect()->route('JobOffers');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $JobOffer =JobOffer::where('id',$id)->first();
        return view('edit',['JobOffer'=>$JobOffer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $JobOffer = JobOffer::find($id);
        $JobOffer->company_id= $request->company_id;
        $JobOffer->Title= $request->Title;
        $JobOffer->Description= $request->Description;
        $JobOffer->Date= $request->Date;
        $JobOffer->Skills= $request->Skills;
        $JobOffer->save();
        return redirect()->route('JobOffers');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $JobOffer =  JobOffer::find($id);
       $JobOffer -> delete();
       return redirect()->route('JobOffers');
    }

    public function ajouter_favoris($joboffer_id){
        $JOU= new JobOfferUser();
        $JOU ->user_id=Auth::id();
        $JOU ->joboffer_id=$joboffer_id;
        $JOU->save();
        return redirect()->route('companies');
    }


    public function retirer_favoris($joboffer_id){
        $JOU= JobOfferUser::where(['user_id'=> Auth::id() ,'joboffer_id'=>$joboffer_id ])->delete();
       //$JOU->destroy();

        return redirect()->route('companies');
    }
}
