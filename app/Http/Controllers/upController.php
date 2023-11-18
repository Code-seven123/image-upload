<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\upload;
use File;
use Response;

class upController extends Controller
{
    public function index()
    {
        $data = upload::get();
        return view('index', [ 'data' => $data ]);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|file|image|mimes:jpeg,png,jpg|'
        ]);

        $file = $request->file('file');
       
        $name = explode('.', $file->getClientOriginalName());
        $realSize = $file->getSize();
        $size = upController::convertUploadedFileToHumanReadable($realSize);
        $tujuan = storage_path("app/public/image");
        $fakeName = random_int(10000000, 999999999).".".$file->getClientOriginalExtension();
        $file->move($tujuan, $fakeName);
        $path = $fakeName;
        upload::create([
            'name' => $name[0],
            'size' => $size,
            'path' => $path
        ]);
        return redirect("/");
    }
    public function show($file)
    {
        $path = storage_path('app/public/image/' . $file);
    
        if (!File::exists($path)) {
            abort(404);
        }
    
        $file = File::get($path);
        $type = File::mimeType($path);
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
    
        return $response;
    }
    public function update(Request $request, string $id)
    {
        //
    }
    public function destroy($id)
    {
        $file = upload::where('id', $id)->value('path');
        File::delete(storage_path('app/public/image/'.$file));
        upload::where('id', $id)->delete();
        
        return redirect('/');
    }
    
    
    public function convertUploadedFileToHumanReadable($size, $precision = 2)
    {
        if ( $size > 0 ) {
            $size = (int) $size;
            $base = log($size) / log(1024);
            $suffixes = array(' bytes', ' KB', ' MB', ' GB', ' TB');
            return round(pow(1024, $base - floor($base)), $precision) . $suffixes[floor($base)];
        }
        return $size;
    }
}
