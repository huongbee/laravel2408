<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Cookie;

class AdminController extends Controller
{
    // function index($idAdmin,$username){
    //     echo $idAdmin."\n";
    //     echo $username."\n";
    //     return 'index page';
    // }
    function index(Request $req){
        echo $req->id."\n";
        echo $req->username."\n";
        return 'index page';
    }

    function getHomePage(){
        // return view('pages.detail');
        $idUser = 12;
        $username = 'admin';
        $fullname = '<b>Admin A</b>';
        return view('trangchu',compact('idUser','username','fullname'));

        // $data = [
        //     'idUser'=>$idUser,
        //     'username'=>$username,
        //     'fullname'=>$fullname
        // ];
        // return view('trangchu',$data);
    }

    function getLogin(){
        return view('pages.form');
    }
    function postLogin(Request $req){
        echo $req->username;
        dd($req);
        
    }

    function getUploadFile(){
        return view('pages.upload');
    }

    function postUploadFile(Request $req){
        if($req->hasFile('images')){
            $file = $req->file('images');
            foreach($file as $img){
                $name = $img->getClientOriginalName();
                $img->move("avatar",$name);
            }
            return redirect()->route('getuploadfile')->with('success','Upload successfuly');
            
        }
        else{
            return redirect()->route('getuploadfile')->with('error','Please choose file');
        }


        /*
        if($req->hasFile('images')){
            $file = $req->file('images');

            $name = $file->getClientOriginalName();
            $size = $file->getClientSize(); //$file->getSize();
            $ext = $file->getClientOriginalExtension(); //$file->extension();
            $mimeType = $file->getClientMimeType();
            
                //C1:
                // $tmpName = $file->path();
                // move_uploaded_file($tmpName,"avatar/$name");
                
        
            //C2
            $file->move("avatar",$name);
            echo 'thanhcong';
            // if($size<2*1024*1024){
                
            // }
        }
        else{
            return redirect()->route('getuploadfile')->with('error','Please choose file');
            // return redirect()->route('getuploadfile')->with([
            //     'error'=>'Please choose file',
            //     'error_2'=>'...'
            // ]);
        }
        */
    }
    function testSession(Request $req){
        if(!session()->has('username')){
            $req->session()->put('username','admin');
        }
        dd(session()->all());

        // session()->forget('username');
        return view('pages.get-session');
        
    }
    function setCookie(){
        setcookie('password','12345678',time()+160);
        //create cookie
        // $res = new Response;
        // $res->withCookie('password','12345678',2); // 2minutes
        // return $res;
    }
    function getCookie(Request $request){
        echo Cookie::get('password');
        echo  $request->cookie('password');
        // $this->setCookie();
        // return view('pages.get-cookie');
    }
}
