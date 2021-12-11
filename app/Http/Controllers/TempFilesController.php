<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class TempFilesController extends Controller
{
    public function __invoke(Request $request, $path)
    {
        abort_if(
            ! Storage::disk('temp') ->exists($path),
            404,
            "The file doesn't exist. Check the path."
        );
       
        return Storage::disk('temp')->response($path);
    }
}
