import JAxios from '../axios.js'

export async function getUser(username, password) {
    return await JAxios({
        url: '/get_user.php',
        method: 'POST',
        data: {
            username,
            password
        }
    })
}

export async function addUser(data) {
    return await JAxios({
        url: '/add_user.php',
        method: 'POST',
        data: data
    })
}

export async function checkUsername(username) {
    return await JAxios({
        url: '/check_username.php',
        method: 'GET',
        params: {
            username: username
        }
    });
}

export async function getAvatar(email) {
    return await JAxios({
        url: '/get_user_avatar.php',
        method: 'GET',
        params: {
            email
        }
    });
}

export async function updateSearchCount(userID) {
    return await JAxios({
        url: '/update_search_count.php',
        method: 'GET',
        params: {
            id: userID
        }
    });
}

export async function getCountUserSong(username) {
    return await JAxios({
        url: '/count_user_song.php',
        method: 'POST',
        params: {
            username
        }
    })
}