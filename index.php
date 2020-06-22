<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rss News Feed</title>
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
        function showRSS(str) {
            console.log("THe click event");
            console.log(str);
            if (str.length == 0) {
                document.getElementById("rssOutput").innerHTML = "";
                return;
            } else {
                document.getElementById("rssOutput").innerHTML = "Data added to Database";

            }
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("rssOutput").innerHTML = "Data added to Database";

                }
            };
            xhttp.open("GET", "getrss.php?q=" + str, true);
            xhttp.send();

        }
        function getData() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("dbOutput").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "dbData.php", true);
            xhttp.send();
        }
        function generateXML() {

             var xhttp = new XMLHttpRequest();
             xhttp.onreadystatechange = function () {
                 if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("dbOutput").innerHTML = this.responseText;
                }
            };
            
            xhttp.open("GET", "generate_xml.php", true);
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
                    <a class="btn btn-success" href="add_record.php">Add New Records</a>
                    <button class="btn btn-success" onclick="getData()">View Records</button>
                    <button class="btn btn-danger" onclick="generateXML()">Generate XML</button>
                  </li>              
                </ul>
                <form class="form-inline my-2 my-lg-0">
                  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-danger my-2 my-sm-0" type="submit">Search</button>
                </form>
              </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <h4 class="text-center">Select the Source</h4>
                        <form>
                            <select onchange="showRSS(this.value)" class="form-control">
                                <option value="">Select an RSS-feed:</option>
                                <option value="Google">Google News</option>
                            </select>
                        </form>
                        <br>
                        <div id="rssOutput" class="text-center">
                        </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col">

                    <div id="dbOutput">RSS-feed will be listed here...</div>

                </div>
            </div>
        </div>

</body>

</html>