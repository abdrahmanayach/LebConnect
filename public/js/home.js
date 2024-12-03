let pm = document.getElementById("profileMenu");

function showMenu() {
  pm.classList.toggle("open-menu");
}



function like(postId) {
  fetch('/like', {
    method: 'POST', 
    headers: {
      'Content-Type': 'application/json' 
    },
    body: JSON.stringify(postId) 
  })
  .then(res => res.json())
  .then(likesCount => {
    console.log(likesCount);
    const likes = document.querySelector(`.likes-${postId}`);
    const likeBtn = document.querySelector(`.like-btn-${postId}`);
    likeBtn.classList.toggle("active-like");
    likes.innerHTML = likesCount + " likes";
  })
  .catch(error => {
    console.error('Error:', error);
  });
}



function showComments(postId) {
  const comments = document.querySelector(`.comment-post-${postId}`);
  comments.classList.toggle("d-flex");
}


function addComment(postId) {
  const input = document.querySelector(`.comment-field-${postId}`);
  const comment = input.value;
  if(comment.trim().length === 0) {
    return;
  }

  const data = {
    postId,
    comment
  };

  fetch('/comment', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify(data),
  })
  .then(res => res.json())
  .then((data) => {
    const comments = document.querySelector(`.comments-${postId}`);
    const strElt = ` 
    <div class="comment">
        <div class="image">
            <img src="${data.user.image_url}" class="comment-photo">
        </div>
        <div class="content">
            <a href="/profile">
                <p class="username">${data.user.first_name} ${data.user.last_name}</p>
            </a>
            <p class="comment-time"> ${data.timeElapsed }</p>
            <p class="text">${data.comment.content}</p>
        </div>
    </div>
    `;
    const newElt = document.createElement('div');
    newElt.innerHTML = strElt;
    comments.insertBefore(newElt, comments.firstChild);

    console.log(data);
    input.value = "";
  })
  .catch((error) => console.log(error));
}

{/* <div class="comment">
<img src="img/profile.jpg" class="comment-photo">
<div class="content">
    <p class="username"><?php echo $comment->user->fullName ?></p>
    <p><?php echo $comment->content ?></p>
</div>
</div> */}

// document.addEventListener( 'DOMContentLoaded', function () {
//   textComment.addEventListener('input', function() {
//     if ( textComment.value.trim().length > 0) {
//       btnAddComment.style.display = 'block';
//     } else {
//       btnAddComment.style.display = 'none';
//     }

// });

// });

function handleTextareaInput(postId) {
  console.log('test');
  let textComment = document.querySelector('.comment-field-' + postId);
  let btnAddComment = document.querySelector('.comment-post-' + postId + ' .post-btn');

  textComment.addEventListener('input', function() {
    console.log('test');
      if (textComment.value.trim().length > 1) {
          console.log("More than one character");
      } else {
          console.log("One character or less");
      }
  });
}

const follow = (userId) => {
  fetch('/follow', {
      method: 'POST',
      headers: {
          'Content-Type': 'application/json'
      },
      body: JSON.stringify(userId)
  })
  .then(res => res.json())
  .then((data) => {
      console.log(data);
      const followBtn = document.querySelector(`.btn-follow-${userId}`);
      followBtn.textContent = data ? "Following" : "Follow";
  });
}
