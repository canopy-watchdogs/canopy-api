<?php

namespace App\Http\Controllers;

use App\Http\Resources\IncidentTypeResource;
use App\Models\IncidentType;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class IncidentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incidentTypes = IncidentType::paginate(20);

        return IncidentTypeResource::collection($incidentTypes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, IncidentType::RULES);

        $incidentType = IncidentType::create($request->all());

        return new IncidentTypeResource($incidentType);
    }

    /**
     * Display the specified resource.
     *
     * @param  id  $incidentTypeId
     * @return \Illuminate\Http\Response
     */
    public function show(int $incidentTypeId)
    {
        try {
            $incidentType = IncidentType::findOrFail($incidentTypeId);

            return new IncidentTypeResource($incidentType);
        } catch (ModelNotFoundException $e) {
            abort(404, "An incident type with id #$incidentTypeId could not be found.");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $incidentTypeId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $incidentTypeId)
    {
        $this->validate($request, IncidentType::RULES);

        try {
            $incidentType = IncidentType::findOrFail($incidentTypeId);

            $incidentType->fill($request->all());

            if ($incidentType->isClean())
                abort(422, "No changes made to incident type #$incidentTypeId");

            $incidentType->save();

            return new IncidentTypeResource($incidentType);
        } catch (ModelNotFoundException $e) {
            abort(404, "Incident type #$incidentTypeId was not found.");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $incidentTypeId
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $incidentTypeId)
    {
        try {
            $incidentType = IncidentType::findOrFail($incidentTypeId);

            $incidentType->delete();

            return new IncidentTypeResource($incidentType);
        } catch (ModelNotFoundException $e) {
            abort(404, "Location #$incidentTypeId was not found.");
        }
    }
}
