<?php

class HttpClient {
    private $curl_handle;

    public function get($url, $headers = []) {
        $curl_handle = $this->init($url, $headers);

        curl_setopt($curl_handle, CURLOPT_HTTPGET, 1);

        $response = curl_exec($curl_handle);        
        $info = curl_getinfo($curl_handle);
        curl_close($curl_handle);

        $data = json_decode($response);
        if ($info['http_code'] != 200) {
            var_dump($info);

            return null;
        }

        return $data;
    }

    public function post($url, $data = "", $headers = []) {
        $curl_handle = $this->init($url, $headers);

        $data = is_string($data) ? $data : json_encode($data);

        curl_setopt($curl_handle, CURLOPT_POST, 1);
        curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $data);

        $response = curl_exec($curl_handle);        
        $info = curl_getinfo($curl_handle);
        curl_close($curl_handle);

        $data = json_decode($response);
        if ($info['http_code'] != 200) {
            var_dump($info);

            return null;
        }

        return $data;
    }

    private function init($url, $headers = []) {
        $curl_handle = curl_init();
        
        curl_setopt($curl_handle, CURLOPT_TIMEOUT, 600);
        curl_setopt($curl_handle, CURLOPT_MAXREDIRS, 10);
        curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 300);
        //curl_setopt($curl_handle, CURLOPT_ENCODING, '');
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_handle, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl_handle, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl_handle, CURLOPT_URL, $url);

        // 设置头部信息
        if (!empty($headers)) {
            $head = [];
            foreach ($headers as $key => $value) {
                array_push($head, $key . ':' . $value );
            }
            curl_setopt($curl_handle, CURLOPT_HTTPHEADER, $head);
        }

        return $curl_handle;
    }

}
