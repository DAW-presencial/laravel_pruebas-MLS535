<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveProjectRequest;
use App\Models\Post;
//use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
//use Illuminate\Contracts\Auth\Access\Gate;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        //
//       if (Gate::allows('create-post')){
//           return view('posts.create');
//       } ;
//         abort(403);
        $this->authorize('create-post');
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SaveProjectRequest $request)
    {
//       -------> Raw <------
//        $name = $request->name;
//        $category = $request->date;
//        $number = $request->number;
//        $date = $request->email;
//        $size = $request->phone;
//        $gender = $request->country;
//        $description = $request->address;
//        $email = $request->job_contact;
        //image = $request->image;
//        $user_id = $request->user()->id;
//
//        DB::insert("insert into contacts (name, category, number,date, size,gender, description, email, image, user_id)
//values ($name, category,$number $date, $size, $gender, $description, $email, $image, $user_id)");
//        -----------------------

//        ----->QueryBuilder<-----
//
//        DB::table('posts')->insert([
//            'name' => $request->name,
//            'category' => $request->category,
//            'number' => $request->number,
//            'date' => $request->date,
//            'size' => $request->size,
//            'gender' => $request->gender,
//            'description' => $request->country,
//            'email' => $request->address,
//            'image' => $request->job_contact,
//            'user_id' => $request->user()->id
//        ]);
//        ------------------------
        $request->validated();
        //ELOQUENT FORM
        $post = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $post['image'] = "$profileImage";
        } else {
            unset($post['image']);
        }

        Post::create($post);


//        $input = $request->input('size');


        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //Prueba
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        return view('posts.edit', compact('post'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(SaveProjectRequest $request, Post $post)
    {
        $input = $request->validated(
//            [
//            'name'=>'required',
//            'category'=>'required|min:2',
//            'date'=>'required',
//            'number'=>'required',
//            'size'=>'required',
//            'gender'=>'required',
//            'description'=>'required',
//            'email'=>'required',
//        ]
        );

        $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        } else {
            unset($input['image']);
        }

        $post->update($input);
        //$post->update( $request->all());

        return redirect()->route('posts.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Post $post)
    {
        //
        $post->delete();

        return redirect()->route('posts.index');
    }

}
