<?php

namespace App\Http\Controllers;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Library\Services\TestService;

class TestController extends Controller
{
    public function qr_code(){
        return QrCode::size(100)->generate('Jahidul Islam Noman');


    }

    public function save_qr_code(){
      // return QrCode::size(300)

           // ->generate('Jahidul Islam Noman', public_path('images/qrcode.svg'));
          //return QrCode::generate('Make me into a QrCode!', public_path('images/qrcode.svg'));
       $img= base64_encode( QrCode::format('png')->merge(public_path('images/Ifad.jpg'), .3, true)->generate('noman'));
       return  '<img src="data:image/png;base64,'.$img.'">';
   
        }



      /*  public function test(){
          $user=DB::table('users')->get();

          $user1=DB::table('users')->get();

          $user2=DB::table('users')->get();
          $share_data = array_keys(get_defined_vars());
          return view('template.input',compact($share_data));
        } */


        public function test_2(){
          $data=array();
          $data['user']=DB::table('users')->get();
          $data['user1']=DB::table('users')->get();
          $data['user2']=DB::table('users')->get();
        //  $share_data = array_keys(get_defined_vars());
          return view('template.input',['data'=>$data]);
        }        
		
		
		public function test(){
			$obj= new TestService();
			return $obj->test_service();
        }













}
