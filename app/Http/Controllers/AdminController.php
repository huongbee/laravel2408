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
}
