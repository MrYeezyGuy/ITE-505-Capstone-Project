document.getElementById('note-form').addEventListener('submit', function(event) {
    event.preventDefault();
    
    // Get the note text from the textarea
    var noteText = document.getElementById('note-text').value;
  
    // Create a new AJAX request to save the note
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'mynotes.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        // Display a success message to the user
        alert('Note saved successfully!');
      }
    };
    xhr.send('note_text=' + encodeURIComponent(noteText));
  });
  