// Function to handle file selection and display preview
    function handleFileSelect(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                document.getElementById('blah').src = e.target.result;
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    // Function to handle upload button click
    function uploadPhoto() {
        var fileInput = document.getElementById('profile_photo');
        var file = fileInput.files[0];
        var formData = new FormData();

        // Append the selected file to the FormData object
        formData.append('profile-image', file);

        // Send an AJAX request to the server to handle the file upload
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'profilePhoto.php', true);

        xhr.onload = function () {
            if (xhr.status === 200) {
                // Handle the response from the server
                alert('File uploaded successfully!');
            } else {
                // Handle any errors
                alert('Error uploading file. Please try again.');
            }
        };

        // Send the FormData object containing the file to the server
        xhr.send(formData);
    }

    function uploadPhoto() {
        // Assuming you have retrieved the uploaded file path and stored it in a variable named 'filePath'
        var filePath = "./uploads"; // Replace this with the actual path of the uploaded image
    
        // Update the 'src' attribute of the <img> tag with the uploaded file path
        document.getElementById("profile-image").src = filePath;
    }
    

