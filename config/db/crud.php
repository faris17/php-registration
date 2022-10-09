<?php
class crud
{
    private $db;

    function __construct($conn)
    {
        $this->db = $conn;
    }

    public function insert($fname, $lname, $gender, $birth, $email, $contact, $special, $aboutme, $profile)
    {
        try {
            $sql = "INSERT INTO biodata (first_name, last_name, gender, birth,email,contactNumber, aboutme,specialist_id, profile) VALUES(:fname, :lname, :gender, :birth,:email,:contact, :aboutme,:special, :profile)";

            $stmt = $this->db->prepare($sql);
            $stmt->bindparam('fname', $fname);
            $stmt->bindparam('lname', $lname);
            $stmt->bindparam('gender', $gender);
            $stmt->bindparam('birth', $birth);
            $stmt->bindparam('email', $email);
            $stmt->bindparam('contact', $contact);
            $stmt->bindparam('aboutme', $aboutme);
            $stmt->bindparam('special', $special);
            $stmt->bindparam('profile', $profile);

            $stmt->execute();
            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getRegister($page)
    {
        // $sql = "SELECT * FROM `biodata`";
        $query = "SELECT count(*) FROM biodata";

        $result = $this->db->query($query);

        //pagination
        $limit = 2;
        $total_results = $result->fetchColumn();
        $total_pages = ceil($total_results / $limit);

        $starting_limit = ($page - 1) * $limit;
        $show  = "SELECT * FROM `biodata` LIMIT $starting_limit, $limit";

        $r = $this->db->query($show);

        $data = array('results'=> $r, 'totalPages'=> $total_pages);
        return $data;
    }

    public function getRegisterDetail($id)
    {
        $sql = "SELECT biodata.*, specialist.id as idSpecial, specialist.name_specialist FROM biodata, specialist WHERE biodata.id = :id AND biodata.specialist_id = specialist.id";

        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }
    public function getRegisterSearch($name)
    {
        $sql = "SELECT biodata.*, specialist.id as idSpecial, specialist.name_specialist FROM biodata, specialist WHERE biodata.first_name LIKE concat('%', :name, '%') AND biodata.specialist_id = specialist.id";

        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':name', $name);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }
    

    public function editRegister($fname, $lname, $gender, $birth, $email, $contact, $aboutme, $special, $profile, $id)
    {
        try {
            $sql = "UPDATE `biodata` SET `first_name`= :fname, `last_name`= :lname,`gender`= :gender, `birth`= :birth, `email`= :email, `contactNumber`= :contact, `aboutme` = :aboutme, `specialist_id`= :specialist, `profile`=:profile WHERE `id` = :id;";

            $stmt = $this->db->prepare($sql);
            $stmt->bindparam('fname', $fname);
            $stmt->bindparam('lname', $lname);
            $stmt->bindparam('gender', $gender);
            $stmt->bindparam('birth', $birth);
            $stmt->bindparam('email', $email);
            $stmt->bindparam('contact', $contact);
            $stmt->bindparam('aboutme', $aboutme);
            $stmt->bindparam('specialist', $special);
            $stmt->bindparam('profile', $profile);
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
