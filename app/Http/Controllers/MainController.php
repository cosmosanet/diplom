<?php

namespace App\Http\Controllers;
require '..\vendor\autoload.php';
use Aws\S3\S3Client;
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

    }
}
