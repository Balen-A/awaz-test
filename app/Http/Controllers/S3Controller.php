<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use EddTurtle\DirectUpload\Signature;
use Illuminate\Support\Facades\Config;
use Aws\Exception\AwsException;

class S3Controller extends Controller
{
    //
    public function getS3Signer(): Signature
    {
        global $CONFIG;

        return new Signature(
            Config::get('aws.AccessKeyId'),
            Config::get('aws.SecretKey'),
            "awazz",
            "us-east-1"
        );
    }

    public function signFile(Request $req)
    {
        $req->validate([
            'file' => 'required',
        ]);

        $fileName = $req->get('file');

       
        $signer = $this->getS3Signer();

        
        $signer->setOptions([
            'max_file_size' => 10
        ]);

        $content = $signer->getFormInputs();

        $fileNameHyphenCase = join('-', explode(" ", $fileName));

        
        $content['key'] = md5(uniqid($fileNameHyphenCase)) . '-' . $fileNameHyphenCase;

        return response()->json($content);
    }
}
