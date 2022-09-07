<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Resources\CourseCollection;
use App\Http\Resources\CourseResource;
use App\Http\Controllers\BaseController;

class CourseController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            return $this->sendResponse(new CourseCollection(Course::all()));
        }catch(\Exception $e){
        return $this->sendError('Server Error', 500);
        /*return response()->json([
            "success" => true,
            "data" => new CourseCollection(Course::all())
        ] , 200 );*/
    }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCourseRequest $request)
    {
        try{
            return $this->sendResponse(new CourseResource (Course::create($request->all())));
        }catch(\Exception $e){
        return $this->sendError('Server Error', 500);
        /*return response()->json([
            "success" => true,
            "data" => new CourseResource (Course::create($request->all()))
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
            $course = Course::find($id);
            return $this->sendResponse(new CourseResource($course));
        } catch (\Exceptio $e) {
            return $this->sendError("course with id:'$id' not found", 400);
        }
        /*return response()->json([
            "success" => true,
            "data" => new CourseResource(Course::find($id))
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
        $c = Course::find($id);
        $c->update($request->all());
        return response()->json([
            "success" => true,
            "data" => new CourseResource($c)
        ] , 200);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $c = Course::find($id);
        $c->delete($id);
        return $this->sendResponse(new CourseResource($c));
        /*return response()->json([
            "success" => true,
            "data" => new CourseResource($c)
        ] , 200);*/
    }
}