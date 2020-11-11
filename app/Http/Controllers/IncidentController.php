<?php

namespace App\Http\Controllers;

use App\Http\Resources\IncidentResource;
use App\Models\Incident;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class IncidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incidents = Incident::paginate(10);

        return IncidentResource::collection($incidents);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Incident::RULES);

        $incident = Incident::create($request->all()); 

        return new IncidentResource($incident);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $incidentId
     * @return \Illuminate\Http\Response
     */
    public function show(int $incidentId)
    {
        try {
            $incident = Incident::findOrFail($incidentId);
    
            return new IncidentResource($incident);
        } catch (ModelNotFoundException $e) {
            abort(404, "An incident with id #$incidentId could not be found.");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $incidentId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $incidentId)
    {
        $this->validate($request, Incident::RULES);

        try {
            $incident = Incident::findOrFail($incidentId);

            $incident->fill($request->all());

            if ($incident->isClean())
                abort(422, "No changes made to incident type #$incidentId");

            $incident->save();

            return new IncidentResource($incident);
        } catch (ModelNotFoundException $e) {
            abort(404, "Incident type #$incidentId was not found.");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Incident  $incident
     * @return \Illuminate\Http\Response
     */
    public function destroy(Incident $incident)
    {
        //
    }
}
