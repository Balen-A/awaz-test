<?php

namespace App\Http\Controllers;

use App\Song;
use Aws\S3\S3Client;
use Illuminate\Http\Request;
use Aws\Exception\AwsException;
use Illuminate\Support\Facades\Config;

class APISongsController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getOne($songId)
    {

        $song = Song::where('id', $songId)->get();

        return $song;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function playOne($songId)
    {

        $songS3Key = Song::where('id', $songId)->get(['s3_key'])->first()['s3_key'];

        $s3Client = new S3Client([
            'credentials' => [
                'key'    => Config::get('aws.AccessKeyId'),
                'secret' => Config::get('aws.SecretKey'),
            ],
            'region' => Config::get('aws.region'),
            'version' => '2006-03-01',
        ]);

        $cmd = $s3Client->getCommand('GetObject', [
            'Bucket' => Config::get('aws.bucket'),
            'Key' => $songS3Key
        ]);

        $request = $s3Client->createPresignedRequest($cmd, '+20 minutes');

        // Get the actual presigned-url
        $presignedUrl = (string)$request->getUri();

        return [
            'url' => $presignedUrl
        ];

    }
}
