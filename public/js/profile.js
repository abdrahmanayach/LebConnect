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
        const followBtn = document.querySelector('.profile-btn');
        followBtn.textContent = data ? "Following" : "Follow";
    });
}
