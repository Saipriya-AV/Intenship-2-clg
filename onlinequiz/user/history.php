<?php
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
    }
?>
<?php
include 'header.php';
?>
    <div class="container">
        <h2 class="my-4" style="text-align:center">Quiz Results</h2>
        <div class="results-list">
            <table class="results-table">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Quiz</th>
                        <th>Questions Solved</th>
                        <th>Right Answers</th>
                        <th>Wrong Answers</th>
                        <th>Score</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $q=mysqli_query($con,"SELECT * FROM history WHERE email='$email' ORDER BY date DESC ");
                    $c=0;
                    while($row=mysqli_fetch_array($q) )
                    {
                    $eid=$row['eid'];
                    $s=$row['score'];
                    $w=$row['wrong'];
                    $r=$row['correct'];
                    $qa=$row['level'];
                    $q23=mysqli_query($con,"SELECT title FROM quiz WHERE  eid='$eid' ");

                    while($row=mysqli_fetch_array($q23) )
                    {  $title=$row['title'];  }
                    $c++;
                    echo '<tr>
                    <td>'.$c.'</td>
                    <td>'.$title.'</td>
                    <td>'.$qa.'</td>
                    <td>'.$r.'</td>
                    <td>'.$w.'</td>
                    <td>'.$s.'</td>
                </tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
<?php
include('footer.php');
?>
