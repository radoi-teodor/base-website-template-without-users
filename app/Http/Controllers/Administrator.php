<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use Auth;
use Hash;
use UI;
use Util;
use File;
use PDF;

use Session;
use Carbon\Carbon;

use App\User;
use App\Setting;
use App\Blog;
use App\ContactMessage;


class Administrator extends Controller
{
  // GENERAL
  public function login(Request $request){
    if($request->isMethod('post')){

      $validator = Validator::make([
        'email'=>['required'],
        'password'=>['required'],
      ],
      [
        '*.required'=>'Fields marked with * are mandatory.',
      ]);

      if($validator->fails()){
        return redirect('/login')->withErrors($validator->errors());
      }

      $email = strval($request->input('email'));
      $password = strval($request->input('password'));

      if(Auth::attempt(['email'=>$email, 'password'=>$password, 'administrator'=>true])){
        return redirect('/administrator/statistics')->with('status', 'Logged in!');
      }

      return redirect('/administrator')->with('message', 'Incorrect data');

    }else if($request->isMethod('get')){
      return view('administrator.login');
    }
  }

  public function statistics(){

    return view('administrator.statistics');
  }

  public function settings(Request $request){
    if($request->isMethod('post')){
      $validator = Validator::make([
        'input'=>['required'],
      ],[
        '*.required'=>'Fields marked with * are mandatory.',
      ]);

      if($validator->fails()){
        return redirect('/administrator/settings')
             ->withErrors($validator->errors());
      }

      $set_settings = $request->all();
      unset($set_settings['_token']);

      foreach ($set_settings as $key => $value) {
        $loc_setting = Setting::where('name', $key)->first();
        $loc_setting->value = $value;
        $loc_setting->save();
      }

      return redirect('/administrator/settings')->with('status', 'Settings updated');

    }else if($request->isMethod('get')){
      $settings = Setting::get();

      return view('administrator.settings',[
        'settings'=>$settings,
      ]);
    }
  }

  // BLOGS
  public function add_blog(Request $request){
    if($request->isMethod('post')){

      $validator = Validator::make($request->all(), [
        'subject' => ['required', 'max:300'],
        'text' => ['required'],
        'image' => ['required', 'mimes:jpg,jpeg,png'],
      ]);

      if ($validator->fails())
      {
        return redirect('/administrator/add-blog')->withErrors($validator->errors());
      }

      $subject=strval($request->input('subject'));
      $text=strval($request->input('text'));

      $blog = new Blog;
      $blog->subject = $subject;
      $blog->text = $text;
      $blog->save();

      $permalink = Util::to_permalink($subject);
      $permalink.='-'.$blog->id;
      $blog->permalink = $permalink;
      $blog->save();

      $file = $request->file('image');
      $ext = $file->getClientOriginalExtension();

      $file_name = $blog->id.'.'.$ext;

      $file->move(public_path().'/assets/blog-imgs',$file_name);

      return redirect('/administrator/add-blog')->with('status', 'Blog created');
    }else{
      return view('administrator.blog.add-blog');
    }
  }

  public function edit_blog(Request $request){
    if($request->isMethod('post')){

      $validator = Validator::make([
        'input'=>['required'],
      ],[
        '*.required'=>'Fields marked with * are mandatory.',
      ]);

      if($validator->fails()){
        return redirect('/administrator/edit-product')
             ->withErrors($validator->errors());
      }

      $input = strval($request->input('input'));

      $is_sku = is_numeric($input);

      $blog = null;

      if($is_sku){
        $blog = Blog::where('id', intval($input))->first();
      }else{
        $blog = Blog::where('name', 'LIKE', '%'.strval($input).'%')->first();
      }

      if(!$blog){
        return redirect('/administrator/edit-blog')
             ->with('status', 'The blog you are trying to search
                     does not seem to exist.');
      }

      return redirect('/administrator/edit-blog/'.$blog->permalink);

    }else if($request->isMethod('get')){
      return view('administrator.blog.edit-blog');
    }
  }

  public function edit_blog_permalink(Request $request, $permalink){

    $blog = Blog::where('permalink', $permalink)->first();

    if($request->isMethod('post')){
      $validator = Validator::make($request->all(), [
        'subject' => ['required', 'max:300'],
        'text' => ['required'],
      ]);

      if ($validator->fails())
      {
        return back()->withErrors($validator->errors());
      }

      $subject=strval($request->input('subject'));
      $text=strval($request->input('text'));


      $blog->subject = $subject;
      $blog->text = $text;

      $permalink = Util::to_permalink($subject);
      $permalink.='-'.$blog->id;
      $blog->permalink = $permalink;
      $blog->save();

      if($request->has('image')){
        $img = public_path(UI::get_blog_image($blog->id));
        File::delete($img);

        $file = $request->file('image');
        $ext = $file->getClientOriginalExtension();

        $file_name = $blog->id.'.'.$ext;

        $file->move(public_path().'/assets/blog-imgs',$file_name);
      }

      return redirect('/administrator/edit-blog/'.$blog->permalink)->with('status', 'Blog editted');

    }else{
      return view('administrator.blog.edit-blog-permalink', [
        'blog'=>$blog,
        'title'=>'Edit blog: '.$blog->subject.' #'.$blog->id,
      ]);
    }

  }

  public function find_blog(Request $request){
    if($request->isMethod('post')){

      $validator = Validator::make([
        'input'=>['required'],
      ],[
        '*.required'=>'Fields marked with * are mandatory.',
      ]);

      if($validator->fails()){
        return redirect('/administrator/find-product')
             ->withErrors($validator->errors());
      }

      $input = strval($request->input('input'));

      $is_sku = is_numeric($input);

      $blog = null;

      if($is_sku){
        $blog = Blog::where('id', intval($input))->first();
      }else{
        $blog = Blog::where('name', 'LIKE', '%'.strval($input).'%')->first();
      }

      if(!$blog){
        return redirect('/administrator/find-blog')
             ->with('status', 'The blog you are trying to search
                     does not seem to exist.');
      }

      return redirect('/blog/'.$blog->permalink);

    }else if($request->isMethod('get')){
      return view('administrator.blog.find-blog');
    }
  }

  // MESSAGES
  public function messages(Request $request){

    $page = 1;
    $messages_per_page = 4;

    if($request->has('page')){
      $page = intval($request->input('page'));
    }

    $messages = ContactMessage::orderBy('created_at', 'DESC');

    $messages_count = count($messages->get());

    $page_count = intval($messages_count/$messages_per_page);
    if($messages_count%$messages_per_page>0){
      $page_count++;
    }

    $messages = $messages->get();

    return view('administrator.messages',[
      'messages'=>$messages,
      'page'=>$page,
      'page_count'=>$page_count,
    ]);


  }

  // ADMINISTRATOR MANAGER
  public function administrators_manager(Request $request){

    $user = Auth::user();

    if($request->isMethod('post') && $request->has('action')){

      $action = strval($request->input('action'));
      switch ($action) {
        case 'register':
          $validator = Validator::make($request->all(), [
            'email' => ['required', 'max:300'],
            'password' => ['required', 'max:300'],
          ]);

          if ($validator->fails())
          {
            return redirect('/administrator/administrators-manager')->withErrors($validator->errors());
          }

          $email = strval($request->input('email'));
          $password = Hash::make(strval($request->input('password')));

          $pos_user = User::where('email', $email)->get();

          if(count($pos_user)!=0){
            return redirect('/administrator/administrators-manager')->with('status', 'Email already in use. Make administrator in make administrator section.');
          }

          $user = new User;
          $user->email = $email;
          $user->password = $password;
          $user->administrator = true;
          $user->save();

          break;

        case 'make-administrator':
          $validator = Validator::make($request->all(), [
            'email' => ['required', 'max:300'],
          ]);

          if ($validator->fails())
          {
            return redirect('/administrator/administrators-manager')->withErrors($validator->errors());
          }

          $email = strval($request->input('email'));
          $user = User::where('email', $email)->first();

          if($user==null){
            return redirect('/administrator/administrators-manager')->with('status', 'This email does not exist. Register the user in register section.');
          }

          $user->administrator = true;
          $user->save();


          break;

        case 'revoke-administrator':
          $validator = Validator::make($request->all(), [
            'email' => ['required', 'max:300'],
          ]);

          if ($validator->fails())
          {
            return redirect('/administrator/administrators-manager')->withErrors($validator->errors());
          }

          $email = strval($request->input('email'));
          $user = User::where('email', $email)->first();

          if($user==null){
            return redirect('/administrator/administrators-manager')->with('status', 'This email does not exist. Register the user in register section.');
          }

          if($user->id==Auth::user()->id){
            return redirect('/administrator/administrators-manager')->with('status', 'Cannot revoke logged account.');
          }

          $user->administrator = false;
          $user->save();


          break;

        case 'change-password':
          $validator = Validator::make($request->all(), [
            'password' => ['required', 'max:300'],
            'repeat-password' => ['required', 'max:300'],
          ]);

          if ($validator->fails())
          {
            return redirect('/administrator/administrators-manager')->withErrors($validator->errors());
          }

          $password = strval($request->input('password'));
          $repeat_password = strval($request->input('repeat-password'));


          if($password!=$repeat_password){
            return redirect('/administrator/administrators-manager')->with('status', 'Passwords does not match.');
          }

          $user = Auth::user();
          $user->password = Hash::make($password);
          $user->save();

          break;

      }

      return redirect('/administrator/administrators-manager')->with('status', 'Succes');

    }else if($request->isMethod('get')){

      $users = User::where('id', '!=', $user->id)->where('administrator', true)->get();

      return view('administrator.administrators-manager', [
        'users'=>$users,
      ]);

    }
  }

  // UTILS
  public function mark_read(Request $request, $id){
    $message = ContactMessage::find($id);
    $message->read=true;
    $message->save();

    return back()->with('status', 'Modified successfully');
  }

  public function mark_unread(Request $request, $id){
    $message = ContactMessage::find($id);
    $message->read=false;
    $message->save();

    return back()->with('status', 'Modified successfully');
  }

  public function save_message(Request $request, $id){
    $message = ContactMessage::find($id);

    $product = null;
    if($message->product_id){
      $product = Product::find($message->product_id);
    }

    $pdf = PDF::loadView('pdf.message', [
      'message'=>$message,
      'product'=>$product,
    ]);

    return $pdf->download('messsage-#'.$message->id.'.pdf');

  }

  public function delete_message(Request $request, $id){
    $message = ContactMessage::find($id);
    $message->delete();

    return redirect('/administrator/messages')->with('status', 'Deleted successfully');
  }

  public function delete_user(Request $request, $id){
    $user = Auth::user();

    if($user->id == $id){
      return redirect('/administrator/administrators-manager')->with('status', 'Cannot delete logged account.');
    }

    $found_user = User::find($id);
    $found_user->delete();

    return redirect('/administrator/administrators-manager')->with('status', 'Deleted successfully.');

  }



  // OTHER
  public function setup(Request $request){

    $settings = $this->settings;
    $website_settings = Setting::pluck('name')->toArray();

    foreach ($settings as $setting) {
      if(!in_array($setting[0], $website_settings)){
        $new_setting = new Setting;
        $new_setting->name = $setting[0];
        $new_setting->value = $setting[1];
        $new_setting->type = $setting[2];
        $new_setting->save();
      }
    }

    return back()->with('status', 'Success');

  }


}
