<?php

class Signup
{   
    private $error = "";
    public function evaluate($data)
    {
        foreach ($data as $key => $value) {
            if(empty($value))
            {
                $this->error = $this->error . $key . " Cant be empty";
            }

            if ($key == "email")
            {
                if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$value)) {
                    $this->error = $this->error . $key . "Invalid email!<br>";
                }
            }

            if ($key == "first_name")
            {
                if (is_numeric($value)) {
                    $this->error = $this->error . $key . "First name cant have a number<br>";
                }
                if (strstr($value, " ")) {
                    $this->error = $this->error . $key . "First name cant have a space<br>";
                }
            }

            if ($key == "last_name")
            {
                if (is_numeric($value)) {
                    $this->error = $this->error . $key . "Last name cant be a number<br>";
                }
                if (strstr($value, " ")) {
                    $this->error = $this->error . $key . "Last name cant have a space<br>";
                }
            }
        }
        if($this->error == "")
        {
            $this->create_user($data);
        }else
        {
            return $this->error;
        }
    }

    // Creates table
    public function create_user($data)
    {
        // Sets data/key values
        $first_name = ucfirst($data['first_name']);
        $last_name = ucfirst($data['last_name']);
        $email = $data['email'];
        $password = $data['password'];

        // To create custom url_address
        $url_address = strtolower($first_name) . "." . strtolower($last_name);
        
        // To create custom userid
        $userid = $this->create_userid();

        $profile_default = "upload/profile.png";

        // Inserts values to table
        $query = "INSERT INTO users 
        (userid, first_name, last_name, email, password, url_address, profile_image) 
        VALUES 
        ('$userid', '$first_name', '$last_name', '$email', '$password', '$url_address', '$profile_default')";

        // Creates new Database
        $DB = new Database();
        // Saves to Database Table
        $DB->save($query);
    }

    // Creates userid
    private function create_userid()
    {
        // Sets userid length from 4-19
        $length = rand(4, 19);
        $number = "";
        // Randomize numbers
        for ($i=0; $i < $length; $i++)
        {
            $new_rand = rand(0,9);
            $number = $number . $new_rand;
        }
        return $number;
    }
}
?>