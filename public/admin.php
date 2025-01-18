<?php

require_once('connection.php');

$select = "select * from sem";
$result = mysqli_query($con, $select);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Notes | Notes for All</title>
    <link rel="stylesheet" href="./../../E-Notes/src/style.css">
    <link rel="stylesheet" href="./../../css/bootstrap.css">
    <link rel="stylesheet" href="./../../font/bootstrap-icons.css">
    <style>
    body {
        height: 100vh;
    }

    #user {
        height: 50px;
        width: 50px;
        border-radius: 50%;
    }

    #head-right-section {
        width: 200px;
        display: flex;
        justify-content: space-between;
    }

    ul {
        list-style: none;
    }

    ul li {
        width: 300px;
        font-size: 20px;
        font-weight: bold;
        cursor: pointer;
        margin-bottom: 5px;

    }

    main {
        display: flex;
        padding: 20px;
        width: 100%;
    }

    #main-left-section {
        height: calc(100vh - 100px);
        width: 20%;
        border-right: 2px solid black;
    }

    #main-right-section {
        padding-left: 30px;
        width: 70%;

    }

    .sem-container {
        display: flex;
        flex-wrap: wrap;
    }

    .sem {
        /* width: 120px; */
        /* background-color: aqua;d */
        display: flex;
        flex-direction: column;
        align-items: center;
        font-size: 18px;
        font-weight: bold;
    }

    .sem img {
        height: 150px;
        width: 200px;
    }

    #uploadForm {
        position: relative;
        top: 40%;
    }
    </style>
</head>

<body>
    <header class="p-4 d-flex justify-content-between align-items-center">
        <div id="head-left-section">
            <img height="100" id="logo" src="./../../img/logo.png" alt="logo">
        </div>
        <div id="head-right-section">
            <img id="user" src="./../../E-Notes/src/man.png" alt="user">
            <span>
                Basanta
            </span>
        </div>
    </header>
    <main>
        <section id="main-left-section">
            <h2 class="mb-lg-3">CSIT Notes</h2>
            <nav>
                <ul>
                    <li><button onclick="showNote()" class="btn btn-primary"><span class="bi bi-file-text"></span>
                            Notes</button></li>
                    <!-- <li><button onclick="showBatchCreate()" class="btn btn-primary"><span class="bi bi-pencil-square"></span>  Create Batch</button></li> -->
                    <li><button onclick="showUpload()" class="btn btn-success"><span class="bi bi-cloud-upload"></span>
                            Upload Notes</button></li>

                </ul>
            </nav>
        </section>
        <section id="main-right-section">
            <div id="notes">
                <h2 class="text-primary">Notes</h2>
                <div class="sem-container">
                    <div class="sem">
                        <img src="./../../E-Notes/src/folder-logo.png" alt="Semi-img">
                        <p>Sem-I</p>
                    </div>
                    <div class="sem">
                        <img src="./../../E-Notes/src/folder-logo.png" alt="Semi-img">
                        <p>Sem-II</p>
                    </div>
                    <div class="sem">
                        <img src="./../../E-Notes/src/folder-logo.png" alt="Semi-img">
                        <p>Sem-III</p>
                    </div>
                    <div class="sem">
                        <img src="./../../E-Notes/src/folder-logo.png" alt="Semi-img">
                        <p>Sem-IV</p>
                    </div>
                    <div class="sem">
                        <img src="./../../E-Notes/src/folder-logo.png" alt="Semi-img">
                        <p>Sem-V</p>
                    </div>
                    <div class="sem">
                        <img src="./../../E-Notes/src/folder-logo.png" alt="Semi-img">
                        <p>Sem-VI</p>
                    </div>
                    <div class="sem">
                        <img src="./../../E-Notes/src/folder-logo.png" alt="Semi-img">
                        <p>Sem-VII</p>
                    </div>
                    <div class="sem">
                        <img src="./../../E-Notes/src/folder-logo.png" alt="Semi-img">
                        <p>Sem-VIII</p>
                    </div>

                </div>

            </div>
            <div class="d-none" id="upload">
                <h2 class="text-success">Upload Note</h2>
                <div id="uploadForm">
                    <form class="w-100" action="upload.php" method="post" enctype="multipart/form-data">
                        <div>
                            <label for="semester"><b>Select Batch</b>:</label>
                            <select class="form-control" name="semester" id="semester" onchange="fetchSubject()">
                                <option value="">Select semester</option>

                                <?php
                                while ($data = mysqli_fetch_assoc($result)) {

                                ?>
                                <option value="<?php echo $data['semester_name']; ?>">
                                    <?php echo $data['semester_name']; ?>
                                </option>
                                <?php
                                }
                                ?>

                            </select>

                            <div>
                                <label for="subject"> <b>Subject:</b> </label>
                                <select class="form-control" name="subject" id="subject">
                                    <option value="">Select</option>
                                </select>
                                <div id="err" class="text-danger">

                                </div>
                            </div>
                        </div>

                        <div class="mt-3">
                            <label for="file"><b>Note file:</b></label>
                            <input type="file" name="noteFile" id="noteFile" accept="application/pdf" required>

                        </div>
                        <button type="submit" name="upload" id="upload" class="btn btn-success mt-4">Upload</button>
                    </form>
                </div>
            </div>

        </section>




    </main>







    <script src="./../../dist/jquery.js"></script>
    <script src="./../../js/bootstrap.bundle.js"></script>
    <script>
    function showNote() {
        let sem = document.querySelector("#notes");
        let upload = document.querySelector("#upload");
        let create = document.querySelector("#create");
        sem.classList.add("d-block")
        sem.classList.remove("d-none")
        upload.classList.add("d-none")
        create.classList.add("d-none")
        upload.classList.remove("d-block")
        create.classList.remove("d-block")
    }

    function showUpload() {
        let sem = document.querySelector("#notes");
        let upload = document.querySelector("#upload");
        let create = document.querySelector("#create");
        upload.classList.add("d-block")
        upload.classList.remove("d-none")
        sem.classList.add("d-none")
        create.classList.add("d-none")
        sem.classList.remove("d-block")
        create.classList.remove("d-block")
    }

    $(document).ready(function() {
        $('#semester').change(function() {
            var selectedValue = $(this).val();
            if (selectedValue != "") {
                $.ajax({
                    url: 'select.php',
                    type: 'GET', // or 'POST'
                    data: {
                        sem_id: selectedValue
                    },
                    success: function(response) {
                        response = JSON.parse(response);

                        if (!response.status) {
                            $("#subject").empty();
                            $('#err').append("Data not found");

                        } else {
                            let courses = response.data;
                            $('#err').empty();
                            $("#subject").empty();
                            let course = document.getElementById("subject");
                            for (let i = 0; i < courses.length; i++) {
                                let option = document.createElement("option");
                                option.value = courses[i].subject_code;
                                option.textContent = courses[i].subject_code;
                                course.append(option);
                            }
                            // $.each(courses, function(index, course) {
                            // $('#course').append('<option value="' + course.id + '">' + course.course_name + '</option>');
                            // });
                        }

                    },
                    error: function(xhr, status, error) {
                        // Handle any errors
                        $('#ajaxResponse').html('An error occurred: ' + error);
                    }
                });
            } else {
                $("#subject").empty();
                $("#subject").append("<option>Select one</option>");
            }
        });
    });
    </script>


</body>

</html>