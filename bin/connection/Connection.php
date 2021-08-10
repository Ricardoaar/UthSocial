<?php /** @noinspection PhpPrivateFieldCanBeLocalVariableInspection */

/*
 * IMPORTANT: To create connection, use "connection_template"
 * and fill values with your bd credentials and rename to "connection.csv"
 * */

class Connection
{

    private PDO $connection;
    private array $configuration = array();

    public function __construct()
    {
        if (count($this->configuration) < 1) {
            if (($handle = fopen(__DIR__ . "/connection.csv", "r")) !== FALSE) {
                while (($data = fgetcsv($handle, 25)) !== FALSE) {
                    $this->configuration[$data[0]] = $data[1];
                }
                fclose($handle);
            }
        }
    }

    /**
     *
     * @return PDO
     * Return connection PDO instance created if
     */
    public function connect(): ?PDO
    {
        try {
            $controller = $this->configuration['driver'];
            $host = $this->configuration["host"];
            $database = $this->configuration["database"];
            $username = $this->configuration["username"];
            $password = $this->configuration["password"];
            $charset = $this->configuration["charset"];
            $port = $this->configuration["port"];
            $url = "$controller:host=$host:$port;" . "dbname=$database;charset=$charset";
            $this->connection = new PDO($url, $username, $password);
            return $this->connection;
        } catch (Exception $e) {
            echo 'Failed Connection' . $e->getTraceAsString();
        }
    }
}