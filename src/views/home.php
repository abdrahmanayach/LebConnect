<?php
$title = 'Home';
$css = 'home.css';

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
            <div class="main-content">
                <div class="create-post">
                    <div class="create-post-input">
                        <img src="<?php echo $user->image_url ?>" />
                        <button type=" button" class="button" data-toggle="modal" data-target="#modal">
                            Create a new post
                        </button>
                    </div>
                    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
                        <div class="modal-dialog  modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Create a new post</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="/post" method="post" id="postForm" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="textarea">Post</label>
                                            <textarea class="form-control" id="textarea" rows="8" name="content" required style="resize: none;"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="image">Image</label>
                                            <input type="file" class="form-control-file" id="image" name="image" accept="image/png, image/jpg, image/jpeg">
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
                <?php foreach ($posts as $post) : ?>
                    <div class="post">
                        <div class="post-author">
                            <img src="<?php echo $post->user->image_url ?>">
                            <div>
                                <h1><a href="/profile?user=<?php echo $post->user->profile_path ?>"><?php echo $post->user->full_name ?></a></h1>
                                <small class="headline"><?php echo $post->user->headline; ?></small>
                                <small><?= $post->elapsedTime ?></small>
                            </div>
                        </div>
                        <p class="time"><?php echo $post->content ?></p>
                        <?php if ($post->image_url) : ?>
                            <img src="<?php echo $post->image_url ?>" width="100%" class="post-image">
                        <?php endif; ?>
                        <div class="post-stats">
                            <div>
                                <span class="liked-users likes-<?php echo $post->id ?>"><?php echo $post->likes_count ?> likes</span></span>
                            </div>
                            <div>
                                <span><?php echo $post->comments_count ?> comments &middot; 40 shares</span>
                            </div>
                        </div>
                        <div class="post-activity">
                            <div class="post-activity-link like-btn-<?php echo $post->id ?> <?php if ($post->liked) echo "active-like";  ?>" onclick="like(<?php echo $post->id ?>)">
                                <span class="material-symbols-outlined">
                                    thumb_up
                                </span>
                                <span>Like</span>
                            </div>
                            <div class="post-activity-link" onclick="showComments(<?php echo $post->id ?>)">
                                <span class="material-symbols-outlined">
                                    comment
                                </span>
                                <span>Comment</span>
                            </div>
                            <div class="post-activity-link">
                                <span class="material-symbols-outlined">
                                    share
                                </span>
                                <span>Share</span>
                            </div>
                        </div>
                        <div class="comment-section comment-post-<?php echo $post->id ?>">
                            <div class=" comment-row">
                                <img src="<?php echo $user->image_url ?>" width="10%">
                                <textarea type="text" placeholder="add a comment..." class="comment-field comment-field-<?php echo $post->id ?>" rows="1" required></textarea>
                            </div>
                            <div>
                                <button class="post-btn" onclick="addComment(<?php echo $post->id ?>)">Post</button>
                            </div>
                        </div>


                        <div class="comments-<?php echo $post->id ?>">
                            <?php foreach ($post->comments as $comment) : ?>

                                <div class="comment">
                                    <div class="image">
                                        <img src="<?php echo $comment->user->image_url ?>" class="comment-photo">
                                    </div>
                                    <div class="content">
                                        <a href="/profile?user=<?php echo $comment->user->profile_path ?>">
                                            <p class="username"><?php echo $comment->user->fullName ?></p>
                                        </a>

                                        <p class="comment-time"> <?php echo $comment->elapsedTime; ?></p>
                                        <p class="text"><?php echo $comment->content ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="right-sidebar">
                <div class="sidebar-people">
                    <h6 class="connection-title">Add to your feed</h6>
                    <?php foreach ($morePeople as $person) : ?>
                        <div class="person">
                            <div>
                                <img src="<?php echo $person->image_url ?>" />
                            </div>
                            <div class="details">
                                <div class="name"><?php echo $person->fullName ?></div>
                                <div class="title"><?php echo $person->headline ?></div>
                                <div>
                                    <Button class="btn-follow btn-follow-<?php echo $person->id ?>" onclick="follow(<?php echo $person->id ?>)">Follow</Button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <script src="js/home.js"></script>
</body>

</html>