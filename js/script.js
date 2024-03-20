console.log("Welcome to Spotify");

// Initialize the Variables
let songIndex = 0;
let audioElement = new Audio('songs/1.mp3');
let masterPlay = document.getElementById('masterPlay');
let myProgressBar = document.getElementById('myProgressBar');
let gif = document.getElementById('gif');
let masterSongName = document.getElementById('masterSongName');
let songItems = Array.from(document.getElementsByClassName('songItem'));

let songs = [
    {songName: "Warriyo - Mortals [NCS Release]", filePath: "songs/1.mp3", coverPath: "covers/1.jpg"},
    {songName: "Cielo - Huma-Huma", filePath: "songs/2.mp3", coverPath: "covers/2.jpg"},
    {songName: "DEAF KEV - Invincible [NCS Release]-320k", filePath: "songs/3.mp3", coverPath: "covers/3.jpg"},
    {songName: "Different Heaven & EH!DE - My Heart [NCS Release]", filePath: "songs/4.mp3", coverPath: "covers/4.jpg"},
    {songName: "Janji-Heroes-Tonight-feat-Johnning-NCS-Release", filePath: "songs/5.mp3", coverPath: "covers/5.jpg"},
    {songName: "Care Ni Carda", filePath: "songs/6.mp3", coverPath: "covers/6.jpg"},
    {songName: "Let Me Love You", filePath: "songs/7.mp3", coverPath: "covers/7.jpg"},
    {songName: "High Heels", filePath: "songs/8.mp3", coverPath: "covers/8.jpg"},
    {songName: "Jine Mera Dil Luteya", filePath: "songs/9.mp3", coverPath: "covers/9.jpg"},
    {songName: "Suit Suit", filePath: "songs/10.mp3", coverPath: "covers/10.jpg"},
    {songName: "Agar Tum Saath Ho", filePath: "songs/11.mp3", coverPath: "covers/11.jpg"},
    {songName: "Cheez Badi", filePath: "songs/12.mp3", coverPath: "covers/12.jpg"},
    {songName: "On My Way", filePath: "songs/13.mp3", coverPath: "covers/13.jpg"},
    {songName: "Dilber", filePath: "songs/14.mp3", coverPath: "covers/14.jpg"},
    {songName: "Dheere Dheere", filePath: "songs/15.mp3", coverPath: "covers/15.jpg"},
    {songName: "Duniya", filePath: "songs/16.mp3", coverPath: "covers/16.jpg"},
    {songName: "Hangover", filePath: "songs/17.mp3", coverPath: "covers/17.jpg"},
    {songName: "Blue Eyes", filePath: "songs/18.mp3", coverPath: "covers/18.jpg"},
    {songName: "Raat Bhar", filePath: "songs/19.mp3", coverPath: "covers/19.jpg"},
    {songName: "Sawan Aya Hai", filePath: "songs/20.mp3", coverPath: "covers/20.jpg"},
    {songName: "Faded", filePath: "songs/21.mp3", coverPath: "covers/21.jpg"},
    {songName: "Alone", filePath: "songs/22.mp3", coverPath: "covers/22.jpg"},
    {songName: "Darkside", filePath: "songs/23.mp3", coverPath: "covers/23.jpg"},
    {songName: "Ignite", filePath: "songs/24.mp3", coverPath: "covers/24.jpg"},
    {songName: "Excuese", filePath: "songs/25.mp3", coverPath: "covers/25.jpg"},
    {songName: "Desire", filePath: "songs/26.mp3", coverPath: "covers/26.jpg"},
    {songName: "Shadow", filePath: "songs/27.mp3", coverPath: "covers/27.jpg"},
    {songName: "Montero", filePath: "songs/28.mp3", coverPath: "covers/28.jpg"},
    {songName: "Nasha", filePath: "songs/29.mp3", coverPath: "covers/29.jpg"},
    {songName: "Nase Se Chadgayi", filePath: "songs/30.mp3", coverPath: "covers/30.jpg"},
]

songItems.forEach((element, i)=>{ 
    element.getElementsByTagName("img")[0].src = songs[i].coverPath; 
    element.getElementsByClassName("songName")[0].innerText = songs[i].songName; 
})
 

// Handle play/pause click
masterPlay.addEventListener('click', ()=>{
    if(audioElement.paused || audioElement.currentTime<=0){
        audioElement.play();
        masterPlay.classList.remove('fa-play-circle');
        masterPlay.classList.add('fa-pause-circle');
        gif.style.opacity = 1;
    }
    else{
        audioElement.pause();
        masterPlay.classList.remove('fa-pause-circle');
        masterPlay.classList.add('fa-play-circle');
        gif.style.opacity = 0;
    }
})
// Listen to Events
audioElement.addEventListener('timeupdate', ()=>{ 
    // Update Seekbar
    progress = parseInt((audioElement.currentTime/audioElement.duration)* 100); 
    myProgressBar.value = progress;
})

myProgressBar.addEventListener('change', ()=>{
    audioElement.currentTime = myProgressBar.value * audioElement.duration/100;
})

const makeAllPlays = ()=>{
    Array.from(document.getElementsByClassName('songItemPlay')).forEach((element)=>{
        element.classList.remove('fa-pause-circle');
        element.classList.add('fa-play-circle');
    })
}

Array.from(document.getElementsByClassName('songItemPlay')).forEach((element)=>{
    element.addEventListener('click', (e)=>{ 
        makeAllPlays();
        songIndex = parseInt(e.target.id);
        e.target.classList.remove('fa-play-circle');
        e.target.classList.add('fa-pause-circle');
        audioElement.src = `songs/${songIndex+1}.mp3`;
        masterSongName.innerText = songs[songIndex].songName;
        audioElement.currentTime = 0;
        audioElement.play();
        gif.style.opacity = 1;
        masterPlay.classList.remove('fa-play-circle');
        masterPlay.classList.add('fa-pause-circle');
    })
})

document.getElementById('next').addEventListener('click', ()=>{
    if(songIndex>=9){
        songIndex = 0
    }
    else{
        songIndex += 1;
    }
    audioElement.src = `songs/${songIndex+1}.mp3`;
    masterSongName.innerText = songs[songIndex].songName;
    audioElement.currentTime = 0;
    audioElement.play();
    masterPlay.classList.remove('fa-play-circle');
    masterPlay.classList.add('fa-pause-circle');

})

document.getElementById('previous').addEventListener('click', ()=>{
    if(songIndex<=0){
        songIndex = 0
    }
    else{
        songIndex -= 1;
    }
    audioElement.src = `songs/${songIndex+1}.mp3`;
    masterSongName.innerText = songs[songIndex].songName;
    audioElement.currentTime = 0;
    audioElement.play();
    masterPlay.classList.remove('fa-play-circle');
    masterPlay.classList.add('fa-pause-circle');
})