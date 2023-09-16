<?php

/// dua komponen jika di buat folder
namespace App\Http\Controllers\home;
use App\Models\Blog;


use App\Models\Komen;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeBlogController extends Controller
{
public function blog()
{
 $blogs = Blog::latest()->paginate(4); // Mengambil 4 blog per halaman
    $data = [
        'blogs' => $blogs,
        'content' => 'home/blog/index'
    ];

    return view('home.layouts.wrapper', $data);
}


public function detailBlog($id)
{
    $blog = Blog::find($id); // Retrieve the specific blog post

    
    // Menghitung jumlah komentar yang terkait dengan blog ini
      $komen = Komen::where('blog_id', $id)->get(); // Retrieve comments associated with the specific blog post
        $jumlahKomentar = $komen->count();
         // Mengambil tiga artikel terbaru
    $recentBlogs = Blog::latest()->take(3)->get();

    $data = [
        'blog' => $blog,
        'komen' => $komen,
        'jumlahKomentar' => $jumlahKomentar, // Menyertakan jumlah komentar ke dalam data
        'recentBlogs' => $recentBlogs, // Mengirim variabel $recentBlogs ke tampilan
        'content' => 'home/blog/detail'
    ];

    return view('home.layouts.wrapper', $data);
}

public function index()
{
    $komen = Komen::get(); // Retrieve comments from the Komen model

    $data = [
        'komen' => $komen,
        'content' => 'home/blog/detail'
    ];

    return view('home.layouts.wrapper', $data);
}

public function search(Request $request)
{
    $query = $request->input('query');
    $blogs = Blog::where('judul', 'like', "%$query%")
                 ->orWhere('deskripsi', 'like', "%$query%")
                 ->paginate(10);

    $data = [
        'blogs' => $blogs,
        'content' => 'home/blog/index', // Ganti dengan tampilan beranda Anda yang sesuai
    ];

    return view('home.layouts.wrapper', $data);
}
}
