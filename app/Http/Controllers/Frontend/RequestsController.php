<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Offer;

class RequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id','desc')->get();

        if(isset($_GET['type']) && $_GET['type'] == 'myoffers'){
            $posts = Post::where('created_by',\Auth::user()->id)->where('type','travel')->orderBy('id','desc')->get();
            return view('frontend.requests.myoffers',compact('posts'));
        }
        if(isset($_GET['type']) && $_GET['type'] == 'myrequests'){
            $posts = Post::where('created_by',\Auth::user()->id)->where('type','request')->orderBy('id','desc')->get();
            return view('frontend.requests.myrequests',compact('posts'));
        }
        return view('frontend.requests.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.requests.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->slug = \Str::slug($request->title).'-'.time();
        $post->source = $request->source;
        $post->destination = $request->destination;
        $post->product_link = $request->product_link;
        $post->type = $request->type;
        $post->details = $request->description;
        $post->created_by = \Auth::user()->id;
        $post->save();
        return back()->withFlashSuccess('Request Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug',$slug)->first();
        return view('frontend.requests.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('frontend.requests.edit')->with('post',$post);
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
        $post = Post::find($id);
        $post->title = $request->title;
        $post->source = $request->source;
        $post->destination = $request->destination;
        $post->product_link = $request->product_link;
        $post->type = $request->type;
        $post->details = $request->details;
        $post->update();
        return back()->withFlashSuccess('Request updated successfully.');
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


    public function orders(){
        $user = \Auth::user();
        $orders = offer::where('request_to',$user->id)->orWhere('offer_by',$user->id)->get();
        return view('frontend.requests.myorders',compact('orders'));
        
    }
}
