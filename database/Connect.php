<?php
require_once 'config/config.php';
class DatabaseConnection
{
    private $pdo;
    private $type;
    private $server;
    private $db;
    private $port;
    private $charset;
    private $username;
    private $password;
    public function __construct()
    {
        $this->type = DB_TYPE;                 // Type of database
        $this->server = DB_HOST;           // Server the database is on
        $this->db=DB_NAME;               // Name of the database
        $this->port = DB_PORT;                      // Port is usually 8889 in MAMP and 3306 in XAMPP
        $this->charset = DB_CHARSET;            // UTF-8 encoding using 4 bytes of data per character
        $this->username = DB_USER;              // Enter YOUR username here
        $this->password = DB_PASS;                  // Enter YOUR password here

        $options = [                     // Options for how PDO works
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        $dsn = "$this->type:host=$this->server;dbname=$this->db;port=$this->port;charset=$this->charset"; // Create DSN
        try {
            $this->pdo = new PDO($dsn, $this->username, $this->password, $options);  // Create PDO object
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), $e->getCode()); // Re-throw exception
        }
    }

    public function getPdo()
    {
        return $this->pdo;
    }

    public function pdo(string $sql, array $arguments = null)
    {
        if (!$arguments) {                   // If no arguments
            return $this->pdo->query($sql);        // Run SQL and return PDOStatement object
        }
        $statement = $this->pdo->prepare($sql);    // If arguments prepare statement
        $statement->execute($arguments);     // Execute statement
        return $statement;                   // Return PDOStatement object
    }
}
