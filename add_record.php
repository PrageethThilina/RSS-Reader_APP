<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Data</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">

    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
    <script>

        function addData(){
            var title = document.getElementById("title").value;
            var description = document.getElementById("description").value;
            var link = document.getElementById("link").value;
            var imglink = document.getElementById("imglink").value;

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                  window.alert("Inserted Successfully..!!!");
                  document.getElementById("message").innerHTML = "Inserted Successfully..!!!";
                }
            };
            xhttp.open("GET", "db_add_data.php?title="+title+"&description="+description+"&link="+link+"&imglink="+imglink, true);
            xhttp.send();

        }
    </script>

</head>
<body>

        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                    <a class="btn btn-success" href="index.php">Home</a>
                  </li>              
                </ul>
                <form class="form-inline my-2 my-lg-0">
                  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-danger my-2 my-sm-0" type="submit">Search</button>
                </form>
              </div>
        </nav>


    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6 mx-auto">
                 <h5 class="text-center">Add Records</h5>
                 <div id="message"></div>

                <form action="#" onsubmit="addData()">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="form-group">
                        <label for="link">Item Link</label>
                        <textarea class="form-control" id="link" name="link"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="imglink">Image Link</label>
                        <input class="form-control" id="imglink" name="imglink"></textarea>
                    </div>
                        <input type="submit" class="btn btn-success mx-auto" value="Submit">
                </form>


            </div>                                
        </div>

    </div>
</body>

</html>