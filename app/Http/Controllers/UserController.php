<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        $user->name = "Aliyan";
        $user->email = "aliyan@gmail.com";
        $user->password = "admin0101";
        $user->save();

        $post1 = new Post();
        $post1->title = "Post Three";
        $post1->slug = Str::slug($post1->title, "-");
        $post1->status = "active";
        $post1->user_id = $user->id;
        $post1->save();

        $post2 = new Post();
        $post2->title = "Post Four";
        $post2->slug = Str::slug($post2->title, "-");
        $post2->status = "active";
        $post2->user_id = $user->id;
        $post2->save();

        $post3 = new Post();
        $post3->title = "Post Five";
        $post3->slug = Str::slug($post3->title, "-");
        $post3->status = "active";
        $post3->user_id = $user->id;
        $post3->save();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /**  $user = User::where("id", $id)->with("post")->get();
         $user = User::where("id", $id)->get();
         $user = User::find($id); **/

        $user = User::where("id", $id)->with("post")->get();
        foreach ($user as $user) {
            foreach($user->post as $post) {
                dd($post);
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
