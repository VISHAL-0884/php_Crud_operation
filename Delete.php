<?php
      include "db.php";
      if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $sql = "delete from student where id=:id";

            $del = $cn->prepare($sql);

            $del->bindParam(":id",$id);

            if ($del->execute()) {
                  header("Location: read.php");
            }
            else
            {
                  echo "error...";
            }

      }
?>