<?php

class UserSession
{
    public $id;
    public $conn;
    public $data;
    public $token;
    public $user_id;

    public static function authenticate($email, $pass, $fingerprint=null)
    {
        if ($fingerprint == null) {
            $fingerprint = $_COOKIE['fingerprint'];
        }
        if ($fingerprint == null) {
            throw new Exception('Fingerprint is Null');
        }
        $email = User::login($email, $pass);
        if ($email) {
            $user = new User($email);
            $conn = Database::getConnection();
            $token = md5(strrev(random_int(0, 99999999) . time()));
            $ip = $_SERVER['REMOTE_ADDR'];
            $agent = $_SERVER['HTTP_USER_AGENT'];
            $sql = "INSERT INTO `session` (`uid`, `token`, `login_time`, `ip`, `user_agent`, `active`, `fingerprint`)
            VALUES ('$user->id', '$token', now(), '$ip', '$agent', '1', '$fingerprint')";
            if ($conn->query($sql)) {
                Session::set('fingerprint', $fingerprint);
                Session::set('token', $token);
                return $token;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function __construct($token)
    {
        $this->conn = Database::getConnection();
        $this->token = $token;
        $sql = "SELECT * FROM `session` WHERE `token` = '$token' LIMIT 1";
        $res = $this->conn->query($sql);
        if ($res->num_rows) {
            $row = $res->fetch_assoc();
            $this->data = $row;
            $this->user_id = $row['uid'];
        } else {
            throw new Exception('Invalid Token');
        }
    }

    public function getUser()
    {
        return new User($this->user_id);
    }

    public function getIP()
    {
        return $this->data['ip'] ? $this->data['ip'] : false;
    }

    public function getUserAgent()
    {
        return $this->data['user_agent'] ? $this->data['user_agent'] : false;
    }

    public function isActive()
    {
        if (isset($this->data['active'])) {
            return $this->data['active'] ? true : false; // 1 = true, 0 = false
        }
    }

    public function getFingerprint()
    {
        if (isset($this->data['fingerprint'])) {
            return $this->data['fingerprint'] ? true : false; // 1 = true, 0 = false
        }
        return false;
    }

    public function isValid()
    {
        if ($this->getFingerprint() && $_COOKIE['fingerprint'] == $this->getFingerprint())
        {
            if (isset($this->data['login_time'])) {
                $timezone = DateTime::createFromFormat('Y-m-d H:i:s', $this->data['login_time']);
                if (3600 > time() - $timezone->getTimestamp()) {
                    return true;
                } else {
                    return false;
                }
            } else {
                throw new Exception('Login time is empty');
            }
        }
        return false;
    }

    public function removeSession()
    {
        $id = $this->data['id'];
        if (isset($id)) {
            if (!$this->conn) {
                $this->conn = Database::getConnection();
            }
            $sql = "UPDATE `session` SET `active` = '0' WHERE `id` = $id";
            if ($this->conn->query($sql)) {
                return true;
            } else {
                return false;
            }
        }
    }

    public static function authorize($token)
    {
        $session = new UserSession($token);
        try {
            if (isset($_SERVER['REMOTE_ADDR']) and isset($_SERVER['HTTP_USER_AGENT']))
            {
                if ($session->isValid() and $session->isActive())
                {
                    if ($session->getIP() == $_SERVER['REMOTE_ADDR'])
                    {
                        if ($session->getUserAgent() == $_SERVER['HTTP_USER_AGENT'])
                        {
                            if ($session->getFingerprint() == $_COOKIE['fingerprint'])
                            {
                                Session::$user = $session->getUser();
                                return $session;
                            } else {
                                throw new Exception('Fingerprint is not match');
                            }
                        } else {
                            throw new Exception('User Agent is not match');
                        }
                    } else {
                        throw new Exception('IP is not match');
                    }
                } else {
                    $session->removeSession();
                    throw new Exception('Session is not valid');
                }
            } else {
                throw new Exception('Session is not valid');
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

}