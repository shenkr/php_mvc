<?php
class Task extends Model
{
    public function create($username, $email, $description, $image, $status)
    {
        $sql = "INSERT INTO tasks (username, email, description, image, status) VALUES (:username, :email, :description, :image, :status)";

        $req = Database::getBdd()->prepare($sql);

        $req->execute([
            'username' => $username,
            'email' => $email,
            'description' => $description,
            'image' => $image,
            'status' => $status
        ]);

        $id = Database::getBdd()->lastInsertId();

        return $id;
    }

    public function count()
    {
        $sql = "SELECT COUNT(*) FROM tasks";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetch()["COUNT(*)"];
    }

    public function showByOrderAndLimit($start, $end, $orderby="id")
    {
        $sql = "SELECT * FROM tasks ORDER BY ".$orderby." LIMIT ".$start.", ".$end;    
        $req = Database::getBdd()->prepare($sql);
        $req->execute();

        return $req->fetchAll();
        
    }

    public function toggleStatus($id)
    {
        $sql = "SELECT * FROM tasks WHERE id =" . $id;
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        
        $status = $req->fetchColumn(5) == "done" ? "not done" : "done";

        $sql = "UPDATE tasks SET status = :status WHERE id = :id";
        $req = Database::getBdd()->prepare($sql);
        $req->execute([
            'id' => $id,
            'status' => $status
        ]);

        return $status;
    }

    public function showTask($id)
    {
        $sql = "SELECT * FROM tasks WHERE id =" . $id;
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetch();
    }

    public function showAllTasks()
    {
        $sql = "SELECT * FROM tasks";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }

    public function edit($id, $column, $data)
    {
        $sql = "UPDATE tasks SET $column = :data WHERE id = :id";
        $req = Database::getBdd()->prepare($sql);
        return $req->execute([
            'id' => $id,
            'data' => $data
        ]);
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM tasks WHERE id = ?';
        $req = Database::getBdd()->prepare($sql);
        return $req->execute([$id]);
    }
}
?>