<?php
function toObject($result){
    $rows = [];
    if ($result->num_rows > 0) {
        while($row = mysqli_fetch_assoc($result)) {
          $rows[] = $row;
        }
    }
    return $rows;
}