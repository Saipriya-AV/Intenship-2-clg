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
include 'header.php';
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.ss">
</head>
<body>
</body>
</html>

<div class="container">
    <h2 class="my-4" style="text-align: center;">Quiz List</h2>
    <?php if (isset($_GET['search'])) {
        echo '<h4>Quizes related to ' . $_GET['search'] . ' are:-</h4>';
    } ?>
    <div class="quiz-list">
        <table class="quiz-table">
            <thead>
                <tr>
                    <th>S.N.</th>
                    <th>Topic</th>
                    <th>Total Questions</th>
                    <th>Marks</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_GET['search'])) {
                    $searchTerm = $_GET['search'];
                    $sql = "SELECT * FROM quiz WHERE title LIKE ?";
                    $stmt = $con->prepare($sql);

                    $searchTermWithWildcards = '%' . $searchTerm . '%';
                    $stmt->bind_param("s", $searchTermWithWildcards);
                    $stmt->execute();

                    $result = $stmt->get_result();
                } else {
                    $result = mysqli_query($con, "SELECT * FROM quiz ORDER BY date DESC") or die('Error');
                }
                $c = 1;
                while ($row = mysqli_fetch_array($result)) {
                    $title = $row['title'];
                    $total = $row['total'];
                    $correct = $row['correct'];
                    $eid = $row['eid'];
                    $q12 = mysqli_query($con, "SELECT score FROM history WHERE eid='$eid' AND email='$email'") or die('Error98');
                    $rowcount = mysqli_num_rows($q12);
                    if ($rowcount == 0) {
                        echo '  <tr>
                            <td>' . $c++ . '</td>
                            <td>' . $title . '</td>
                            <td>' . $total . '</td>
                            <td>' . $correct*$total . '</td>
                            <td>
                                <button onclick="location.href=\'takequiz.php?q=quiz&step=2&eid=' . $eid . '&n=1&t=' . $total . '\'" class="start-button">Start Quiz</button>
                            </td>
                        </tr>';
                    } else {
                        echo '  <tr style="font-weight: 500;">
                            <td>' . $c++ . '</td>
                            <td>' . $title . '&nbsp;<span title="This quiz is already solved by you" aria-hidden="true"></span></td>
                            <td>' . $total . '</td>
                            <td>' . $correct*$total . '</td>
                            <td>
                                <button onclick="location.href=\'/onlinequiz/app/update.php?q=quizre&step=25&eid=' . $eid . '&n=1&t=' . $total . '\'" class="restart-button">Restart</button>
                            </td>
                        </tr>';
                    }
                }
                $c = 0;
                echo '</tbody></table>';
                ?>
            </tbody>
        </table>
    </div> 
</div>

 <?php include 'footer.php';?>

