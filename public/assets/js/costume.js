const uploadProfileImg = document.getElementById('uploadProfileImg');
const uploadBox = document.getElementById('uploadBox');
const profileImg = document.getElementById('profile_img');

uploadProfileImg.onclick = (e) => {
    e.preventDefault();
    console.log("here");
    uploadBox.click();
}

uploadBox.onchange = (e) => {
    profileImg.src = URL.createObjectURL(e.target.files[0]);
}
