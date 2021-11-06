<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BlogDataTable;
use App\Events\BlogCreated;
use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\BaseController;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class BlogController extends BaseController
{
    public function __construct()
    {
        $this->middleware('role:super-admin|admin');
        $this->addMenuData('Berita', route('admin.blogs.index'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BlogDataTable $dataTable)
    {
        return $dataTable->render('web.admin.blog.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->addMenuData('Tambah Berita', route('admin.blogs.create'));
        return view('web.admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogRequest $request)
    {
        $request->validated();

        $file = $request->file('thumbnail');
        $name = 'blog/' . date('dmY') . Str::random(10) . $file->getClientOriginalExtension();

        $file->storeAs('public', $name);

        $request = new Request($request->all());
        $request->merge(['thumbnail' => 'storage/' . $name]);

        $blog = Auth::user()->blogs()->create($request->all());
        event(new BlogCreated($blog, $request->category, $request->tag));

        Alert::toast('Berhasil membuat berita', 'success');
        return redirect()->route('admin.blogs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        dd($blog);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        $this->addMenuData('Edit Berita', route('admin.blogs.edit', $blog->slug));
        return view('web.admin.blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $request->validated();

        if ($request->hasFile('thumbnail')) {
            $current = Str::replace('storage', 'public', $blog->thumbnail);
            if (Storage::exists($current)) {
                Storage::delete($current);
            }
            $file = $request->file('thumbnail');
            $name = 'blog/' . date('dmY') . Str::random(10) . $file->getClientOriginalExtension();
            $file->storeAs('public', $name);
            $request = new Request($request->all());
            $request->merge(['thumbnail' => 'storage/' . $name]);
        }

        $blog->update($request->all());
        event(new BlogCreated($blog, $request->category, $request->tag));

        Alert::toast('Berhasil mengubah berita', 'success');
        return redirect()->route('admin.blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $thumbnail = Str::replace('storage', 'public', $blog->thumbnail);
        if (Storage::exists($thumbnail)) {
            Storage::delete($thumbnail);
        }
        $blog->delete();

        return response()->json(['status' => 'success']);
    }
}
