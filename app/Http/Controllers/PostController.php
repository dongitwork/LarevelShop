<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

use App\PostCategory;
use App\Post;

class PostController extends Controller
{
    public function getListCategoryPost()
    {
        $listcate = PostCategory::all(); 
        return view('admin.pages.posts.listcatepost', compact('listcate'));
    }

    public function getAddCategory()
    {
        return view('admin.pages.posts.addcatepost');
    }

    public function postAddCategory(Request $request)
    {
        $cate = new PostCategory();
        $cate->PostCategoryName = $request->PostCategoryName;
        $cate->Description      = $request->Description;
        $cate->save();
        return redirect()->route('post.listcate')->with('flash_message','Thêm mới Danh mục thành công!');
    }

    public function getEditCategory($id)
    {
        $data = PostCategory::findOrFail($id);
        return view('admin.pages.posts.editcatepost',compact('data'));
    }

    public function postEditCategory(Request $request,$id)
    {
        $cate = PostCategory::findOrFail($id);
        $cate->PostCategoryName = $request->PostCategoryName;
        $cate->Description      = $request->Description;
        $cate->save();
        return redirect()->route('post.listcate')->with('flash_message','Cập nhật danh mục thành công!');
    }

    public function postdelCategory(Request $request, $CategoryId)
    {
        $category = PostCategory::destroy(explode(',',$CategoryId));
        if($category == TRUE )
        {
            $message = 'Xóa Danh mục thành công';
        }
        else 
        {
            $message = 'No Deleted';
        }
        return redirect()->route('post.listcate')->with('flash_message',$message);
    }


    /**************** Tin Tức ****************/
    public function getListPosts()
    {
        $ListPost = DB::table('post')
                    ->join('post_category', 'post.PostCategoryId', '=', 'post_category.PostCategoryId')
                    ->select('post.*','post_category.PostCategoryName')
                    ->orderBy('PostId', 'DESC')
                    ->paginate(30);
        return view('admin.pages.posts.listpost', compact('ListPost'));
    }

    public function getAddPosts()
    {
        $data = PostCategory::all();
        $listcate = array('' => '--- Chọn Danh Mục ---');
        foreach ($data as  $value) {
          $listcate[$value->PostCategoryId] = $value->PostCategoryName;
        }
        return view('admin.pages.posts.addpost',compact('listcate'));
    }  

    public function getPostDetail($id)
    {
        $Posts = Post::findOrFail($id);
        return view('pages.newsdetail', compact('Posts'));
    }

    public function postAddPosts(Request $request)
    {
        $post = new Post();
        $post->UserId = 1;
        $post->PostCategoryId      = $request->PostCategoryId;
        $post->Title      = $request->Title;
        $post->Body      = $request->Body;
        $post->Active      = $request->Active;
        $post->CreatedAt      = date('Y-m-d H:i:s');
        $post->UpdatedAt      = date('Y-m-d H:i:s');
        $post->save();
        return redirect()->route('posts.list')->with('flash_message','Thêm mới tin tức thành công!');
    }

    public function getEditPosts($id)
    {
        $Posts = Post::findOrFail($id);
        $data = PostCategory::all();
        $listcate = array('' => '--- Chọn Danh Mục ---');
        foreach ($data as  $value) {
          $listcate[$value->PostCategoryId] = $value->PostCategoryName;
        }

        return view('admin.pages.posts.editpost',compact('Posts','listcate'));
    }

    public function postEditPosts(Request $request,$id)
    {
        $post = Post::findOrFail($id);
        $post->PostCategoryId   = $request->PostCategoryId;
        $post->Title            = $request->Title;
        $post->Body             = $request->Body;
        $post->Active           = $request->Active;
        $post->UpdatedAt       = date('Y-m-d H:i:s');
        $post->save();

        return redirect()->route('posts.list')->with('flash_message','Thêm mới tin tức thành công!');
    }

    public function postdelPosts(Request $request, $PostsId)
    {
        $post = Post::destroy(explode(',', $PostsId));
        if($post == TRUE )
        {
            $message = 'Xóa tin tức thành công';
        }
        else 
        {
            $message = 'No Deleted';
        }
        return redirect()->route('posts.list')->with('flash_message',$message);
    }

    public function postDeleteAllPost(Request $request){
        $del_item = $request->input('checkbox_delete');
        if(!collect($del_item)->isEmpty()){
            Post::destroy($del_item);
            return redirect()->route('posts.list')->with('flash_message','Xóa bài viết thành công!');
        }
        else{
            return redirect()->route('posts.list')->with('flash_message_warning','Bạn chưa chọn bài viết để xóa!');
        }
    }
    public function postDeleteAllPostCate(Request $request){
        $del_item = $request->input('checkbox_delete');
        if(!collect($del_item)->isEmpty()){
            PostCategory::destroy($del_item);
            return redirect()->route('post.listcate')->with('flash_message','Xóa danh mục bài viết thành công!');
        }
        else{
            return redirect()->route('post.listcate')->with('flash_message_warning','Bạn chưa chọn danh mục bài viết để xóa!');
        }
    }
}