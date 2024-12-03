<?php
$title = $user->fullName;
$css = 'profile.css';


include 'partials/header.php';
?>


<body>
    <?php include 'partials/navbar.php'; ?>
    <section>

        <div class="container">
            <div class="profile-main">
                <div class="profile-container">
                    <img src="img/profileBack.jpeg" width="100%" class="background-img">
                    <div class="profile-info">
                        <div class="profile-container-inner">
                            <img src="<?php echo $user->image_url ?>" class="profile-pic" id="openModalBtn" data-toggle="modal" data-target="#modal2">
                            <div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="modal2Label" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Update profile photo</h5>
                                            <button type="button" class="close" data-dismiss="modal2" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/profile-image" method="post" id="postForm" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="image">Image</label>
                                                    <input class="form-control" type="file" id="formFile" name="image" accept="image/png, image/jpg, image/jpeg">
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="submit" class="btn btn-primary" />
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h1><?php echo $user->fullName; ?> </h1>
                            <b><?php echo $user->headline; ?></b>
                            <p><?php echo $user->location; ?> </p>
                            <div class="mutual-connection">

                                <span><?php echo $user->followersCount ?> followers </span>
                                <span><?php echo $user->followingCount ?>  following</span>

                            </div>
                            <?php if ($_SESSION['user_id'] != $user->id) : ?>
                                <button class="profile-btn" onclick="follow(<?php echo $user->id ?>); follow();">
                                    <?php echo $isFollowing ? 'Following' :  'Follow';  ?>
                                </button>
                            <?php endif; ?>
                        </div>
                        <?php if ($same): ?>
                        <div class="action">
                            <ion-icon name="create-outline" class="edit-about-icon" data-toggle="modal" data-target="#modal"></ion-icon>
                        </div>
                        <?php endif ?>
                        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
                            <div class="modal-dialog  modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Update Profile</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/info" method="post" id="postForm" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="textarea">Headline</label>
                                                <input type="text" class="form-control" name="headline" value="<?php echo $user->headline; ?>" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="textarea">Location</label>
                                                <input type="text" class="form-control" name="location" value="<?php echo $user->location; ?>" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="textarea">About</label>
                                                <textarea class="form-control" id="textarea" rows="8" name="about" required style="resize: none;"><?php echo $user->about ?></textarea>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="submit" class="btn btn-primary" />
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="profile-description">
                        <div class="about-section">
                            <h2>About</h2>
                            <p>
                                <?php echo $user->about; ?>
                            </p>
                        </div>
                        <!-- <a href="#" class="see-more-link">See more ...</a> -->
                    </div>

                </div>


                <div class="profile-description">
                    <div class="profile-heading">
                        <h2>Experience</h2>
                        <?php if ($same): ?>
                        <ion-icon name="add-circle-outline" class="add-circle" data-toggle="modal" data-target="#modal3"></ion-icon>
                        <?php endif; ?>
                    </div>
                    <div class="modal fade" id="modal3" tabindex="-1" role="dialog" aria-labelledby="modal3" aria-hidden="true">
                        <div class="modal-dialog " role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Update Profile</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="/experience" method="post" id="postForm" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="textarea">Job Title</label>
                                            <input type="text" class="form-control" name="jobTitle" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="textarea">Company Name</label>
                                            <input type="text" class="form-control" name="company" required />
                                        </div>

                                        <div class="form-group">
                                            <label for="select">Type</label>
                                            <select class="form-control" id="select" name="type">
                                                <option name="fullTime">Full Time</option>
                                                <option name="partTime">Part Time</option>
                                                <option name="internship">Internship</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="textarea">Description</label>
                                            <input type="text" class="form-control" name="desc" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="textarea">Start Date</label>
                                            <input type="date" class="form-control" name="startDate" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="textarea">End Date</label>
                                            <input type="date" class="form-control" name="endDate" required />
                                        </div>
                                        <div class="modal-footer">
                                            <input type="submit" class="btn btn-primary" />
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php foreach ($user->experience as $experience) : ?>
                        <div class="profile-desc-row">
                            <img src="img/job.png">
                            <div>
                                <h3><?php echo $experience->job_title  ?></h3>
                                <b><?php echo $experience->company  ?> &middot; <?php echo $experience->type ?></b>
                                <b><?php echo $experience->startYearMonth ?> - present &middot; <?php echo $experience->monthsDifference ?> month</b>
                                <p><?php echo $experience->description ?> </p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>


                <div class="profile-description">
                    <div class="profile-heading">
                        <h2>Education</h2>
                        <?php if ($same): ?>
                        <ion-icon name="add-circle-outline" class="add-circle" data-toggle="modal" data-target="#modal4"></ion-icon>
                        <?php endif; ?>
                    </div>
                    <div class="modal fade" id="modal4" tabindex="-1" role="dialog" aria-labelledby="modal4" aria-hidden="true">
                        <div class="modal-dialog " role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Education</h5>
                                    <button type="button" class="close" data-dismiss="modal4" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="/education" method="post" id="postForm" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="textarea">University</label>
                                            <input type="text" class="form-control" name="university" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="textarea">Major</label>
                                            <input type="text" class="form-control" name="major" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="textarea">Start Date</label>
                                            <input type="date" class="form-control" name="startDate" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="textarea">End Date</label>
                                            <input type="date" class="form-control" name="endDate" required />
                                        </div>
                                        <div class="modal-footer">
                                            <input type="submit" class="btn btn-primary" />
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php foreach ($user->education as $education) : ?>
                        <div class="profile-desc-row">
                            <img src="img/edu.png">
                            <div>
                                <h3><?php echo $education->university ?></h3>
                                <b><?php echo $education->major ?></b>
                                <b><?php echo $education->startYear ?> - <?php echo $education->endYear ?></b>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>

                <div class="profile-description skills-section">
                    <div class="profile-heading">
                        <h2>Skills</h2>
                        <?php if ($same): ?>
                        <ion-icon name="add-circle-outline" class="add-circle" data-toggle="modal" data-target="#modal5"></ion-icon>
                        <?php endif; ?>
                    </div>
                    <div class="modal fade" id="modal5" tabindex="-1" role="dialog" aria-labelledby="modal5" aria-hidden="true">
                        <div class="modal-dialog " role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add a new skill</h5>
                                    <button type="button" class="close" data-dismiss="modal5" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="/skills" method="post" id="postForm" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="textarea">Skill</label>
                                            <input type="text" class="form-control" name="name" required />
                                        </div>
                                        <div class="modal-footer">
                                            <input type="submit" class="btn btn-primary" />
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="skills-wrapper">
                    <?php foreach ($user->skills as $skill) : ?>
                        <a class="skilld-btn"><?php echo $skill->name ?></a>
                    <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="profile-sidebar"></div>

        </div>
    </section>
    <script src="js/profile.js"></script>
</body>

</html>