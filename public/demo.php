<script>
    console.log("jello");
    fetch('get_subjects.php')
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        console.log(data); // Log the entire response data
        data.forEach(subject => {
            console.log(subject); // Log each subject
        });
    })
    .catch(error => console.error('Error:', error));
</script>
