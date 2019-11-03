<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use DB;
use \GuzzleHttp\Client;

class pageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['post']=Post::get();
        // $data['post']=DB::table('posts')->get();
        // dd($data);
        return view('about',$data);
    }
    public function testPage(){
        // $data['post']=Post::get();
       
        return view('test');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
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
    public function postInsert(Request $request){
        $request->validate(['title'=>'required|max:80','details'=>'required'],['title.required'=>'Please Enter Title','details.required'=>'Please Enter Details']);
        $post_data= new Post;
        $post_data->title=$request->title;
        $post_data->description= $request->details;
        $post_data->save();
        return redirect()->route('about');
    }
    public function postUpdate($id){
        $data['post']=Post::where('id',$id)->first();
        return view('update',$data);
        // dd($data['post']);   
    }
    public function postFormUpdate(Request $request){
        // $data=Post::find($request->post_id);
        // $data->title=$request->title;
        // $data->description=$request->details;
        // $data->save(); 
        $request->validate(['title'=>'required|max:80','details'=>'required'],['title.required'=>'Please Enter Title','details.required'=>'Please Enter Details']);
        DB::table('posts')->where('id',$request->post_id)->update(['title'=>$request->title,'description'=>$request->details]);
        // dd($request)->all();
        return redirect()->route('about');
      }
      public function testPage1(){
          return view('reg');
      }
      public function removePost($id){
        $val= Post::where('id',$id)->delete();
        return redirect()->route('about');
    }
    public function getApiData()
    {
        $client= new client();
        $body['form_params']=array('userId'=>2323,'title'=>'test title','body'=>'test body');
        $request=$client->get('https://jsonplaceholder.typicode.com/posts');
        dd($request->getStatusCode());
    }
}
