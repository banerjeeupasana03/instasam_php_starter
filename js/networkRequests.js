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

}

function login(data) {

}
