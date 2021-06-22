<?php
/**
 * 
 */
session_start();
error_reporting(0);
class users
{
	public $host = "localhost";
	public $username = "root";
	public $pass = "";
	public $db_name = "oes";
	public $conn;
	public $cat;
	public $qus;

	public function __construct()
	{
		$this->conn = new mysqli($this->host, $this->username, $this->pass, $this->db_name);
		if($this->conn->connect_errno)
		{
			die("Database connection failed".$this->conn->connect_errno);
		}
	}

	public function signup($data)
	{
		$this->conn->query($data);
		return true;
	}

	public function s_dup($u)
	{
		return mysqli_query($this->conn,$u);
	}

	public function login($id,$email,$pass)
	{
		$query = $this->conn->query("select id,email,password from st_users where id='$id' and email='$email' and password='$pass'");
		$query->fetch_array(MYSQLI_ASSOC);
		if($query->num_rows>0)
		{
			#$_SESSION['id']=$id;
			return true;
		}
		else
		{
			return false;
		}
	}

	public function cat_show()
	{
		$query=$this->conn->query("select * from category");
		while ($row=$query->fetch_array(MYSQLI_ASSOC))
		
		{
			$this->cat[]=$row;
		}
		return $this->cat;
	}

	public function qus_show($qus)
	{
		$query=$this->conn->query("select * from questions where cat_id='$qus'");
		while ($row=$query->fetch_array(MYSQLI_ASSOC))
		
		{
			$this->qus[]=$row;
		}
		return $this->qus;
	}

	public function answer($data)
	{
		$ans=implode("", $data);
		$right = 0;
		$wrong = 0;
		$no_answer = 0;
		$query=$this->conn->query("select id,ans from questions where cat_id='".$_SESSION['cat']."'");
		while ($qust=$query->fetch_array(MYSQLI_ASSOC))
		
		{
			if ($qust['ans'] == $_POST[$qust['id']]) {
				# code...
				$right++;
			}
			elseif ($_POST[$qust['id']] == "no_attempt") {
				# code...
				$no_answer++;
			}
			else
			{
				$wrong++;
			}
		}
		
		$array = array();
		$array['right'] = $right;
		$array['wrong'] = $wrong;
		$array['no_answer'] = $no_answer;
		return $array;


	}

	public function AddQuestion($rec)
	{
		$a=$this->conn->query($rec);
		return true;
	}

	//Teacher Login

	public function t_dup($u)
	{
		return mysqli_query($this->conn,$u);
	}

	public function p_dup($u)
	{
		return mysqli_query($this->conn,$u);
	}

	public function t_signup($t_data)
	{

		$this->conn->query($t_data);
		return true;

	}

	public function t_login($user,$pass)
	{
		$query = $this->conn->query("select * from t_users where username='$user' and password='$pass'");
		$query->fetch_array(MYSQLI_ASSOC);
		if($query->num_rows>0)
		{
			#$_SESSION['email']=$email;
			return true;
		}
		else
		{
			return false;
		}
	}


	//Admin Login

	public function a_signup($a_data)
	{	

		$this->conn->query($a_data);
		return true;

	}
	public function a_dup($u)
	{
		return mysqli_query($this->conn,$u);
	}

	public function a_login($user,$pass)
	{
		$query = $this->conn->query("select * from a_users where username='$user' and password='$pass'");
		$query->fetch_array(MYSQLI_ASSOC);
		if($query->num_rows>0)
		{
			$_SESSION['email']=$email;
			return true;
		}
		else
		{
			return false;
		}
	}



	public function url($url)
	{
		header("location:".$url);
	}


	public function performQuery($query){
		
        $stmt = $this->conn->prepare($query);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function fetchAll($query){

        $stmt = $this->conn->query($query);
        return $stmt->fetchAll();
    }


}


?>