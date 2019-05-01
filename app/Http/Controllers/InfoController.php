<?php
/**
 * Created by PhpStorm.
 * User: ydtg1
 * Date: 2019/5/1
 * Time: 12:47
 */

namespace App\Http\Controllers;


class InfoController
{
    private $name = "JunkMan";
    private $version = "1.0.0";
    private $secret;
    private $coin = 0;

    public function __construct()
    {
        $this->setSecret(mt_rand(10000,99999));
    }

    public function getInfo()
    {
        $data = [
            'name'=>$this->name,
            'version'=>$this->version,
            'secret'=>$this->secret,
            'coin'=>$this->coin,
        ];

        return $data;
    }

    private function setSecret($secret)
    {
        $this->secret = bin2hex($secret);
    }
}