function openModal() {
    const modal = document.getElementById('videoModal');
    const video = document.getElementById('youtubeVideo');

    modal.style.display = "block";
}


function closeModal() {
    const modal = document.getElementById('videoModal');
    const video = document.getElementById('youtubeVideo');


    modal.style.display = "none";

    video.src = "";
}


window.onclick = function(event) {
    const modal = document.getElementById('videoModal');
    if (event.target === modal) {
        closeModal();
    }
}