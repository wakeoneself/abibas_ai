<?php
class Openai{
    private function secret_key(){
        return $secret_key = 'Bearer << api key here>>';
    }

    public function request($engine, $prompt, $max_tokens){ 

        $request_body = [
        "model" => $engine,
        "messages" => [["role" => "user", "content" => $prompt]],
        "max_tokens" => $max_tokens,
        "temperature" => 1.0,
        "frequency_penalty" => 0.0,
        "presence_penalty" => 0.0,
        "n"=> 1,
        "stream" => false,
        ];

        $postfields = json_encode($request_body);
        $curl = curl_init();
        curl_setopt_array($curl, [
        CURLOPT_URL => "https://api.openai.com/v1/chat/completions",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $postfields,
        CURLOPT_HTTPHEADER => [
            'Content-Type: application/json',
            'Authorization: ' . $this->secret_key()
        ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "Error #:" . $err;
        } else {
            echo $response;
        }

    }
    
}
