<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

class  utilisateurs
{
    private int $id;
    private string $email;
    private string $date_nais;
    private string $password;
    private string $phone;
    private string $role;

    public function __construct($email, $date_nais, $password, $phone)
    {
        $this->email = $email;
        $this->date_nais = $date_nais;
        $this->password = $password;
        $this->phone = $phone;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getDateNaissance()
    {
        return $this->date_nais;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function getId()
    {
        return $this->id;
    }

}

?>
</body>
</html>