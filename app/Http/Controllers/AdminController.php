<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Cookie;
use Validator;
use DB;
use Hash;
use App\Bill;
use App\Products;
use App\Categories;


class AdminController extends Controller
{

    function modelExample(){

        $c = Categories::with('product','product.pageUrl','pageUrlCate')
            ->whereIn('id',[5,10])->get();
        // dd($c);
        foreach($c as $item){
            echo "<h3>".$item->name.'-----'.$item->pageUrlCate->url."</h3>";
            foreach($item->product as $p){
                echo '<li>'.$p->name.'----'.$p->pageUrl->url.'</li>';
            }
            
        }




        $p = Products::with('pageUrl')->where('id','<',10)->get();
        // foreach($p as $item){
        //     echo $item->name. '-----'.$item->pageUrl->url."\n";
        // }
        dd($p);

        // $data = Products::selectRaw('c.name as tenloai , count(products.id) as tongsp')
        //         ->join('categories as c','c.id','=','products.id_type')
        //         ->groupBy('c.name')
        //         ->having('tongsp','>',10)
        //         ->where('c.name','phụ kiện')
        //         ->orWhere('c.name','iMac')
        //         ->orderBy('tongsp','ASC')->get();
        // dd($data);
        //insert
        // $bill = new Bill;
        // $bill->id_customer = 31;
        // $bill->date_order = date('Y-m-d H:i:s',time());
        // $bill->total = 1000000;
        // $bill->save();

        // $bill = Bill::where('id',29)->first();
        // if($bill){
        //     //delete
        //     // $bill->delete();

        //     //update
        //     $bill->total = 2000000;
        //     $bill->save();
        // }
        // else{
        //     echo 'Bill not found!';
        // }
        


        // $bills = Bill::where('id','>','20')->orderBy('total','DESC')->get();
        // dd($bills);
        // foreach($bills as $b){
        //     echo $b->total."\n";
        // }
    }

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

    function getHome(){
        $name = 'Admin';
        
        return view('pages.home',compact('name'));
    }
    function getType(){
        return view('pages.type');
    }
    function getForm(){
        return view('pages.validate');
    }
    function postForm(Request $req){
        // $email = $req->email;
        // $email = $req->input('email','defaul');
        //https://developer.mozilla.org/vi/docs/Web/JavaScript/Guide/Regular_Expressions
        $rules = [
            'email'=>'required|email',
            'fullname'=>'required|string|min:2|not_regex:/\s/',  // ^\s ~ \S
            'age'=>'required|numeric',
            'password'=>'required|min:6|max:20|regex:/(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z])(?=.*[@#$%^&])/', // 11KKdd@@@
            'confirm_password'=>'same:password'
        ];
        $message = [
            'email.required'=>':attribute không được rỗng',
            'fullname.min' => 'Fullname ít nhất :min kí tự',
        ];
        $validator = \Illuminate\Support\Facades\Validator::make($req->all(),$rules,$message);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($req->all());
        }
        else dd($req->all());
    }

    function queryBuilder(){
        //select
        //C1
        // $data = DB::select('SELECT * FROM users');
        // foreach($data as $user){
        //     echo $user->name."\n";
        // }

        //C2
        // $data = DB::table('users')->get();
        // foreach($data as $user){
        //     echo $user->name."\n";
        // }

        //insert
        // $user = DB::table('users')->insert([
        //     'name'=>'Admin 5',
        //     'email'=>'admin5@gmail.com',
        //     'password'=>Hash::make('123456')
        // ]);
        // dd($user);
        // $user = DB::table('users')->where([
        //     'email'=>'admin5@gmail.com'
        // ])->first();
        // if($user){
        //     $checkPassword = Hash::check('123456',$user->password);
        //     if($checkPassword){

        //         echo 'login success';
        //     }
        //     else{
        //         echo 'Password invalid!';
        //     }
        // }   
        // else{
        //     echo 'Can not find user';
        // }


        // $user = DB::table('users')->where([
        //     ['id','=',5],
        //     ['email','=','....']
        // ])->first();

        // $user = DB::table('users')->where([
        //     ['id','=',5]
        // ])->where('email','=','...')
        // ->offset(2)->take(5)->get(); //limit 2,5


        // $user = DB::table('users')->where([
        //     ['id','=',5]
        // ])->orWhere('email','=','...')->orderBy('id','DESC')->limit(10)->get();

        // $user = DB::table('users')->where('id','=',5)->first();
        // if($user){
        //     //
        //     DB::table('users')->where('email','LIKE','%gmail.com')->update([
        //         'email'=>'...'
        //     ]);
        //     $user = DB::update('UPDATE users SET email="admin13@gmail.com" WHERE id = 5');
        // }   

        // else{
        //     echo 'Can not find user';
        // }

        // $email = DB::table('users')->where('id',1)->value('email');
        // echo $email;    

        // $users = DB::table('users')
        //         ->where('name','LIKE','%admin%')
        //         ->where(function($q){
        //             $q->where('email','admin3@gmail.com');
        //             $q->orWhere('email','admin4@gmail.com');
        //         })->select('email','name')->get();
        // dd($users);

        // $users = DB::table('users')
        //         ->join('password_resets','password_resets.email','=','users.email')
        //         ->leftJoin('password_resets','password_resets.email','=','users.email')
        //         ->select('name','users.email')->get();
        // $users = DB::table('users as u')
        //         ->join('password_resets as p',function($q){
        //             $q->on('p.email','=','u.email');
        //             // $q->where('id',1);
        //         })->where('id',1)->get();
        // dd($users);

        //->groupBy('','')


        // Cho biết đơn giá trung bình của các sp hiện có trong cửa hàng
        // echo DB::table('products')->avg('price');
        // $data = DB::table('products as p')
        //         ->select('c.name as tenloai','p.name as tensp')
        //         ->join('categories as c','c.id','=','p.id_type')
        //         ->orderBy('c.name','ASC')->get();
        // foreach($data as $p){
        //     echo "<li>".$p->tenloai.' - '.$p->tensp."</li>";
        // }


        // $data = DB::table('products as p')
        //         ->selectRaw('c.name as tenloai , count(p.id) as tongsp')
        //         ->join('categories as c','c.id','=','p.id_type')
        //         ->groupBy('c.name')
        //         ->having('tongsp','>',10)
        //         ->where('c.name','phụ kiện')
        //         ->orWhere('c.name','iMac')
        //         ->orderBy('tongsp','ASC')->get();
        // dd($data);

        //Cho biết tổng giá tiền và tổng số sản phẩm của sản phẩm có đơn giá trong khoảng 50.000.000đ đến 100.000.000đ theo từng loại sản phẩm.
        $data = DB::table('products as p')
            ->selectRaw('c.name as tenloai , count(p.id) as tongsp, sum(p.price) as tongtien')
            ->join('categories as c','c.id','=','p.id_type')
            ->groupBy('c.name')
            ->whereBetween('price',[50000000,100000000])
            ->get();
            dd($data);

    }
}
