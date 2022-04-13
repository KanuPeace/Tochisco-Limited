<?php

namespace App\Http\Controllers\Admin\Membership;

use App\Http\Controllers\Controller;
use App\Helpers\Constants;
use App\Helpers\MediaHandler;
use App\Models\Plan;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;


class PlansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $mediaHandler;
    public function __construct(MediaHandler $mediaHandler)
    {
        $this->mediaHandler = $mediaHandler;
    }


    public function index()
    {
       
        $plans = Plan::orderby("id" , "desc")->paginate(20);
        $sn = $plans->firstItem();

       return view('admin.membership_plans.index', [
          'plans' => $plans , 'sn' => $sn      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $boolOptions = Constants::BOOL_OPTIONS;
        return view('admin.membership_plans.create',[
            "boolOptions" => $boolOptions,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "name" => "required|string|unique:plans,name",
            "is_active" => "required|in:0,1",
            "duration" => "required|string",
            "price" => "required|string",
            "discount" => "required|string",
            "elite_points" => "required|string",
            "logo_id" => "required|image",
        ]);


        if(!empty($logo = $data["logo_id"] ?? null)){
            $filePath = putFileInPrivateStorage($logo, "temp");
            $logoFile = $this->mediaHandler->saveFromFilePath(storage_path("app/$filePath"), "plan_logos", null, auth()->id());
            $data["logo_id"] = $logoFile->id;
        }


        $plan = Plan::create($data);
        return redirect()->route("admin.membership-plans.edit" , $plan->id)->with("success_message", "Plan created successfully!");
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
        $plan = Plan::findOrFail($id);
        $permissions = Permission::where("guard_name" , "plan")->get();
        $planFeatures = $plan->getFeatures();
        $boolOptions = Constants::BOOL_OPTIONS;
        return view("admin.membership_plans.edit" , [
            "plan" => $plan ,
            "permissions" => $permissions , "planFeatures" => $planFeatures , "boolOptions" => $boolOptions ]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plan  $plan)
    {
        $plan->delete();
        return back()->with("error_message", "Deleted successfully!");
    }
}
