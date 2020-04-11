<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TravelPackage;
use App\Gallery;
use App\Http\Requests\GalleryRequest;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Gallery::with(['travel_package'])->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryRequest $request)
    {
        $name = time().'.' . explode('/', explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];
        \Image::make($request->image)->save(public_path('images/galleries/'). $name);

        $request->merge(['image' => $name]);

        Gallery::create($request->all());

        return ['Message' => 'Successfully'];
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GalleryRequest $request, $id)
    {
        $this->removeImage($id);

        $name = time().'.' . explode('/', explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];
        \Image::make($request->image)->save(public_path('images/galleries/'). $name);
        
        $request->merge(['image' => $name]);

        $data = $request->all();

        $Gallery = Gallery::find($id);
        $Gallery->update($data);

        return response('Success', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->removeImage($id);
        Gallery::destroy($id);
        return response('Success', 200);
    }

    public function getTravel(){
        return TravelPackage::select('id','title')->get();
    }

    public function removeImage($id){
        $old_data = Gallery::findOrFail($id);
        $beforeImage = public_path('images/galleries/') . $old_data->image;
        
        if (file_exists($beforeImage)){
            @unlink($beforeImage);
        }
    }
}
