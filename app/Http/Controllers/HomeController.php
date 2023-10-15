<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\WelcomeNotification;
use Illuminate\Support\Facades\Notification;
use App\Models\User;
use App\Models\pages;
use App\Models\posts;
use App\Models\comments;
use App\Events\UserLoggedIn;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

          // $page = pages::find(4);

          // dd($page->comments);

          // foreach($page->comments as $comment)
          {
            // working with comment here...
          }
    //     User::updateOrCreate([
    //     'id'   => 1,users
    // ],[
    //     'name'     => 'Komal',
    //     'address'  => 'Dhdggf\sdhgfh hj'
    // ]);
        // DB::table('users')->updateOrInsert(
        // ['email' => 'john@example.com', 'name' => 'John'],
        // ['id' => 1]
        // );
        // dd(User::distinct('name')->get());
// foreach (User::cursor() as $user) {
        // }
// $user = User::findMany([3,4]);
// dd($user);
        // User::orderBy('id')->chunk(2, function ($users) {
        //      foreach ($users as $user) {
        //         echo $user->id."=>".$user->name." ";
        //      }
        //   });

//        User::chunk(5,function($users) use(&$out){
//    foreach($users as $user){
//        //$out[] = $user;
//        $out[] = $user->id;
//    }
// });

        // dd($out);

      //    DB::table('users')->orderBy('id')->chunk(100, function ($users) {
      //    foreach ($users as $user) {
      //       echo $user->id."=>".$user->name." ";
      //       if ($user->id == 150) {
      //          return false;
      //       }
      //    }
      // });

      //     User::orderBy('id')->chunk(100, function ($users) {
      //    foreach ($users as $user) {
      //       echo $user->id."=>".$user->name." ";
      //    }
      // });

      //     $users = User::all();
      // $chunkedUsers = $users->chunk(10);
      // foreach ($chunkedUsers as $records) {
      //    foreach($records as $user) {
      //       echo $user->id."=>".$user->name."";
      //    }
      // }

         // dump(User::find(1));
         // dump(User::findOrFail(8901));
         // dump(User::first());
         // dump(User::firstOrFail());
         // dump(User::where('id',79879)->exists());
         // dump(User::get());
         // dump(User::list());
         // dump(User::pluck('name')->toArray());
         // dump(User::toArray());
         // dump(User::cursor());
         // dump(User::chunk());
        // User::create([
        //     'name' => 'HUUIHU',
        //     'email' => 'sdjfh@dfhk.ds',
        //     'password' => '899099'
        // ]);
        // dd($user['full_name']);
        // dd($user['name']);
        // // event(new UserLoggedIn($user->email));
        // $users = User::get();
        // $post = [
        //     'title' => 'Komal',
        //     'slug'  => 'komal',
        // ];
        // foreach($users as $user){
        //     Notification::send($user, new WelcomeNotification($post));
        // }
        return view('home');
    }
}
