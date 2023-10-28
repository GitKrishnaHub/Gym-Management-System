const music = new Audio('songs/Over You Rishi Rich.mp3');
music.play();
// create array

const songs =[
    {
        id:'1',
        songName:  ` On My Way <br>
        <div class="subtitle">Alan Walker</div> `,
        poster:"s-img/1.jpg",
    },
    {
        id:'2',
        songName:  ` Dilber <br>
        <div class="subtitle">Satyameva Jayate</div> `,
        poster:"s-img/3.jpg"
    },

    {
        id:'3',
        songName:  ` Alan Walker <br>
        <div class="subtitle">Alan Walker</div> `,
        poster:"s-img/3.jpg"
    },
    {
        id:'4',
        songName:  ` Alan Walker <br>
        <div class="subtitle">Alan Walker</div> `,
        poster:"s-img/3.jpg"
    },
    {
        id:'5',
        songName:  ` Alan Walker <br>
        <div class="subtitle">Alan Walker</div> `,
        poster:"s-img/3.jpg"
    },
    {
        id:'6',
        songName:  ` Alan Walker <br>
        <div class="subtitle">Alan Walker</div> `,
        poster:"s-img/3.jpg"
    },
    {
        id:'7',
        songName:  ` Alan Walker <br>
        <div class="subtitle">Alan Walker</div> `,
        poster:"s-img/3.jpg"
    },
    {
        id:'8',
        songName:  ` Agar Tum Sath Ho<br><div class="subtitle">Tamashaa</div> `,
        poster:"s-img/agar tum saath ho.jpg"
    },
    {
        id:'9',
        songName:  ` Dilber<br><div class="subtitle">satyameva jayate</div> `,
        poster:"s-img/3.jpg"
    },
    {
        id:'10',
        songName:  `Duniya<br><div class="subtitle">Luka Chuppi</div> `,
        poster:"s-img/duniya.jpg"
    },
    {
        id:'11',
        songName:  ` Lagdi Lahore Di<br><div class="subtitle">Street Dancer 3D</div> `,
        poster:"s-img/lagdi lahore di.jpg"
    },
    {
        id:'12',
        songName:  ` Cheez Badi <br> <div class="subtitle">Machine</div> `,
        poster:"s-img/cheez badi.jpg"
    },
    {
        id:'13',
        songName:  ` Raat Bhar <br> <div class="subtitle">Heropanti</div> `,
        poster:"s-img/raat bhar.jpg"
    },
    {
        id:'14',
        songName:  ` Sawan Aaya Hai <br> <div class="subtitle">Creature 3D</div> `,
        poster:"s-img/sawan aya hai.jpg"
    },
    {
        id:'15',
        songName:  ` Dheere Dheere <br> <div class="subtitle">Yo Yo Honey Singh</div> `,
        poster:"s-img/dheere dheere.jpg"
    },
    {
        id:'16',
        songName:  ` Hangover <br> <div class="subtitle">Kick</div> `,
        poster:"s-img/hangover.jpg"
    },
]

Array.from(document.getElementsByClassName('songItems')).forEach((element, i) =>{
    element.getElementsByTagName('s-img')[0].src=songs[i].poster;
    element.getElementsByTagName('h5')[0].innerHTML = songs[i].songName;
})

let mPlay = document.getElementById('mPlay');
let wave = document.getElementsByClassName('wave')[0];

mPlay.addEventListener('click',()=>{
    if(music.paused || music.currentTime <=0){
        music.play();
        mPlay.classList.remove('bx-play');
        mPlay.classList.add('bx-pause');
        wave.classList.add('active2');
    }
    else{
        music.pause();
        mPlay.classList.add('bx-play');
        mPlay.classList.remove('bx-pause');
        wave.classList.remove('active2');
    }
})

let index = 0;
 
Array.from(document.getElementsByClassName('playlistplay')).forEach((element)=>{
    element.addEventListener('click',(e)=>{
        e.target.classList.remove('bx-play');
        e.target.classList.add('bx-pause');
    })
})
