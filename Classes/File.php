<?php

namespace nlib\Hubspot\Classes;

use nlib\Hubspot\Interfaces\FileEntityInterface;
use nlib\Hubspot\Interfaces\FileInterface;
use nlib\Hubspot\Interfaces\HubspotInterface;
use stdClass;

class File extends Hubspot implements HubspotInterface, FileInterface {

    public function __construct() { $this->_base .= '/files/v3/files'; parent::__construct(); }

    public function upload(FileEntityInterface $File) : ?stdClass {

        $upload = $this->cURL($this->_base . '/import-from-url/async?' . $this->getHapikey())
        ->setEncoding(self::JSON)
        ->setContentType(self::APPLICATION_JSON)
        ->setDebug(...$this->dd())
        ->post($File->jsonSerialize());

        $this->log([$this->l() => $upload]);
        
        return json_decode($upload);

        // $post_url = "/import-from-url/async?hapikey=$hapikey";

        // $upload_file = new \CURLFile(__DIR__ . $decryptedURL, 'application/octet-stream', $filename);
        // var_dump($upload_file);die;
        
        // $post_data = array(
        //     "folderPath" => "/docs",
        //     "access" => "PUBLIC_INDEXABLE",
        //     "ttl" => "P3M",
        //     "overwrite" => false,
        //     "duplicateValidationStrategy" => "NONE",
        //     "duplicateValidationScope" => "ENTIRE_PORTAL",
        //     'url' => $File->getUrl(),
        // );
    
        // $post_data = array(
        //     // "file" => $upload_file,
        //     "options" => json_encode($file_options),
        //     "folderPath" => "/docs",
        //     'url' => 'https://staging.centracar.be/wp-content/uploads/pdf/offres/2021-04-15_14h03_104_offre_skoda_Octavia-Combi_TMBJE7NE9J0222086_DE-LYONNESSE+Jeanne_salon-autoccasions.pdf',
        // );
    
        // $curl = curl_init(); 

        // $options = [
        //     CURLOPT_URL => $post_url,
        //     // CURLOPT_HEADER => true,
        //     CURLOPT_POST => true,
        //     CURLOPT_HTTPHEADER => [
        //         "accept: application/json",
        //         "content-type: application/json"
        //     ],
        //     CURLOPT_POSTFIELDS => json_encode($post_data),
        //     CURLOPT_RETURNTRANSFER => true,
        //     CURLOPT_ENCODING => "",
        //     CURLOPT_MAXREDIRS => 10,
        //     // CURLOPT_CONNECTTIMEOUT => 30,
        //     CURLOPT_TIMEOUT => 30,
        //     CURLOPT_SSL_VERIFYPEER => false,
        // ];

        // curl_setopt_array($curl, $options);        
    
        // $response    = curl_exec($curl); //Log the response from HubSpot as needed.
        // // $status_code = curl_getinfo($curl, CURLINFO_HTTP_CODE); //Log the response status code
        // $error = curl_error($curl);
        // curl_close($curl);

        // var_dump(json_decode($response), $error);
    }
    
}