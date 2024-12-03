<?php
$title = 'Search';
$css = 'search.css';

include 'partials/header.php';
?>

<body>
<?php include 'partials/navbar.php'; ?>
<section>
    <div class="container">
        <?php if(isset($users) && isset($jobs) && !empty($users) && !empty($jobs)): ?>
            <div class="people">
                    <h1>People</h1>
                    <div class="cards row">
                        <?php foreach ($users as $person) : ?>
                            <div class="person-card">
                                <div class="bg-wrapper">
                                    <img src="img/profileBack.jpeg" class="bg-image" />
                                </div>
                                <div class="details">
                                    <div class="image">
                                        <img src="<?php echo $person->image_url ?>" class="profile-img" />
                                    </div>
                                    <div class="info">
                                       <a href=""><?php echo $person->fullName ?></a>
                                        <div class="job-title"><?php echo $person->job_title ?></div>
                                        <Button class="btn-follow btn-follow-<?= $person->id ?>" onclick="follow(<?php echo $person->id ?>)">Follow</Button>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
        <div class="jobs">
            <div class="wrapper">
            <h1>Jobs</h1>
                    <?php foreach ($jobs as $job) : ?>
                        <div class="card">
                            <div class="card-left red-bg">
                                <img src="img/jobb.png">
                            </div>
                            <div class="card-center">
                                <h2><?php echo $job->company ?></h2>
                                <h3 class="card-detail"><?php echo $job->job_title ?></h3>
                                <h4 class="card-loc"><ion-icon name="location-outline"></ion-icon><?php echo $job->location ?></h4>
                                <div class="card-sub">
                                    <p><ion-icon name="time-outline"></ion-icon><?php echo $job->elapsedTime ?></p>
                                </div>
                            </div>
                            <div class="card-right">
                                <div class="card-tag">
                                    <p><ion-icon name="hourglass-outline"></ion-icon><?php echo $job->type ?></p>
                                </div>
                                <div class="card-salary">
                                    <p><b><?php echo $job->salary ?>$</b> <span>/month</span></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
        </div>
        <?php else: ?>
            <h1>No results!</h1>
        <?php endif ?>
    </div>
</section>
</body>
