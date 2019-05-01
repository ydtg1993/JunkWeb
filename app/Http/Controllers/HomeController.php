<?php
/**
 * Created by PhpStorm.
 * User: ydtg1
 * Date: 2019/5/1
 * Time: 12:44
 */

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Redirect;
use JunkMan\JunkMan;

class HomeController
{
    public function index()
    {
        echo "junkman";
    }

    public function stream()
    {
        JunkMan::stream()->start('stream watch');

        $info = new InfoController();
        $data = $info->getInfo();

        $random = mt_rand(10,30);
        $data['coin'] = $random;

        $data['message'] = "thank your bask";
        JunkMan::stream()->end();
        Redirect::action("index");
    }

    public function spot()
    {
        $message = "thank your bask";
        JunkMan::spot()->dot('dot watch',$message);
        Redirect::action("index");
    }

    public function flood()
    {
        JunkMan::flood()->start('flood watch');
        $random = mt_rand(10,30);
        $info = new InfoController();
        $data = $info->getInfo();
        for ($i=0;$i<=$random;$i++){
            $data['coin'] = $i;
            JunkMan::flood()->flush();
        }

        $data['message'] = "thank your bask";
        JunkMan::flood()->end();
        Redirect::action("index");
    }
}