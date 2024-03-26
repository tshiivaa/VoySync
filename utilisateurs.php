<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

class utilisateurs
{
    private string $email;
    private string $date_nais;
    private string $password;

    public function __construct($email, $date_nais, $password)
    {
        $this->email = $email;
        $this->date_nais = $date_nais;
        $this->password = $password;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getdate_nais()
    {
        return $this->date_nais;
    }

    public function getpassword()
    {
        return $this->password;
    }

}

?>
</body>
</html>