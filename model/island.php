<?php

class Island extends Dbh
{
    protected function setIsland($result_arr, $result_sum)
    {
        $statement = $this->connect()->prepare('INSERT INTO island (island_arr,island_sum) VALUES (?,?);');
        if (!$statement->execute(array($result_arr, $result_sum))) {
            $statement = null;
            $error = 'Something went wrong, try again';
            include('view/error.php');
            exit();
        }
        // Return saved row
        return $this->returnSavedValue();
    }
    protected function returnSavedValue()
    {
        $statement = $this->connect()->prepare('SELECT * from island ORDER BY id DESC LIMIT 1;');
        $statement->execute();
        $data = $statement->fetch();
        return $data;
    }
    protected function getQtyIslandDb($id)
    {
        $statement = $this->connect()->prepare('SELECT id FROM island LIMIT 1');
        $statement->execute();
        $data = $statement->fetch();
        return $data;
    }
    protected function getPreviousIslandDb($id)
    {
        if ($id > 0) {
            $statement = $this->connect()->prepare('SELECT * from island WHERE id = ?;');
            if ($id == 0) {
                $id = 1;
            } else {
                $id--;
            }
            $statement->execute(array($id));
            $data = $statement->fetch();
            return $data;
        } else {
            $statement = $this->connect()->prepare('SELECT * from island ORDER BY id DESC LIMIT 1;');
            $statement->execute(array());
            $data = $statement->fetch();
            return $data;
        }
    }
    protected function checkIsland($id)
    {
        $statement = $this->connect()->prepare('SELECT id from island WHERE id= ?;');
        if (!$statement->execute(array($id))) {
            $statement = null;
            $error = 'Island with that ID does not exist';
            include('view/error.php');
            exit();
        }
        $resultCheck = null;
        if ($statement->rowCount() > 0) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }
        return $resultCheck;
    }
}
