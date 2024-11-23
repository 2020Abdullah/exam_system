<?php

namespace App\Http\Traits;

trait UploadFiles
{
    public function attachmenfiles($request, $name, $type)
    {
        $filename = $request->file($name)->getClientOriginalName();

        $request->$name->storeAs('attachment/' . $type, $filename, 'upload_attachment');
    }
}
