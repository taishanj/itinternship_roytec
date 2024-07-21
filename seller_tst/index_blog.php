<?php
require_once('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Post Modal</title>
  <link rel="stylesheet" href="style.css">
  <script src="https://kit.fontawesome.com/67bea33e2f.js" crossorigin="anonymous"></script>
</head>
<body>
  <div class="main-container">
    <div class="container create-post">
      <div class="user-info">
        <img src="https://picsum.photos/id/1025/50/50" alt="Profile Picture" class="profile-pic">
        <textarea id="new-post-content" placeholder="What's on your mind, Raphael?"></textarea>
      </div>
      <div class="post-options">
        <button type="button" class="option-button" id="photo-video-button">
          <i class="fas fa-image"></i> Photo/video
        </button>
      </div>
    </div>

    <div class="container blog-post">
      <div class="user-info">
        <img src="https://picsum.photos/id/237/500/300" alt="Profile Picture" class="profile-pic">
        <p class="user-name">Raphael Jones</p>
        <div class="user-details">
          <span class="update">shared a link.</span>
          <span class="time">1 hour ago</span>
        </div>
      </div>
      <p>Testing</p>
      <img src="https://picsum.photos/id/237/500/300" alt="Post Image">
      <div class="comments-area">
        <div class="comment">
          <div class="user-info">
            <img src="https://picsum.photos/id/1025/50/50" alt="Profile Picture" class="profile-pic">
            <div>
              <p class="user-name">Jane Doe</p>
              <p>This is an awesome site</p>
            </div>
          </div>
          <button class="like-button"><i class="fas fa-thumbs-up"></i> Like</button>
        </div>
        <div class="comment">
          <div class="user-info">
            <img src="https://picsum.photos/id/1027/50/50" alt="Profile Picture" class="profile-pic">
            <div>
              <p class="user-name">John Smith</p>
              <p>I totally agree!</p>
            </div>
          </div>
          <button class="like-button"><i class="fas fa-thumbs-up"></i> Like</button>
        </div>
      </div>
      <div class="new-comment-form">
        <div class="user-info">
          <img src="https://picsum.photos/id/1025/50/50" alt="Profile Picture" class="profile-pic">
          <textarea name="comment" id="comment-input" placeholder="Write a comment..."></textarea>
          <button type="button" class="add-comment">Add Comment</button>
        </div>
      </div>
    </div>
  </div>

  <div id="post-modal" class="modal hidden">
    <div class="modal-content">
      <div class="modal-header">
        <span class="close">&times;</span>
        <h2>Create Post</h2>
      </div>
      <div class="modal-body">
        <div class="user-info">
          <img src="https://picsum.photos/id/1025/50/50" alt="Profile Picture" class="profile-pic">
          <textarea id="modal-post-content" placeholder="What's on your mind, Raphael?"></textarea>
        </div>
        <div class="image-upload">
          <label for="upload-input" class="upload-button">
            <i class="fas fa-upload"></i> Add Photos/Videos
          </label>
          <input type="file" id="upload-input" accept="image/*" style="display: none;">
          <div class="image-preview">
            <img id="preview-image" src="" alt="Image Preview">
            <button id="edit-image" class="hidden">Edit Image</button>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button id="next-button" class="hidden">Next</button>
      </div>
    </div>
  </div>

  <div id="confirm-modal" class="modal hidden">
    <div class="modal-content">
      <div class="modal-header">
        <span class="close">&times;</span>
        <h2>Confirm Post</h2>
      </div>
      <div class="modal-body">
        <div class="user-info">
          <img src="https://picsum.photos/id/1025/50/50" alt="Profile Picture" class="profile-pic">
          <p id="confirm-post-content"></p>
        </div>
        <div class="image-preview">
          <img id="confirm-preview-image" src="" alt="Image Preview">
        </div>
      </div>
      <div class="modal-footer">
        <button id="post-button">Post</button>
      </div>
    </div>
  </div>
   <script src="script.js"></script>
</body>
</html>





