<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Follow;
use App\Models\Skill;
use App\Models\User;

class ProfileController extends Controller
{

    public function __construct()
    {
        if (!$this->isAuth()) {
            $this->redirect('/login');
        }
    }

    public function profile()
    {
        $profilePath = $_GET['user'];
        $user = User::where('profile_path', $profilePath)->first();
        $currentUser = User::where('id', $_SESSION['user_id'])->first();

        $user->followersCount = Follow::where('followed_id', $user->id)->count();
        $user->followingCount = Follow::where('follower_id', $user->id)->count();
        $user->experience = Experience::where('user_id', $user->id)->get();
        $user->education = Education::where('user_id', $user->id)->get();
        $user->skills = Skill::where('user_id', $user->id)->get();

        $isSameUser = $currentUser && $profilePath === $currentUser->profile_path;


        $isFollowing = Follow::where([
            ['follower_id', '=', $currentUser->id],
            ['followed_id', '=', $user->id],
        ])->exists();

        $this->render('/profile', ['user' => $user, 'isFollowing' => $isFollowing, 'same' => $isSameUser]);
    }

    public function info()
    {

        $headline = $_POST['headline'];
        $location = $_POST['location'];
        $about = $_POST['about'];

        $user = User::where('id', $_SESSION['user_id'])->first();
        $user->headline = $headline;
        $user->location = $location;
        $user->about = $about;

        $user->save();
        $this->redirect('/profile?user=' . $user->profile_path);
    }

    public function image()
    {
        $imagePath = null;

        if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
            $uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . '\uploads\\';
            $imageFileName = uniqid('img_') . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadDirectory . $imageFileName)) {
                $imagePath = 'uploads/' . $imageFileName;
            }
        }

        $user = User::where('id', $_SESSION['user_id'])->first();
        $user->image_url = $imagePath;
        $user->save();

        $this->redirect('/profile?user=' . $user->profile_path);
    }

    public function experience()
    {
        $jobTitle = $_POST['jobTitle'];
        $company = $_POST['company'];
        $type = $_POST['type'];
        $desc = $_POST['desc'];
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];

        $user = User::where('id', $_SESSION['user_id'])->first();

        Experience::create([
            'job_title' => $jobTitle,
            'company' => $company,
            'type' => $type,
            'description' => $desc,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'user_id' => $user->id,
        ]);

        $this->redirect('/profile?user=' . $user->profile_path);
    }

    public function education()
    {
        $university = $_POST['university'];
        $major = $_POST['major'];
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];

        $user = User::where('id', $_SESSION['user_id'])->first();

        Education::create([
            'university' => $university,
            'major' => $major,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'user_id' => $user->id,
        ]);

        $this->redirect('/profile?user=' . $user->profile_path);
    }

    public function skills()
    {
        $name = $_POST['name'];
        $user = User::where('id', $_SESSION['user_id'])->first();

        Skill::create([
            'name' => $name,
            'user_id' => $user->id,
        ]);

        $this->redirect('/profile?user=' . $user->profile_path);
    }
}
