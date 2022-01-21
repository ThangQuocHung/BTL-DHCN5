import JAxios from '../axios.js'

export async function findSong(song) {
    return await JAxios({
        url: '/find_song.php',
        method: 'GET',
        params: {
            song: song
        }
    })
}

export async function getSongInfo(key) {
    return await JAxios({
        url: '/get_song_info.php',
        method: 'GET',
        params: {
            key: key
        }
    });
}

export async function getUserSong(userId) {
    return await JAxios({
        url: '/get_user_song.php',
        method: 'GET',
        params: {
            id: userId
        }
    });
}

export async function addSong(uId, songKey) {
    return await JAxios({
        url: '/add_music.php',
        method: 'POST',
        data: {
            u_id: uId,
            song_key: songKey
        }
    })
}