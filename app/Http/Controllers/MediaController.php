<?php

namespace App\Http\Controllers;

use App\DataTables\CityDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateCityRequest;
use App\Http\Requests\UpdateCityRequest;
use App\Repositories\CityRepository;
use Flash;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\AppBaseController;
use Response;
use Illuminate\Http\Request;

class MediaController extends AppBaseController
{
    public function storeMedia(Request $request)
    {
        $collection = $request->get('collection');
        $filePath = '';

        if($request->hasFile('file')) {
            $file = $request->file('file');
            $name = time() . '_'. $file->getClientOriginalName();
            $filePath = $collection . '/' . $name;

            Storage::disk('s3')->put($filePath, file_get_contents($file), 'public');
        }

        return response()->json([
            'filePath' => $filePath,
        ]);
    }

    /*public function storeMedia(Request $request)
    {
        $path = storage_path('tmp/uploads');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $file = $request->file('file');

        $name = uniqid() . '_' . trim($file->getClientOriginalName());

        $file->move($path, $name);

        return response()->json([
            'name'          => $name,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }*/
}
