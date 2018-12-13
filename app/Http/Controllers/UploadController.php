<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UploadFileService;
use App\Http\Requests\UploadFileRequest;
use App\Extensions\Controllers\Controller;

class UploadController extends Controller
{
    protected $service;

    function __construct()
    {
        $this->service = new UploadFileService('image');
    }

    public function store(UploadFileRequest $request)
    {
        $filePaths = $this->service->make($request);

        return response()->json([
            'code' => self::HTTP_SUCCESS,
            'paths' => $filePaths
        ]);
    }
}
