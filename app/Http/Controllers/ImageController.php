<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImagesRequest;
use App\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
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
        //
        return  view('gallery', ['iamgeList' => Image::all()]);
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
    public function store(Request $request)
    {
        $path = 'uploads';
        $file = $request->file('file');

        if ($file) {
            // save file
            $fullPath = $file->store($path);

            // create image record
            $image = Image::create([
                'name' => $file->hashName(),
               'type' => $file->getMimeType(),
                'size' => $file->getSize(),
                'path' => 'storage/' . $fullPath,
            ]);
            return ['status' => 1, 'newImage' => $image];
        }
        return ['status' => 0, 'message' => 'file not found'];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        //
    }
}
