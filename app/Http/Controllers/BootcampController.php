<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bootcamp;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreBootcampRequest;
use App\Http\Resources\BootcampCollection;
use App\Http\Resources\BootcampResource;
use App\Http\Controllers\BaseController;

class BootcampController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            return $this->sendResponse(new BootcampCollection(Bootcamp::all()));
        }catch(\Exception $e){
        return $this->sendError('Server Error', 500);
        /*return response()->json([
            "success" => true,
            "data" => new BootcampCollection(Bootcamp::all())
        ] , 200 );*/
    }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBootcampRequest $request)
    {
        try{
            return $this->sendResponse(new BootcampResource (Bootcamp::create($request->all())));
        }catch(\Exception $e){
        return $this->sendError('Server Error', 500);
        /*return response()->json([
            "success" => true,
            "data" => new BootcampResource (Bootcamp::create($request->all()))
        ] , 201);*/
    }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $bootcamp = Bootcamp::find($id);
            return $this->sendResponse(new BootcampResource($bootcamp));
        } catch (\Exceptio $e) {
            return $this->sendError("bootcamp with id:'$id' not found", 400);
        }
        /*return response()->json([
            "success" => true,
            "data" => new BootcampResource(Bootcamp::find($id))
        ] , 200 );*/

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
        try {
            $b = Bootcamp::find($id);
            if (!$b) {
                return $this->sendError("bootcamp with id:'$id' not found", 400);
            }
        } catch (\Exceptio $e) {
            $b->update($request->all());
            return $this->sendResponse(new BootcampResource($b));
        }
        /*return response()->json([
            "success" => true,
            "data" => new BootcampResource($b)
        ] , 200);*/
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $b = Bootcamp::find($id);
            if(!$b){
                return $this->sendError("bootcamp with id:'$id' not found", 400);
            }
        } catch (\Exceptio $e) {
            $b->delete();
            return $this->sendResponse(new BootcampResource($b));
        /*return response()->json([
            "success" => true,
            "data" => new BootcampResource($b)
        ] , 200);*/
    }
    }
}