<?php

namespace App\Http\Controllers;
require '..\vendor\autoload.php';
use Aws\S3\S3Client;
use App\Classes\HashControllClass;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $s3 = new S3Client([
            'credentials' => [
                'key'      => 'YCAJEtGL0_0UrZ8frQh43hmsw',
                'secret'   => 'YCNP8JbDpSpo-QzOLwB9wk6dyNH4FvamkBdgDRv1',
            ],
            'version' => 'latest',
            'endpoint' => 'https://storage.yandexcloud.net/',
            'region' => 'default-ru-central1-a',
        ]);
        
        $buckets = $s3->listBuckets();
        foreach ($buckets['Buckets'] as $bucket) {
            echo $bucket['Name'] . "\n";
        }

        $hashControllClass = new HashControllClass();

        $hash = $hashControllClass->Get3HashSum('https://storage.yandexcloud.net/storagecs1/asd.docx');

        $hashsss = $hashControllClass->Get3HashSum('C:\Users\cosmosanet\Desktop\Диплом\123.docx');

        dd($hash, $hashsss);
     
        
    }
}
