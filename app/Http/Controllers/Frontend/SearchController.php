<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Auth\User;
use App\Models\Blog;
use App\Models\Page;
use App\Models\Faq;


class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('search');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function autocomplete(Request $request)
    {
        $data = Blog::select("name","featured_image as image","slug")
                ->where("name","LIKE","%{$request->input('term')}%")
                ->get();

        $data2 = [];
        $photo_path = url('public/images');
        foreach($data as $d){
            $temp_array = array();

            $temp_array['value'] = $d->slug;
            //$temp_array['label'] = '<img src="'.$photo_path.'/'.$d->image.'" width="70" />&nbsp;&nbsp;&nbsp;'.$d->name.'';
            $temp_array['label'] = '<img src="'.$d->picture.'" width="70" />&nbsp;&nbsp;&nbsp;'.$d->name.'';
            $data2[] = $temp_array;

        }
        if(empty($data2)){
            $data2 = array('value'=>'','label'=>'no news found');
        }

        echo json_encode($data2);
        exit();



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function autocompleteUser(Request $request)
    {
        $chates = \DB::table('chats')->select('user1','user2')->where('user1',\Auth::user()->id)->orWhere('user2',\Auth::user()->id)->get();
        $relative_chat_users = [];
        foreach($chates as $ch){
            $relative_chat_users[]= $ch->user1;
            $relative_chat_users[]= $ch->user2;
        }
        $data = \DB::table('users')
            ->select('id',"username","first_name",'profile_photo')
            ->where("first_name","LIKE","%{$request->input('term')}%")
            ->whereIn('id',$relative_chat_users)
            ->get();
        $data2 = [];
        $photo_path = url('public/profile_photos');
        foreach($data as $d){
            $temp_array = array();
            $temp_array['id'] = $d->id;
            $user = User::find($d->id);
            $temp_array['value'] = $d->username;
            // $temp_array['label'] = '<img src="'.$photo_path.'/'.$d->profile_photo.'" width="70" />&nbsp;&nbsp;&nbsp;'.$d->first_name.'';
            $temp_array['label'] = '<img src="'.$user->picture.'" width="70" />&nbsp;&nbsp;&nbsp;'.$d->first_name.'';
            $data2[] = $temp_array;

        }
        if(empty($data2)){
            $data2 = array('value'=>'','label'=>'no record found');
        }

        echo json_encode($data2);
        exit();
    }

    public function page($slug){
        $page = Page::where('page_slug',$slug)->first();
        return view('frontend.page')->with('page',$page);
    }

    public function faqs(){
        $faqs = Faq::where('status',1)->get();
        return view('frontend.faqs')->with('faqs',$faqs);
    }
}
