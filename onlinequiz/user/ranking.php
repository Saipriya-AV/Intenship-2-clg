<?php
$candisplay=false;
include_once dirname(dirname(__FILE__)).'\database\database.php';
    session_start();
    if(!(isset($_SESSION['email'])))
    {
        header("location:login.php");
    }
    else
    {
        $name = $_SESSION['name'];
        $email = $_SESSION['email'];
        include_once dirname(dirname(__FILE__)).'\database\database.php';
        $candisplay=true;

    }
    include 'header.php';
?>

<!DOCTYPE html>
<html>

<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLC5Pq3uFqjmTJzr1V4VvC2sxezSRpyUHOOq0GCBpjztR5NAj7B3jiUKYz4H5JbP" crossorigin="anonymous">

    <link rel="stylesheet" href="/css/style.css">
</head>
</body>
<div class="container">
        <h2 class="my-4 table-heading">Rankings</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover ranking-table">
                <thead>
                    <tr>
                        <th>Rank</th>
                        <th>Name</th>
                        <th>Score</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($candisplay) {
                        $q = mysqli_query($con, "SELECT * FROM rank  ORDER BY score DESC ");
                        $c = 0;
                        while ($row = mysqli_fetch_array($q)) {
                            $e = $row['email'];
                            $s = $row['score'];
                            $q12 = mysqli_query($con, "SELECT * FROM user WHERE email='$e' ");
                            while ($row = mysqli_fetch_array($q12)) {
                                $name = $row['name'];
                                $college = $row['college'];
                            }
                            $c++;
                            echo '<tr>
                                <td>' . $c . '</td>
                                <td>' . $name . '</td>
                                <td>' . $s . '</td>
                            </tr>';
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
 <?php
include 'footer.php';
 ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-L0JZJto3j9eDth5llxb9fX07eZ7BFCvhGZv7cEjFBCYWfke1S9g3sF3bjhDj2T9WQ" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js" integrity="sha384-oHIveBcFzFtXAV6sJ4zvzzH4+K3eR5C5K3UDWN/tCH6P5I9VK3SeEE2JCpXYFlEFW" crossorigin="anonymous"></script>
</body>
