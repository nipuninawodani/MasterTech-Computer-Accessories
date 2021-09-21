<?php

$link=dblink();

$query = mysqli_query($link,"SELECT AVG(Rating) as AVGRAGE from review where ProductID='".$_GET['ID']."'");
$row = mysqli_fetch_array($query);
$AVGRATE=$row['AVGRAGE'];
$query = mysqli_query($link,"SELECT count(Rating) as Total from review where ProductID='".$_GET['ID']."'");
$row = mysqli_fetch_array($query);
$Total=$row['Total'];
$query = mysqli_query($link,"SELECT count(Review) as Totalreview from  review where ProductID='".$_GET['ID']."'");
$row = mysqli_fetch_array($query);
$Total_review=$row['Totalreview'];
$review = mysqli_query($link,"SELECT review.Review,review.Rating,user.First_Name,user.Last_Name from review INNER JOIN user ON review.UserID=user.UserID where ProductID='".$_GET['ID']."' order by review.Rating desc limit 4;");
$rating = mysqli_query($link,"SELECT count(*) as Total,Rating from review where ProductID='".$_GET['ID']."' group by Rating order by Rating desc");


?>