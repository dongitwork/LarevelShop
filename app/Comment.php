<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Comment extends Model
{
    protected $table = 'comment';
    protected $primaryKey = 'CommentId';
    protected $fillable = [
        'Status', 'Content', 'CreatedAt', 'UpdatedAt', 'ProductPublishId', 'CustomerId',
    ];
    public $timestamps = false;

    public function reply(){
        return $this->hasOne('App\Reply', 'CommentId');
    }

    public static function getCommentInfo($ProductPublishId){
        $comment_info = DB::table('comment')->join('customer','comment.CustomerId','=','customer.CustomerId')
                            ->leftJoin('reply','comment.CommentId',"=","reply.CommentId")
                            ->leftJoin('user','user.UserId','=','reply.UserId')
                            ->leftJoin('role','role.RoleId','=','user.RoleId')
                            ->where('comment.ProductPublishId',$ProductPublishId)
                            ->where('comment.Status',1)
                            ->select('comment.CreatedAt','comment.Content','customer.CustomerId','customer.CustomerFullName',
                                     'customer.Image','reply.Content as ReplyContent','user.UserName','user.Image as UserImage',
                                     'role.RoleName')->orderBy('comment.CommentId','desc')->get();
        return $comment_info;
    }

    public static function getCommentInfoAdmin(){
        $comment_info = DB::table('comment')->join('customer','comment.CustomerId','=','customer.CustomerId')
                            ->join('product_publish','product_publish.ProductPublishId','=','comment.ProductPublishId')
                            ->join('product','product_publish.ProductId','=','product.ProductId')
                            ->select('comment.CommentId','comment.Content','comment.CreatedAt','comment.UpdatedAt','comment.Status',
                                     'product.ProductName','customer.CustomerFullName')->orderBy('comment.CommentId','desc')->get();
        return $comment_info;
    }

    public static function getCommentInfoById($id){
        $comment_info = DB::table('comment')->join('customer','comment.CustomerId','=','customer.CustomerId')
                            ->join('product_publish','product_publish.ProductPublishId','=','comment.ProductPublishId')
                            ->join('product','product_publish.ProductId','=','product.ProductId')
                            ->leftJoin('reply','reply.CommentId','=','comment.CommentId')
                            ->where('comment.CommentId',$id)
                            ->select('comment.CommentId','comment.Content','comment.CreatedAt','comment.UpdatedAt','comment.Status',
                                     'product.ProductName','customer.CustomerFullName','reply.Content as Reply')->get();
        return $comment_info;
    }
}
class Reply extends Model{
    protected $table = 'reply';
    protected $primaryKey = 'ReplyId';
    protected $fillable = [
        'Content', 'CreatedAt', 'UpdatedAt', 'CommentId', 'UserId',
    ];
    public $timestamps = false;

    public function comment(){
        return $this->belongsTo('App\Comment', 'CommentId');
    }
}
