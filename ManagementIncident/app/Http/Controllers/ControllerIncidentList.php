<?php

namespace App\Http\Controllers;
use App\ModelIncident;
use App\ModelIncidentMini;
use App\ModelIncidentAnalyzing;
use App\Http\Requests;
use Illuminate\Http\Request;

class ControllerIncidentList extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id = null) {
        if ($id == null) {
            return ModelIncident::orderBy('id', 'asc')->get();
        } else {
            return $this->show($id);
        }
    }
    public function findIncidentAnalyzing() {
        return ModelIncident::where('pic_analyzing', "Aulia")->orderBy('id', 'asc')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function createNewIncident(Request $request) {
        $incident = new ModelIncident;
        $incident->raise_date = $request->input('raise_date');
        $incident->priority = $request->input('priority');
        $incident->status = $request->input('status');
        $incident->module = $request->input('module');
        $incident->sub_module = $request->input('sub_module');
        $incident->pic = $request->input('pic');
        $incident->category_group = $request->input('category_group');
        $incident->category_root_cause = $request->input('category_root_cause');
        $incident->issue_description = $request->input('issue_description');
        $incident->suspected_reason = $request->input('suspected_reason');
        $incident->respon_taken = $request->input('respon_taken');
        $incident->decided_solution = $request->input('decided_solution');
        $incident->target_fixed_date = $request->input('target_fixed_date');
        $incident->finish_fixed_date = $request->input('finish_fixed_date');
        $incident->closed_date = $request->input('closed_date');
        $incident->closed_by = $request->input('closed_by');
        $incident->pic_analyzing = $request->input('pic_analyzing');
        $incident->finish_analyzing = $request->input('finish_analyzing');
        $incident->pic_fixing = $request->input('pic_fixing');
        $incident->finish_fixing = $request->input('finish_fixing');
        $incident->pic_testing = $request->input('pic_testing');
        $incident->finish_testing = $request->input('finish_testing');
        $incident->deployment_code = $request->input('deployment_code');
        $incident->deployment_date = $request->input('deployment_date');
        $incident->save();

        return 'Incident record successfully created with id ' . $incident->id;
    }
    
    public function createNewIncidentMini(Request $request) {
        $incident = new ModelIncidentMini;
        $incident->raise_date = $request->input('raise_date');
        $incident->priority = $request->input('priority');
        $incident->issue_description = $request->input('issue_description');
        $incident->module = $request->input('module');
        $incident->sub_module = $request->input('sub_module');
        $incident->pic_analyzing = $request->input('pic_analyzing');
        $incident->pic_fixing = $request->input('pic_fixing');
        $incident->pic_testing = $request->input('pic_testing');
        $incident->save();

        return 'Incident record successfully created with id ' . $incident->id;
    }
    
    public function updateIncidentAnalyzing(Request $request, $id) {
        $incident = ModelIncidentAnalyzing::find($id);
        
        $incident->category_group = $request->input('category_group');
        $incident->category_root_cause = $request->input('category_root_cause');
        $incident->issue_description = $request->input('issue_description');
        $incident->suspected_reason = $request->input('suspected_reason');
        $incident->respon_taken = $request->input('respon_taken');
        $incident->decided_solution = $request->input('decided_solution');
        $incident->save();

        return "Sucess updating Incident #" . $incident->id;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        return ModelIncident::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function updateByCreator(Request $request, $id) {
        $incident = ModelIncidentMini::find($id);

        $incident->raise_date = $request->input('raise_date');
        $incident->priority = $request->input('priority');
        $incident->issue_description = $request->input('issue_description');
        $incident->module = $request->input('module');
        $incident->sub_module = $request->input('sub_module');
        $incident->pic_analyzing = $request->input('pic_analyzing');
        $incident->pic_fixing = $request->input('pic_fixing');
        $incident->pic_testing = $request->input('pic_testing');
        $incident->save();

        return "Sucess updating Incident #" . $incident->id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request) {
        $incident = ModelIncident::find($request->id);
        $incident->delete();

        return "Incident record successfully deleted #" . $request->id;
    }
}
