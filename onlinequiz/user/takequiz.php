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

<?php
   if(@$_GET['q']== 'quiz' && @$_GET['step']== 2) 
   {
       $eid=@$_GET['eid'];
       $sn=@$_GET['n'];
       $total=@$_GET['t'];
       $q=mysqli_query($con,"SELECT * FROM questions WHERE eid='$eid' AND sn='$sn' " );
       echo '<div class="container-take-quiz">
       <div class="card">';
       while($row=mysqli_fetch_array($q) )
       {
           $qns=$row['qns'];
           $qid=$row['qid'];
           echo ' <div class="card-header">
           Question '.$sn.'
       </div>
       <div class="card-body">
           <h5 class="card-title">Question:- '.$qns.'</h5>
           ';
       }
       $q=mysqli_query($con,"SELECT * FROM options WHERE qid='$qid' " );
       echo '<div class="form-check">
       <form action="/onlinequiz/app/update.php?q=quiz&step=2&eid='.$eid.'&n='.$sn.'&t='.$total.'&qid='.$qid.'" method="POST">
     ';

       while($row=mysqli_fetch_array($q) )
       {
           $option=$row['option'];
           $option=str_replace('<','&lt',$option);
           $option=str_replace('>','&gt',$option);
           $optionid=$row['optionid'];
           echo '<div class="form-check">
           <input class="form-check-input" type="radio" name="ans" id="'.$optionid.'" value="'.$optionid.'">
           <label class="form-check-label" for="'.$optionid.'">
               '.$option.'
           </label>
       </div>';
       }
       echo '<button type="submit" class="btn btn-primary mt-3">
       Submit <i class="fas fa-check-circle"></i>
   </button>
   </form>
</div>
</div>
</div>
</div>';
   }

    if(@$_GET['q']== 'result' && @$_GET['eid']) 
    {
        $eid=@$_GET['eid'];
        $q=mysqli_query($con,"SELECT * FROM history WHERE eid='$eid' AND email='$email' " )or die('Error157');
    
        while($row=mysqli_fetch_array($q) )
        {
            $s=$row['score'];
            $w=$row['wrong'];
            $r=$row['correct'];
            $qa=$row['level'];
            echo '
            <div class="container-take-quiz">
                <div class="card">
                    <div class="card-header">
                        Quiz Results
                    </div>
                    <div class="card-body">
                        <div class="result-item">
                        
                            <span class="result-label"><span class="result-icon"><i class="fas fa-list-ul"></i></span>Total Questions:</span>
                            <span class="result-number">'.$qa.'</span>
                        </div>
                        <div class="result-item">
                        
                            <span class="result-label">  <span class="result-icon correct"><i class="fas fa-check-circle"></i></span>Correct Answers:</span>
                            <span class="result-number correct">'.$r.'</span>
                        </div>
                        <div class="result-item">
                    
                            <span class="result-label">     <span class="result-icon wrong"><i class="fas fa-times-circle"></i></span>Incorrect Answers:</span>
                            <span class="result-number wrong">'.$w.'</span>
                        </div>
                        <div class="result-item">
                        
                            <span class="result-label">   <span class="result-icon"><i class="fas fa-star"></i></span>Score:</span>
                            <span class="result-number">'.$s.'</span>
                        </div>';
        
        }
        $q=mysqli_query($con,"SELECT * FROM rank WHERE  email='$email' ");
        while($row=mysqli_fetch_array($q) )
        {
            $s=$row['score'];
            echo '<div class="result-item">
                
            <span class="result-label">    <span class="result-icon"><i class="fas fa-chart-bar"></i></span>Overall Score:</span>
            <span class="result-number">'.$s.'</span>
        </div>';
        }
    

         echo '</div>
    </div>
</div>';
}
?>
<?php
include 'footer.php';
?>