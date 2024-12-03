<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Comment;
use App\Models\Follow;
use App\Models\Job;
use App\Models\Post;
use App\Models\User;
use App\Models\Like;


class HomeController extends Controller
{
    public function __construct()
    {
        if (!$this->isAuth()) {
            $this->redirect('/login');
        }
    }

    public function home()
    {
        $user = User::where('id', $_SESSION['user_id'])->first();
        $followerIds = $user->followings()->pluck('followed_id')->toArray();
        $user->followingsCount = $user->followings()->count();
        $user->followersCount = $user->followers()->count();

        $posts = Post::with(['user', 'comments' => function ($query) {
            $query->orderBy('created_at', 'desc')->take(5);
        }])
            ->whereIn('user_id', $followerIds)
            ->orWhere('user_id', $user->id)
            ->withCount('likes', 'comments')
            ->orderBy('created_at', 'DESC')
            ->get();

        $morePeople = User::whereNotIn('id', $followerIds)
            ->where('id', '<>', $user->id)
            ->take(5)
            ->get();

        $this->render("home", ["user" => $user, "posts" => $posts, 'morePeople' => $morePeople]);
    }

    public function network()
    {
        $user = User::where('id', $_SESSION['user_id'])->first();
        $followerIds = $user->followings()->pluck('followed_id')->toArray();
        $user->followingsCount = $user->followings()->count();
        $user->followersCount = $user->followers()->count();

        $morePeople = User::whereNotIn('id', $followerIds)
            ->where('id', '<>', $user->id)
            ->get();

        return $this->render('network', ['user' => $user, 'morePeople' => $morePeople]);
    }

    public function post()
    {
        $content = $_POST['content'];
        $imagePath = null;

        if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
            $uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . '\uploads\\';
            $imageFileName = uniqid('img_') . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadDirectory . $imageFileName)) {
                $imagePath = 'uploads/' . $imageFileName;
            }
        }

        Post::create([
            'content' => $content,
            'image_url' => $imagePath,
            'user_id' => $_SESSION['user_id'],
        ]);

        $this->redirect('/');
    }

    public function like()
    {
        $postId = json_decode(file_get_contents('php://input'), true);
        $isLiked = Like::where('post_id', $postId)->where('user_id', $_SESSION['user_id'])->exists();

        if ($isLiked) {
            Like::where('post_id', $postId)->where('user_id', $_SESSION['user_id'])->delete();
        } else {
            Like::create([
                'post_id' => $postId,
                'user_id' => $_SESSION['user_id'],
            ]);
        }

        $likesCount = Like::where('post_id', $postId)->count();
        $this->json($likesCount);
    }


    public function comment()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $comment = Comment::create([
            'user_id' => $_SESSION['user_id'],
            'post_id' => $data['postId'],
            'content' => $data['comment'],
        ]);

        $user = $comment->user;
        $timeElapsed = $comment->elapsedTime;

        $this->json([
            'comment' => $comment,
            'user' => $user,
            'timeElapsed' => $timeElapsed,
        ]);
    }

    public function jobs()
    {
        $user = User::where('id', $_SESSION['user_id'])->first();
        $jobs = Job::where('user_id', '!=', $_SESSION['user_id'])
        ->orderBy('created_at', 'desc')
        ->get();        
        
        $this->render('jobs', ['user' => $user, 'jobs' => $jobs]);
    }

    public function follow()
    {
        $userId = json_decode(file_get_contents('php://input'), true);
        $user = User::where('id', $_SESSION['user_id'])->first();
        $isFollowing = Follow::where([
            ['follower_id', '=', $user->id],
            ['followed_id', '=', $userId],
        ])->exists();
        if ($isFollowing) {
            Follow::where([
                'follower_id' => $user->id,
                'followed_id' => $userId,
            ])->delete();
        } else {
            Follow::create([
                'follower_id' => $user->id,
                'followed_id' => $userId,
            ]);
        }

        $this->json(!$isFollowing);
    }

    public function createJob()
    {

        $user = User::where('id', $_SESSION['user_id'])->first();

        $company = $_POST['company'];
        $jobtitle = $_POST['jobTitle'];
        $location = $_POST['location'];
        $salary = $_POST['salary'];
        $type = $_POST['type'];
        $desc = $_POST['desc'];
        $email = $_POST['email'];

        Job::create([
            'company' => $company,
            'job_title' => $jobtitle,
            'location' => $location,
            'salary' => $salary,
            'type' => $type,
            'description' => $desc,
            'email' => $email,
            'user_id' => $user->id
        ]);

        $this->redirect('/jobs');
    }

    public function search() {
        $q = $_POST['q'];
        $userId = $_SESSION['user_id'];

        $user = User::where('id', $_SESSION['user_id'])->first();

        $users = User::where(function($query) use ($q) {
            $query->where('first_name', 'LIKE', '%' . $q . '%')
                  ->orWhere('last_name', 'LIKE', '%' . $q . '%');
        })
        ->where('id', '!=', $userId)
        ->get();
    
        $jobs = Job::where('job_title', 'LIKE', '%' . $q . '%')
        ->where('user_id', '!=', $userId)

                    ->get();
    
        return $this->render('search', ['users' => $users, 'jobs' => $jobs, 'user' => $user]);
    }
    
}
