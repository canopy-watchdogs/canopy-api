<?php

namespace App\Http\Controllers;

use App\Http\Resources\LocationResource;
use App\Models\Location;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Location::paginate(20);

        return LocationResource::collection($locations);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Location::RULES);

        $location = Location::create($request->all());

        return new LocationResource($location);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $locationId
     * @return \Illuminate\Http\Response
     */
    public function show(int $locationId)
    {
        try {
            $location = Location::findOrFail($locationId);
            return new LocationResource($location);
        } catch (ModelNotFoundException $e) {
            abort(404, "A location with id #$locationId could not be found.");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $locationId)
    {
        $this->validate($request, Location::RULES);

        try {
            $location = Location::findOrFail($locationId);
            $location->fill($request->all());
            if ($location->isClean())
                abort(422, "No changes made to location #$locationId");
            $location->save();
            return new LocationResource($location);
        } catch (ModelNotFoundException $e) {
            abort(404, "Location #$locationId was not found.");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $locationId
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $locationId)
    {
        try {
            $location = Location::findOrFail($locationId);
            $location->delete();
            return new LocationResource($location);
        } catch (ModelNotFoundException $e) {
            abort(404, "Location #$locationId was not found.");
        }
    }
}
