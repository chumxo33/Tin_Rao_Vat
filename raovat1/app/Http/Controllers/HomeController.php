<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppConst;
use App\Http\Controllers\User\UserArticleController;
use App\Models\Article;
use App\Http\Controllers\LocationController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    //   App\Http\Controllers\HomeController.php
    public function index(Request $request)
    {
        // kiểm tra xem bài viết có hơn ngày hiện tại, nếu không thì bị ẩn
        $articlesQuery = Article::whereDate('valid_date', '>=', now())
        // Kiểm tra User có bị block
        ->whereHas('user', function($query){
            $query->where('blocked', false);
        });

        // filter Chuyên mục 
        if($request->category_ids){ 
            // whereHas: nó cho phép bạn chỉ định các bộ lọc bổ sung cho mối quan hệ article vs category
            $articlesQuery->whereHas('categories', function($query) use ($request){ // sử dụng từ khóa use lấy $request bên ngoài
                $query->whereIn('categories.id', $request->category_ids); // Kiểm tra cột categories_id có giá trị mà $request chưa 
            });
        }
        // Lọc Khu vực 
        if($request->province_id){ 
            $articlesQuery->where('province_id', $request->province_id); 
           if($request->district_id){
               $articlesQuery->where('district_id', $request->district_id);
               if($request->ward_id){
                $articlesQuery->where('ward_id', $request->ward_id);
            }
           }
        }
        // latest(): lấy bài đăng mới nhất
        $articles = $articlesQuery ->latest()
        ->paginate(AppConst::HOME_ARTICLE_PER_PAGE);
       
        return view('home.index')->with('articles', $articles);  
    }
    
    // App\Http\Controllers\HomeController.php
    public function getInfor(){
        $user = auth()->user();
        return response()->json($user); // Nó sẽ trả về json tất cả thông tin user
    }
    public function infor(Request $request){
        if($request->id){   // Kiểm tra $request đó có id đó chưa
            $user = User::whereId($request->id)->first();  // Nó sẽ kiểm tra giá trị của cột User có ID chưa 
            $user->name = $request->name;   
            $user->username = $request->username;
            $user->email = $request->email;
            if($request->password){ // Kiểm tra có password chưa
                $user->password = Hash::make($request->password) ;  //Thay đổi password
            }
            $user->save();
        }
        $user = auth()->user();
        return view('infor')->with('user', $user);
    }

}
