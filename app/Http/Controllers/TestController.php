<?php

namespace App\Http\Controllers;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Library\Services\TestService;

use DNS1D;
use Illuminate\Support\Facades\Storage;



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
        
        


        public function barcode(){
          //return  DNS1D::getBarcodeSVG('4445645656', 'QR');
          return Storage::disk('public')->put('test1.png',base64_decode(DNS1D::getBarcodePNG("1254545", "C128")));
        }



        public function document_upload(){
          return view("template.document");
        }


        public function document_store(Request $request){
          $request->validate([
           // 'document_name' => 'required',
            'file_name' => 'required|max:300kb|Mimes:jpeg,jpg,gif,png| dimensions:width=300,height=300'
        ]);

        if ($image = $request->file('file_name')) {
            $image= $request->file('file_name');
           $imageName= time().'.'.$image->getClientOriginalExtension();

           return $image->move(public_path('images'), $imageName);
        }
        }










		
		
		public function test(){
			$obj= new TestService();
			return $obj->test_service();
        }













}
