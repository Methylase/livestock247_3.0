<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Validator;
use App\Models\Post;
use App\Models\Profile;
use App\Models\Contact_Us;

class Livestock247Controller extends Controller
{

      //home page
      public function index(){
        $date = Date('Y');
        return view('pages.livestock247.index', ['title'=>'Home','date'=>$date]);
        
      }

      //about page
      public function hoina(){
        $date = Date('Y');
        return view('pages.livestock247.hoina', ['title'=>'Hoina','date'=>$date]);
        
      }       

      //about page
      public function meat247(){
        $date = Date('Y');
        return view('pages.livestock247.meat247', ['title'=>'Meat247','date'=>$date]);
        
      }       

      //about page
      public function aims(){
        $date = Date('Y');
        return view('pages.livestock247.aims', ['title'=>'Aims','date'=>$date]);
        
      }    
      
      //about page
      public function livestalk(){
        $date = Date('Y');
        return view('pages.livestock247.livestalk', ['title'=>'Livestalk','date'=>$date]);
        
      }  
      

      //about page
      public function about_us(){
        $date = Date('Y');
        return view('pages.livestock247.about', ['title'=>'About Us','date'=>$date]);
        
      } 
      
      //blogs page
      public function blogs(){
        $date = Date('Y');
          $perPage = 6;
          $page = request()->query('page',1);
          $posts = Profile::JOIN('posts', 'profile.user_id','=', 'posts.user_id')->where("delete_post", NULL)
          ->orderBy('posts.id', 'desc')->select('profile.*','posts.*')->paginate($perPage);
          return view('pages.livestock247.blogs', ['title'=>'Blogs','posts' => $posts, 'date'=>$date]);
        
      } 

      //blog page
      public function faq(){
        $date = Date('Y');
        return view('pages.livestock247.faq', ['title'=>'Blog','date'=>$date]);
        
      }         
      
      //blog page
      public function blog(Request $request,$id){

        if($id == null || $id == '' || !is_numeric($id)){
          abort(404);                  
        }

        $date = Date('Y');
        $post = Profile::JOIN('posts', 'profile.user_id','=', 'posts.user_id')->where("delete_post", NULL)->where("posts.id",$id)
        ->select('profile.*','posts.*')->first();
        if(!$post){
          abort(404);
        }

        $related_article_posts = Profile::JOIN('posts', 'profile.user_id','=', 'posts.user_id')->where("delete_post", NULL)->where('posts.id', '!=',$post->id)
        ->orderBy('posts.id', 'desc')->select('profile.*','posts.*')->inRandomOrder()->limit(3)->get();
        $time_spent = Post::where('id',$post->id)->sum('last_read_time');
        return view('pages.livestock247.blog-post', ['title'=>$post->link_post_title, 'related_article_posts'=> $related_article_posts, 'post'=>$post, 'time_spent'=>$time_spent, 'date'=>$date]);
        
      }     

      public function get_in_touch(Request $request){
        if($_SERVER['REQUEST_METHOD'] =='POST'){
  
          $message_type= protectData($request->input('message_type'));
          $your_name= protectData($request->input('your_name'));
          $company_name= protectData($request->input('company_name'));
          $email= protectData($request->input('email'));
          $phone_number=protectData($request->input('phone_number'));
          $your_message= protectData($request->input('your_message'));

          $rules=array(
            'message_type'=>'required',
            'your_name'=>'required',
            'company_name'=>'required',
            'email'=>'required',
            'phone_number'=>'required',
            'your_message'=>'required'
          );
          $validator= Validator::make($request->all(),$rules);
          if($validator->fails()){
            return redirect()->route('get-in-touch')->withErrors($validator);
          }else{
            $get_in_touch= new Contact_Us();
            $get_in_touch->message_type = $message_type;
            $get_in_touch->your_name = $your_name;
            $get_in_touch->company_name = $company_name;
            $get_in_touch->email = $email;
            $get_in_touch->phone_number = $phone_number;
            $get_in_touch->your_message = $your_message;
            if($get_in_touch->save()){
              $request->session()->flash('successMessage', 'Thank you for contacting us, we will surely get back to you');
              return  redirect()->route('get-in-touch');
            }else{
              $request->session()->flash('failureMessage', 'Oop something went wrong');
              return  redirect()->route('get-in-touch');
            }
          }
        }else{

          $date = Date('Y');
          return view('pages.livestock247.get-in-touch', ['title'=>'Get In Touch','date'=>$date]);
        }
        
      }     


      public function time_spent(Request $request){
        $post_id = $request->input('post_id');
        $time_spent = $request->input('time_spent');

        if($post_id == null || $post_id == '' || !is_numeric($post_id)){
          abort(401);           
        }
    
        if(Post::where("id",protectData($post_id))->update(["last_read_time" => $time_spent])){
          $time_spent_result = Post::where("id",$post_id)->first();
          $time_spent = $time_spent_result->last_read_time;
         
          return $time_spent;
        }else{
          return response()->json(['success'=>'fail','message'=>'Oops something went wrong']);
        }  
    
      } 
    

}

