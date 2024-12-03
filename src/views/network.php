<?php
$title = 'Network';
$css = 'network.css';

include 'partials/header.php';
?>

<body>
    <?php include 'partials/navbar.php'; ?>
    <section class="section1">
        <div class="container">
            <div class="left-sidebar">
                <div class="sidebar-profile-box">
                    <img src="img/profileBack.jpeg" width="100%" class="back-home">
                    <div class="sidebar-profile-info">
                        <div class="image">
                            <img src="<?php echo $user->image_url ?>" class="home-profile">
                        </div>
                        <div class="info">
                            <a href="/profile?user=<?php echo $user->profile_path;  ?>">
                                <h1><?php echo $user->fullName; ?></h1>
                            </a>
                            <h3 class="position"> <?php echo $user->headline; ?></h3>
                        </div>
                        <ul>
                            <li>Followers<span> <?php echo $user->followersCount ?> </span></li>
                            <li>Following<span> <?php echo $user->followingsCount ?> </span></li>
                            <li><a href="#">Find a new job</a></li>
                        </ul>
                    </div>
                    <div>
                        <svg role="none" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" data-supported-dps="16x16" data-test-icon="bookmark-fill-small">
                            <use href="#bookmark-fill-small" width="16" height="16"></use>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="people">
                    <p>People you may know based on your recent activity</p>
                    <div class="cards row">
                        <?php foreach ($morePeople as $person) : ?>
                            <div class="person-card ">
                                <div class="bg-wrapper">
                                    <img src="img/profileBack.jpeg" class="bg-image" />
                                </div>
                                <div class="details">
                                    <div class="image">
                                        <img src="<?php echo $person->image_url ?>" class="profile-img" />
                                    </div>
                                    <div class="info">
                                    <a href="<?php echo $person->profile_path  ?>"><div class="name"><?php echo $person->fullName ?></div></a>
                                        <div class="job-title"><?php echo $person->job_title ?></div>
                                        <Button class="btn-follow btn-follow-<?= $person->id ?>" onclick="follow(<?php echo $person->id ?>)">Follow</Button>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>


</body>