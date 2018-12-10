<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    function postUploadFile(){
        return 1;
    }
}
