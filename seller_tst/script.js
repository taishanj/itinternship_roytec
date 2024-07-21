document.addEventListener('DOMContentLoaded', function() {
  const photoVideoButton = document.getElementById('photo-video-button');
  const postModal = document.getElementById('post-modal');
  const closeModalButtons = document.querySelectorAll('.close');
  const nextButton = document.getElementById('next-button');
  const confirmModal = document.getElementById('confirm-modal');
  const postButton = document.getElementById('post-button');

  photoVideoButton.addEventListener('click', function() {
    postModal.style.display = 'block';
  });

  closeModalButtons.forEach(button => {
    button.addEventListener('click', function() {
      postModal.classList.add('hidden');
      confirmModal.classList.add('hidden');
    });
  });

  nextButton.addEventListener('click', function() {
    postModal.classList.add('hidden');
    confirmModal.classList.remove('hidden');
    document.getElementById('confirm-post-content').innerText = document.getElementById('modal-post-content').value;
    document.getElementById('confirm-preview-image').src = document.getElementById('preview-image').src;
  });

  postButton.addEventListener('click', function() {
    confirmModal.classList.add('hidden');
    // Add your code here to handle the post submission
  });

  document.getElementById('upload-input').addEventListener('change', function(event) {
    const file = event.target.files[0];
    const reader = new FileReader();

    reader.onload = function(e) {
      document.getElementById('preview-image').src = e.target.result;
      document.getElementById('edit-image').classList.remove('hidden');
      nextButton.classList.remove('hidden');
    }

    reader.readAsDataURL(file);
  });

  document.getElementById('edit-image').addEventListener('click', function() {
    document.getElementById('upload-input').click();
  });
});

