<?php
class crud
{
    private $db;

    function __construct($conn)
    {
        $this->db = $conn;
    }

    public function insert($fname, $lname, $gender, $birth, $email, $contact, $special, $aboutme)
    {
        try {
            $sql = "INSERT INTO biodata (first_name, last_name, gender, birth,email,contactNumber, aboutme,specialist_id) VALUES(:fname, :lname, :gender, :birth,:email,:contact, :aboutme,:special)";

            $stmt = $this->db->prepare($sql);
            $stmt->bindparam('fname', $fname);
            $stmt->bindparam('lname', $lname);
            $stmt->bindparam('gender', $gender);
            $stmt->bindparam('birth', $birth);
            $stmt->bindparam('email', $email);
            $stmt->bindparam('contact', $contact);
            $stmt->bindparam('aboutme', $aboutme);
            $stmt->bindparam('special', $special);

            $stmt->execute();
            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getRegister()
    {
        $sql = "SELECT * FROM `biodata`";
        $result = $this->db->query($sql);

        return $result;
    }

    public function getRegisterDetail($id)
    {
        $sql = "SELECT * FROM biodata WHERE biodata.id = :id";

        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }

    public function editRegister($fname, $lname, $gender, $birth, $email, $contact, $aboutme, $special, $id)
    {
        try {
            $sql = "UPDATE `biodata` SET `first_name`= :fname, `last_name`= :lname,`gender`= :gender, `birth`= :birth, `email`= :email, `contactNumber`= :contact, `aboutme` = :aboutme, `specialist_id`= :specialist WHERE `id` = :id;";

            $stmt = $this->db->prepare($sql);
            $stmt->bindparam('fname', $fname);
            $stmt->bindparam('lname', $lname);
            $stmt->bindparam('gender', $gender);
            $stmt->bindparam('birth', $birth);
            $stmt->bindparam('email', $email);
            $stmt->bindparam('contact', $contact);
            $stmt->bindparam('aboutme', $aboutme);
            $stmt->bindparam('specialist', $special);
            $stmt->bindparam('id', $id);

            $stmt->execute();
            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getSpecialist()
    {
        $sql = "SELECT * FROM `specialist`";
        $result = $this->db->query($sql);

        return $result;
    }

    public function deleteRegister($id)
    {
        try {
            $sql = "DELETE FROM `biodata` WHERE `id` = :id;";

            $stmt = $this->db->prepare($sql);
            $stmt->bindparam('id', $id);

            $stmt->execute();
            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
