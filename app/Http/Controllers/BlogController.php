<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{
    public function __construct(){
        // 再度ログインすることを防ぐ処理
        $this->beforeFilter('guest', ['only' => ['getLogin']]);
        $this->beforeFilter('auth', ['only' => ['getLogout']]);
    }

    public function getIndex(){
        $posts = Post::orderBy('id', 'desc')->paginate(10);

        $posts->getFactory()->setViewName('pagination::simple');
        $this->layout->title = 'Laravelでブログ作成';
        $this->layout->main = View::make('home')->nest('content', 'index', compact('posts'));
    }

    public function getSearch(){
        $searchTerm = Input::get('s');
        $posts = Post::where('title', 'LIKE', '%'.$searchTerm.'%')->paginate(10);
        $posts->getFactory()->setViewName('pagination::slider');
        $posts->appends(['s'=>$searchTerm]);
        $this->layout->with('title', '検索：'.$searchTerm);
        $this->layout->main = View::make('home')->nest('content', 'index', ($posts->isEmpty()) ? ['notFound'=>true] : compact('posts'));
    }

    public function getLogin(){
        $this->layout->title = 'login';
        $this->layout->main = View::make('login');
    }

    public function postLogin(){
        $credentials = [
            'username'=>Input::get('username'),
            'password'=>Input::get('password')
        ];

        $rules = [
            'username'=>'required',
            'password'=>'required'
        ];

        $validator = Validator::make($credentials, $rules);
        if ($validator->passes()) {

            if (Auth::attempt($credentials)) {
                return Redirect::to('admin/dash-board');
            } else {
                return Redirect::back()->withInput()->with('failure', '正しいユーザー名／パスワードを入力してください。');
            }

        } else {
            return Redirect::back()->withErrors($validator)->withInput();
        }
    }

    public function getLogout(){
        Auth::logout();
        return Redirect::to('/');
    }
}
