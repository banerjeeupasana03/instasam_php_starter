function fetchComments(postId) {
    return $.ajax({
        url: `api/comments.php?postId=${postId}`,
        method: 'GET'
    })
}

function fetchAllPosts() {
    return $.ajax({
        url: 'api/insta_posts.php',
        method: 'GET'
    })
}

function createNewPost(data) {

}

function createNewComment(data) {

}

function signUp(data) {
    return $.ajax({
        url: `api/users.php`,
        type: 'POST',
        data: data
    });
}

function login(data) {
    return $.ajax({
        url: `api/login.php`,
        type: 'POST',
        data: data
    });
}