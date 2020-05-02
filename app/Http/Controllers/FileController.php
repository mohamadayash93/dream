<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function single(Request $request)
    {
        if ($request->ajax()) {
            if ($request->hasFile('file_data')) {
                try {

                    $path = $request->file('file_data')->store(
                        $request->model, 'public'
                    );

                    return response()->json(['path' => $path]);
                } catch (\Exception $e) {
                    return response()->json(['error' => trans('app.No file selected')]);
                }
            } else {
                return response()->json(['error' => trans('app.No file selected')]);
            }
        }

        return response();
    }
}
