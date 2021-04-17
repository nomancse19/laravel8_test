<?php

namespace App\Http\Controllers;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function qr_code(){
        return QrCode::size(100)->generate('Jahidul Islam Noman');


    }

    public function save_qr_code(){
      // return QrCode::size(300)

           // ->generate('Jahidul Islam Noman', public_path('images/qrcode.svg'));
          //return QrCode::generate('Make me into a QrCode!', public_path('images/qrcode.svg'));
        return  QrCode::format('png')->merge(public_path('images/Ifad.jpg'), .3, true)->generate('noman');
   
   
        }


}
