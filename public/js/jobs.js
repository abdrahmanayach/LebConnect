function toggle(job) {
    console.log(job);
   
    let detail = document.querySelector('.detail');

    detail.querySelector('.detail-header p').textContent = job.job_title;
    detail.querySelector('.detail-header h2').textContent = job.company;
    detail.querySelector('.detail-desc .qualification ul').textContent = job.description;

    detail.style.display = 'block';
}