<?php

namespace App\Laurent;

class Laurent
{
    public function test()
    {
        return 'test laurent';
    }

    public static function allStatus(string $ip)
    {
        $res = file_get_contents($ip . '/status.xml');
        $xml = simplexml_load_string($res);
		    $json = json_encode($xml);

        return $json;
    }

    public function allStatusObj(string $ip)
    {
        $res = file_get_contents($ip . '/status.xml');
        $xml = simplexml_load_string($res);
		    //$json = json_encode($xml);
        //dd($xml->out_table0);
        return $xml;
    }

    public static function getStatusOut(string $url, int $out): bool
    {
        $res = file_get_contents($url . '/status.xml');
        $result = simplexml_load_string($res);
		    //$json = json_encode($xml);
        //dd($xml->out_table0);

        return (bool) mb_substr($result->out_table0, $out - 1, 1);
    }

    /**
     * 
     * runOut ('http://192.168.0.101', 'out', 9, 'on')
     */
    public static function runOut (string $url, string $type = 'out', int $out, string $param): array
    {
        $resStat = self::getStatusOut($url, $out);
        $resOut = '';

        if ($param === 'on') {
            if (!$resStat) {
                $resOut = file_get_contents($url . '/server.cgi?data=OUT,' . $out);
            }
        }

        if ($param === 'off') {
            if ($resStat) {
                $resOut = file_get_contents($url . '/server.cgi?data=OUT,' . $out);
            }
        }
    
        if ($resOut === 'Success! DONE') {
            return ['out' => $out, 'stat' => !$resStat];
        } else {
            return ['error' => 'Oшибка ответа Laurent ' . $url];
        }
    }
}
