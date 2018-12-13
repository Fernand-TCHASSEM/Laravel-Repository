<?php

namespace App\Services;

use App\Http\Requests\UploadFileRequest;

class UploadFileService
{

    function __construct($mimeType)
    {
        $this->mimeType = $mimeType;
    }
   

    public function make(UploadFileRequest $request)
    {
        $request->validateByMime($this->mimeType);        

        $files = $request->file('files');

        $filePaths = [];

        for ($i=0, $nbrFiles = count($files); $i < $nbrFiles; $i++) { 
            $path = $files[$i]->store('images');

            $filePaths[] = asset('storage/'.$path);
        }

        return $filePaths;
    }
}