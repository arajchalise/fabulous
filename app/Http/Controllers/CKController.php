<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CKController extends Controller
{
    public function upload(Request $request)
    {
        $file = $request->file('upload');
        $name = $file->getClientOriginalName();
       if($file->move("images/CKUploads", $name)){
        $url = '/images/CKUploads/'.$name;
        $function_number = $_GET['CKEditorFuncNum'];
        $message = "";
             echo "<script>window.parent.CKEDITOR.tools.callFunction($function_number, '$url', '$message');</script>";
       }
    }
}
