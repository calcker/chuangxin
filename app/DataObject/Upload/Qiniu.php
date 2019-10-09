<?php

namespace App\DataObject\Upload;

require_once '../vendor/autoload.php';

use Qiniu\Auth;
use Qiniu\Storage\UploadManager;
use Qiniu\Storage\BucketManager;
use Qiniu\Processing\PersistentFop;
use App\DataObject\DataObject;

class Qiniu extends DataObject
{
    private $auth;

    protected $data = array(
        'accessKey'   => null,
        'secretKey'   => null,
        'bucket'      => null,
        'uploadURL'   => null,
        'downloadURL' => null,
        'pipeline'    => null,
        'fileKey'     => null,
        'expries'     => null,
        'policy'      => null,
    );

    public function getUploadToken()
    {
        
        return $this->auth->uploadToken($this->bucket, $this->fileKey);
        //return $this->auth->uploadToken($this->bucket, $this->fileKey, $this->expries, $this->policy, true);
        //return $this->auth->uploadToken($this->bucket, null, $this->expries, $this->policy, true);
        
    }

    public function getUploadURL()
    {

        return $this->uploadURL;

    }

    public function getDownloadURL()
    {

        return $this->downloadURL;

    }

    public function __construct($data)
    {
        
        parent::__construct($data);
        
        $this->auth = new Auth($this->accessKey, $this->secretKey);
        
        
    }
}
