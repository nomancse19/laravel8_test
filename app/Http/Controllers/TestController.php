<?php

namespace App\Http\Controllers;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Library\Services\TestService;
use App\Models\DocumentUploadModel;
use Image;
use DNS1D;
use Illuminate\Support\Facades\Storage;
use App\Mail\TestMail;
use Mail;
use App\Jobs\TestEmailJob;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;

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
          $document_data= DocumentUploadModel::all();
          $share_data = array_keys(get_defined_vars());
          return view("template.document",compact($share_data));
        }


        public function document_store(Request $request){
          $request->validate([
           // 'document_name' => 'required',
            'file_name' => 'required|max:30000kb|Mimes:jpeg,jpg,gif,png| dimensions:width=300,height=300',
            'document_name'=>'required'
        ]);

        $document_name= $request->document_name;

        if ($image = $request->file('file_name')) {
            $image= $request->file('file_name');
            $input['imagename'] = time().'.'.$image->extension();
    
            $destinationPath = public_path('/thumb');
    
            $img = Image::make($image->path());
    
           $thum_name= $img->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio();
            });
            $thumb=$thum_name->save($destinationPath.'/'.$input['imagename']);

            $destinationPath = public_path('/images');
    
          $main_image=  $image->move($destinationPath, $input['imagename']);



        }
       }





       public function send_mail1(){
        $email = 'noman.cse19@gmail.com';
   
        $mailInfo = [
            'title' => 'Welcome New User',
            'url' => 'https://www.remotestack.io'
        ];
  
        Mail::to($email)->send(new TestMail($mailInfo));
      
       }

       public function send_mail(){
        $email = 'noman.cse19@gmail.com';
        dispatch(new TestEmailJob($email));

        //Artisan::call('queue:work');
        dd('done');
       }








		
		
		public function test(){
			$obj= new TestService();
			return $obj->test_service();
        }



        public function user_data_show(){
          //$data= User::orderBy("id","asc")->limit(2000)->get();
         $data = DB::table('users')->paginate(50);
          $share=array_keys(get_defined_vars());
          //return $data;
          return view('template.normal_view',compact($share));
        }













}