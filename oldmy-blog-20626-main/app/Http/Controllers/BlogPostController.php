<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\User;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use PDF;
//use Barryvdh\DomPDF\Facade as PDF;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = BlogPost::all();
        return view('blog.index', ['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categorie::selectCategorie();

        return view('blog.create', ['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $newPost = BlogPost::create([
        //     'title' => $request->title,
        //     'body' => $request->body,
        //     'user_id' => 1
        // ]);

        $newPost = new BlogPost;
        $newPost->fill($request->all());
        $newPost->user_id = Auth::user()->id;
        $newPost->save();


        return redirect('blog/'.$newPost->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */

    //public function show(BlogPost $blogPost) -- Origional Laravel Show (Seelct * FROM MODEL WHERE PK =  GETmethod)
    public function show($blogPost)
    {
        $blog = BlogPost::selectBlogPost($blogPost);
        return  view ('blog.show', ['post'=>$blog]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogPost $blogPost)
    {
        return view('blog.edit', ['post' => $blogPost]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogPost $blogPost)
    {
        $blogPost->update([
            'title_en' => $request->title_en,
            'title_fr' => $request->title_fr,
            'body_en' => $request->body_en,
            'body_fr' => $request->body_fr


        ]);
        return redirect(route('blog.show', $blogPost->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogPost $blogPost)
    {
        $blogPost->delete();
        return redirect(route('blog'));
    }

    public function showPdf(BlogPost $blogPost){

        $pdf = PDF::loadView('blog.pdf-file', ['post' => $blogPost]);
        return $pdf->download('blog-post.pdf');
        //return $pdf->stream('blog-post.pdf');
    }

    public function queries(){

        /*
        $blog = BlogPost::select()->get();
        return $blog;
*/

       //Select * from table
       //$blog = BlogPost::all();

       // select title from table;
        // $blog = BlogPost::select('title')
        // ->get();

     // select * from table WHERE  = ?;
        // $blog = BlogPost::select()
        // ->WHERE('user_id', '=',  3)
        // ->get();


     // select * from table WHERE  = ? AND = ?;
        // $blog = BlogPost::select()
        // ->where('user_id', '=',  3)
        // ->where('id', '=', 4)
        // ->get();

    //  select * from table WHERE  = ? OR = ?;
        // $blog = BlogPost::select()  
        // ->where('user_id', '=', 3)
        // ->orWhere('user_id', '=' ,4)
        // ->get();

    //  select * from table ORDER BY column;
    //     $blog = BlogPost::select('title')  
    //     ->orderBy('title', 'DESC')
    //     ->get();

    //  select * from table INNER JOIN table On pk = fk;
        // $blog = BlogPost::select('title', 'name')
        // ->join('users', 'blog_posts.user_id', '=', 'users.id')
        // ->orderby('name')
        // ->get();    

    //  select * from table LEFT OUTER JOIN table On pk = fk;
        // $blog = BlogPost::select('title', 'name')
        // ->rightJoin('users', 'blog_posts.user_id', '=', 'users.id')
        // ->orderby('name')
        // ->get(); 

    //  Select COUNT(*) FROM Table; // count / sum / max / min / avg
        //$blog = BlogPost::count('id');

        //$blog = BlogPost::where('user_id', '=', 3)->count('id');

// DB Requette brute

        // $blog = BlogPost::select(DB::raw('count(*) as countblog, user_id'))
        // ->groupby('user_id')
        // ->get();

        //select * from table wehre id = ?

        //MODIFIE JP
        
        $blog = BlogPost::find(1);
        $user = User::all();


       return view('blog.blog-query', ['blog'=> $blog, 'users' => $user]);
       
    }
}
