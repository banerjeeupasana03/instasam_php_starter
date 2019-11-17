<?php

function allCommentsForPost($postId) {
  return "
  SELECT comments.id, message, count(comment_likes.id) as likes
  FROM comments
  JOIN comment_likes
  ON comment_id = comments.id
  WHERE post_id = $postId
  GROUP BY comments.id
  ORDER BY comments.created_at
  ";
}

function allPosts() {
  return "
  SELECT insta_posts.id, insta_posts.image_url, users.username, insta_posts.message, insta_posts.created_at, count( DISTINCT post_likes.id) as total_likes, count( DISTINCT comments.id) as total_comments,
  (
    SELECT comments.message
    FROM comments
    WHERE comments.post_id = insta_posts.id
    ORDER BY RAND()
    LIMIT 1
  ) as random_comment
  
  FROM insta_posts
  JOIN users 
  ON users.id = insta_posts.user_id
  LEFT JOIN post_likes 
  ON insta_posts.id = post_id
  LEFT JOIN comments 
  ON comments.post_id = insta_posts.id 
  GROUP BY insta_posts.id
  ORDER BY insta_posts.created_at desc
  LIMIT 10
  ";
}
