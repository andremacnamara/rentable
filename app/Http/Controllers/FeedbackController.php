<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Feedback;
use App\Tenancy;
use App\User;

class FeedbackController extends Controller
{
    public function index(){
        $feedback = Feedback::where('tenant_id', Auth::user()->id)->orWhere('landlord_id', Auth::user()->id)->get();
        return view('pages/feedback/index', compact('feedback'));
    }

    public function create(){
        $tenancy = Tenancy::where('tenant_id', Auth::user()->id)->get();
        $options = DB::table('feedback_options')->get();
        $options2 = DB::table('feedback_options2')->get();

        return view('pages/feedback/create', compact('tenancy','options','options2'));
    }

    public function store(Request $request){

        $this->validate($request, [
            "landlord_name" => "required",
            "tenant_name"   => "required",
            "property_address" => "required",
            "overall_tenancy" => "required",
            "landlord_communication" => "required",
            "maintainence_response" => "required",
            "rent_reflect" => "required",
            "happy_continue" => "required",
            "comment" => "required",
            "refer" => "required",
          ]);
          
        $feedback = Feedback::create([
            "landlord_name" => $request->landlord_name,
            "landlord_id"   => $request->landlord_id,
            "tenant_name"   => $request->tenant_name,
            "tenant_id"     => $request->tenant_id,
            "property_address" => $request->property_address,
            "overall_rating" => $request->overall_tenancy,
            "landlord_communication_rating" => $request->landlord_communication,
            "issue_resolved_speed_rating" => $request->maintainence_response,
            "rent_market_rate" => $request->rent_reflect,
            "happy_to_continue_tenancy" => $request->happy_continue,
            "other_comments" => $request->comment,
            "recommend_landlord" => $request->refer
        ]);

        return redirect("/feedback");
    }

    public function show($id){
        $feedback = Feedback::where('id', $id)->first();
        return view('/pages/feedback/show', compact('feedback'));
    }
}
