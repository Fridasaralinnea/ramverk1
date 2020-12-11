<?php

namespace Fla\Curl;

/**
 * A class for curl actions.
 *
 */
class Curl
{
    public function getWithCurl(string $url)
    {
        //  Initiate curl handler
        $cuh = curl_init();

        // Will return the response, if false it print the response
        curl_setopt($cuh, CURLOPT_RETURNTRANSFER, true);

        // Set the url
        curl_setopt($cuh, CURLOPT_URL, $url);

        // Execute
        $data = curl_exec($cuh);

        // Closing
        curl_close($cuh);

        $res = json_decode($data, true);
        return $res;
    }



    // public function getWithMultiCurl(array $userIds) : array
    // {
    //     $url = "https://rem.dbwebb.se/api/users";
    //
    //     $options = [
    //         CURLOPT_RETURNTRANSFER => true,
    //     ];
    //
    //     // Add all curl handlers and remember them
    //     // Initiate the multi curl handler
    //     $mh = curl_multi_init();
    //     $chAll = [];
    //     foreach ($userIds as $id) {
    //         $ch = curl_init("$url/$id");
    //         curl_setopt_array($ch, $options);
    //         curl_multi_add_handle($mh, $ch);
    //         $chAll[] = $ch;
    //     }
    //
    //     // Execute all queries simultaneously,
    //     // and continue when all are complete
    //     $running = null;
    //     do {
    //         curl_multi_exec($mh, $running);
    //     } while ($running);
    //
    //     // Close the handles
    //     foreach ($chAll as $ch) {
    //         curl_multi_remove_handle($mh, $ch);
    //     }
    //     curl_multi_close($mh);
    //
    //     // All of our requests are done, we can now access the results
    //     $response = [];
    //     foreach ($chAll as $ch) {
    //         $data = curl_multi_getcontent($ch);
    //         $response[] = json_decode($data, true);
    //     }
    //
    //     return $response;
    // }
}
