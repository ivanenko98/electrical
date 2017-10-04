<?php
/**
 * Created by PhpStorm.
 * User: westham
 * Date: 30.09.2017
 * Time: 9:20
 */

namespace app\http;


use app\models\Post;

class PostController extends Controller
{
    public function all(){
        //выстаскиваем данным с талицы
        $posts = Post::find();

        //рендерит view файл, передавая туда массив [‘posts’ => $posts]
        return $this->render('post/all', compact('posts'));
    }

}