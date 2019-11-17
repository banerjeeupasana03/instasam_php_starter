function allCommentsElement(post, comments) {
  const commentsHTML = comments.map(comment => (`
    <div><i class="material-icons comment-icon">account_box</i>${comment.message}</div>
    `)).join('')
    
  return $(`
    <p class="post__caption post__inset">${post.message}</p>
    
    <div class="comments post__inset">
      ${commentsHTML}
    </div>
    
    <div class="modal-footer">
        <form class="comment-form">
          <input class="comment-form__comment" type="text" name="comment" placeholder="Add a comment...">
          <input type="hidden" value="${post.id}" name="post-id">
          <button class="comment-form__button">Post</button>
        </form>
    </div>
    `)
}

function postElement(post) {
  return $(`
  <div>
  <article class="post">
    <header class="post__header post__inset">
      <p class="post__heading">${post.username}</p>
      <small class="post__inset">${moment(post.created_at).fromNow()}</small>
    </header>
    <figure class="post__figure">
      <img class="post__image" src="${post.image_url}">
    </figure>
    <div class="post__inset post__under-image">
      <div class="post__links ">
          <i class="material-icons favorite-icon">favorite</i>
          <i class="material-icons leave-comment-icon">comment</i>
          <i class="material-icons share-icon">share</i>
      </div>
      <small>Liked by ${post.total_likes} people</small>
    </div>
    <p class="post__caption post__inset">${post.message}</p>
    
    <div class="comments post__inset">
      <div><i class="material-icons comment-icon">account_box</i>${post.random_comment}</div>
      <a data-post-id="${post.id}" href="#comments-modal" class="post__view-all-comments modal-trigger">View all ${post.total_comments} comments</a>
    </div>

  </article>
  </div>
    `)
}