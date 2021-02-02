$('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
    if (!$(this).next().hasClass('show')) {
        $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
    }
    var $subMenu = $(this).next(".dropdown-menu");
    $subMenu.toggleClass('show');


    $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
        $('.dropdown-submenu .show').removeClass("show");
    });


    return false;
});

function addPlaylist(pid, sid) {
    event.preventDefault();

    let playlistId = pid;
    let songId = sid;
    let _token = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: "/ajax-request/'$songId'",
        type: "POST",
        data: {
            playlistId: playlistId,
            songId: songId,
            _token: _token
        },
        success: function(response) {
            console.log(response);
            if (response) {
                $('.success').text(response.success);
                $("#ajaxform")[0].reset();
            }
        },
    });
}

function removeFromPlaylist(sid, pid) {
    // alert('ff');
    event.preventDefault();

    let playlistId = pid;
    let songId = sid;
    let _token = $('meta[name="csrf-token"]').attr('content');
    console.log(songId);
    $.ajax({
        url: "/ajax-request/" + playlistId + "/" + songId + "",
        type: "POST",
        data: {
            playlistId: playlistId,
            songId: songId,
            _token: _token
        },
        success: function(response) {
            console.log(response);
            if (response) {
                $('.success').text(response.success);
                $("#ajaxform")[0].reset();
            }
        },
    });
}

function editProfile() {
    $('#editProfile').toggle();
    $('#profileCard').toggle();
}

function show() {
    $('.playlist').toggle();
}

function showCreatePlaylist() {
    $('#createPlaylist').toggle();
}

// function removeFromPlaylist(pid, sid) {
//     alert(pid + " " + sid);
// }

currentIndex = 0;



async function play(songId, index) {

    currentIndex = songList.findIndex(({ id }) => id == songId)
    const { url: s3URL } = await fetch(`/api/songs/${songId}/play`).then(res => res.json());

        // currentIndex = index;
    document.getElementById('currentSong').src = s3URL;
    document.getElementById('songName').innerHTML = songList[currentIndex].title;
    incrementPlay(songId);

}

songList = [];

function audio(list) {
    songList = list;
}

function next() {
    if (currentIndex === songList.length - 1) {
        currentIndex = 0;
    } else {
        currentIndex++;
    }

    console.log(songList[currentIndex].path);
    play(songList[currentIndex].id, currentIndex);
}

function prev() {
    if (currentIndex === 0) {
        currentIndex = songList.length - 1;
    } else {
        currentIndex--;
    }

    console.log(songList[currentIndex].path);
    play(songList[currentIndex].id, currentIndex);
}

function incrementPlay(id){

    let songId = id;
    let _token = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: "/ajax-request/increment/'$songId'",
        type: "POST",
        data: {
            songId: songId,
            _token: _token
        },
        success: function(response) {
            console.log(response);
            if (response) {
                
            }
        },
    });
}