<?php

namespace App\Laurent;

class Laurent
{
    public static function allStatus(string $url): string
    {
        $result = self::allStatusObj($url);
        
        return json_encode($result);
    }

    /**
     * Меняет статус при каждам нажатии (триггер)
     * outToggle('http://192.168.0.101', 'out', 9)
     * outToggle('http://192.168.0.101', 'relle', 2)
     */
     public static function toggleOut(string $url, string $type = 'out', int $out): array
     {
        if ($type === 'out') {
            $resOut = file_get_contents($url . '/server.cgi?data=OUT,' . $out);

            if ($resOut === 'Success! DONE') {
                $outStat = self::getStatusOut($url, $out);

                return ['out' => $out, 'stat' => $outStat];
            } else {
                return ['error' => 'Oшибка ответа Laurent ' . $url];
            }
        }

        if ($type === 'relle') {
            $resOut = file_get_contents($url . '/server.cgi?data=REL,' . $out);

            if ($resOut === 'Success! DONE') {
                $outStat = self::getStatusRelle($url, $out);

                return ['out' => $out, 'stat' => $outStat];
            } else {
                return ['error' => 'Oшибка ответа Laurent ' . $url];
            }
        }
     }

    /**
    * Включает на время
    * outTimer('http://192.168.0.101', 'out, 5, 500);
    */
    public static function outTimer(string $url, string $type = 'out', int $out)
    {
        self::runOut($url, $type, $out, 'on');
        usleep(500000);
        return self::runOut($url, $type, $out, 'off');
    }

    public static function allStatusObj(string $url): object
    {
        $res = file_get_contents($url . '/status.xml');
        $xml = simplexml_load_string($res);
		   
        return $xml;
    }

    public static function getStatusOut(string $url, int $out): bool
    {
        $result = self::allStatusObj($url);
		   
        return (bool) mb_substr($result->out_table0, $out - 1, 1);
    }

    public static function getStatusRelle(string $url, int $out): bool
    {
        $result = self::allStatusObj($url);
		   
        return (bool) mb_substr($result->rele_table0, $out - 1, 1);
    }

    /**
     * Принудительно включает или отключает выход
     * runOut ('http://192.168.0.101', 'out', 9, 'on')
     */
    public static function runOut(string $url, string $type = 'out', int $out, string $param): array
    {
        if ($type === 'out') {
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

        if ($type === 'relle') {
            $resStat = self::getStatusRelle($url, $out);
            $resOut = '';

            if ($param === 'on') {
                if (!$resStat) {
                    $resOut = file_get_contents($url . '/server.cgi?data=REL,' . $out);
                }
            }

            if ($param === 'off') {
                if ($resStat) {
                    $resOut = file_get_contents($url . '/server.cgi?data=REL,' . $out);
                }
            }
        
            if ($resOut === 'Success! DONE') {
                return ['out' => $out, 'stat' => !$resStat];
            } else {
                return ['error' => 'Oшибка ответа Laurent ' . $url];
            }
        }
    }
}
