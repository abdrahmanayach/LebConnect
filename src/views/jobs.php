<?php
$title = 'Jobs';
$css = 'jobs.css';

include 'partials/header.php';
?>

<body>
    <?php include 'partials/navbar.php'; ?>
    <section class="section1">
        <div class="container">
            <div class="main">
            <div class="left-sidebar">
                <div class="sidebar">
                    <button class="btn-new-post" data-toggle="modal" data-target="#modal2">Post a new Job</button>
                    <div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="modal2Label" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Post a new Job</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="/create-job" method="post" id="postForm">
                                        <div class="form-group">
                                            <label for="company">Company</label>
                                            <input class="form-control" type="text" id="formFile" name="company">
                                        </div>
                                        <div class="form-group">
                                            <label for="jobTitle">Job Title</label>
                                            <input class="form-control" type="text" id="formFile" name="jobTitle">
                                        </div>
                                        <div class="form-group">
                                            <label for="location">Location</label>
                                            <input class="form-control" type="text" id="formFile" name="location">
                                        </div>
                                        <div class="form-group">
                                            <label for="salary">Salary</label>
                                            <input class="form-control" type="text" id="formFile" name="salary">
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
                                            <label for="email">Email</label>
                                            <input class="form-control" type="text" id="formFile" name="email">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Description</label>
                                            <textarea class="form-control" type="text" rows="10" id="formFile" name="desc"></textarea>
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
            </div>
                <div class="wrapper">
                    <?php foreach ($jobs as $job) : ?>
                        <div class="card" onclick="toggle(<?php echo htmlspecialchars(json_encode($job)) ?>)">
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
            <div class="detail" style="display: none" ;>
                <ion-icon name="close-detail" class="close-detail"></ion-icon>
                <div class="detail-header">
                    <img src="img/applyTest.png" class="solution">
                    <p>Orthopedic doctor</p>
                    <h2>Islamc Hospital</h2>
                </div>
                <hr class="divider">
                <div class="detail-desc">
                    <div class="qualification">
                        <h4>Requirements</h4>
                        <ul>
                            <li>Completion of medical school with a Doctor of Medicine (MD) or Doctor of Osteopathic Medicine (DO) degree.</li>
                            <li>Completion of a residency program in orthopedic surgery, typically lasting 4 to 5 years.</li>
                            <li>Board certification by the American Board of Orthopaedic Surgery (ABOS) or equivalent certifying body.</li>
                        </ul>
                    </div>
                </div>
                <hr class="divider">
                <div class="detail-btn">
                    <a  href="mailto:<?= $job->email ?>" class="btn-apply">Apply Now</a>
                </div>
            </div>
        </div>
    </section>
</body>
<!--adding icons-->
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<!-- adding library jquery-->
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="js/jobs.js"></script>

</html>