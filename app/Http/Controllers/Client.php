<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use Auth;
use UI;
use Util;
use PDF;
use Hash;
use File;

use App\User;

use App\Setting;

use App\Blog;
use App\BlogComment;

use App\ContactMessage;

class Client extends Controller
{

    public function __construct() {
      $this->middleware('maintenance');
    }

    //GENERAL
    public function index(){
        return view('client.home');
    }

    // AUTH
    public function logout(){
      Auth::logout();
      return redirect('/')->with('status', 'Logged out');
    }


    public function contact_us(Request $request){
      if($request->isMethod('post')){

        $validator = Validator::make($request->all(), [
          'name' => ['required', 'max:300'],
          'email' => ['required', 'max:300'],
          'subject' => ['required', 'max:300'],
          'message' => ['required'],
        ]);

        if ($validator->fails())
        {
          return redirect('/contact')->withErrors($validator->errors());
        }

        $name = strval($request->input('name'));
        $email = strval($request->input('email'));
        $subject = strval($request->input('subject'));
        $message = strval($request->input('message'));



        $contact_message = new ContactMessage;
        $contact_message->name = $name;
        $contact_message->email = $email;
        $contact_message->subject = $subject;
        $contact_message->message = $message;

        $contact_message->save();

        return redirect('/contact-us')->with('status', 'The message was sent.');

      }else if($request->isMethod('get')){

        return view('client.contact-us');
      }
    }

    public function about_us(Request $request){
      return view('client.about-us');
    }

    public function terms_and_conditions(Request $request){
      return view('client.terms-and-conditions');
    }

    public function privacy_policy(Request $request){
      return view('client.privacy-policy');
    }


    // BLOG
    public function blog(Request $request){
      $blogs_per_page = 6;
      $page=1;

      if($request->has('page')){
        $page=intval($request->input('page'));
      }

      $blogs = Blog::orderBy('created_at', 'DESC');

      $blog_count = count($blogs->get());

      $page_count = intval($blog_count/$blogs_per_page);
      if($blog_count%$blogs_per_page>0){
        $page_count++;
      }

      $blogs = $blogs->skip(($page-1)*$blogs_per_page)
                     ->take($blogs_per_page)
                     ->get();

      return view('client.blog.blog',[
        'blogs'=>$blogs,
        'page'=>$page,
        'page_count'=>$page_count,
      ]);

    }

    public function view_blog(Request $request, $permalink){

      $blog = Blog::where('permalink', $permalink)->first();

      $blog_comments = BlogComment::where('blog_id', $blog->id)->get();

      return view('client.blog.view-blog', [
        'title'=>'Blog: '.$blog->subject,
        'blog'=>$blog,
        'blog_comments'=>$blog_comments,
      ]);

    }

    public function add_comment_blog(Request $request, $permalink){

      $blog = Blog::where('permalink', $permalink)->first();

      $validator = Validator::make($request->all(), [
        'name' => ['required'],
        'email' => ['required'],
        'message' => ['required'],
      ]);

      if ($validator->fails())
      {
        return redirect('/blog/'.$blog->permalink)->withErrors($validator->errors());
      }

      $name = trim($request->input('name'));
      $email = trim($request->input('email'));
      $message = trim($request->input('message'));

      $blog_comment = new BlogComment;
      $blog_comment->name = $name;
      $blog_comment->email = $email;
      $blog_comment->text = $message;
      $blog_comment->blog_id = $blog->id;
      $blog_comment->save();

      return redirect('/blog/'.$blog->permalink)->with('status', 'Comment added');

    }

    public function delete_comment_blog(Request $request, $permalink, $comment_id){
      $blog = Blog::where('permalink', $permalink)->first();

      $comment = BlogComment::find($comment_id);
      if($comment)
        $comment->delete();

      return redirect('/blog/'.$blog->permalink)->with('status', 'Successfully deleted');

    }

    public function delete_blog(Request $request, $id){

      $blog = Blog::find($id);

      $img = public_path(UI::get_blog_image($blog->id));
      File::delete($img);

      $blog_comments = $blog->comments;

      foreach ($blog_comments as $comment) {
        $comment->delete();
      }

      $blog->delete();

      return redirect('/blog')->with('status', 'Deleted successfully');

    }

    // SITEMAP
    public function sitemap(Request $request){
      $domain = $request->root();

      $blogs = Blog::get();

      return response()->view('client.sitemap', [
        'domain'=>$domain,
        'blogs'=>$blogs,
      ])->header('Content-Type', 'text/xml');
    }

}
