<?php
require __DIR__.'./JwtHandler.php';
class Auth extends JwtHandler{

    protected $conn;
    protected $headers;
    protected $token;
    public function __construct($conn,$headers) {
        parent::__construct();
        $this->conn = $conn;
        $this->headers = $headers;
    }

    public function isAuth(){
        if(array_key_exists('Authorization',$this->headers) && !empty(trim($this->headers['Authorization']))):
            $this->token = explode(" ", trim($this->headers['Authorization']));
            if(isset($this->token[1]) && !empty(trim($this->token[1]))):
                
                $data = $this->_jwt_decode_data($this->token[1]);

                if(isset($data['auth']) && isset($data['data']->userId) && $data['auth']):
                    $user = $this->fetchUser($data['data']->userId);
                    return $user;

                else:
                    return null;

                endif; // End of isset($this->token[1]) && !empty(trim($this->token[1]))
                
            else:
                return null;

            endif;// End of isset($this->token[1]) && !empty(trim($this->token[1]))

        else:
            return null;

        endif;
    }

    protected function fetchUser($userId){
        try{
            $fetch_user_by_id = "SELECT `userId`, `firstName`,`secondName`, `email`, `phoneNumber`,`role` FROM `users` WHERE `userId`=:userId";
            $query_stmt = $this->conn->prepare($fetch_user_by_id);
            $query_stmt->bindValue(':userId', $userId,PDO::PARAM_INT);
            $query_stmt->execute();

            if($query_stmt->rowCount()):
                $row = $query_stmt->fetch(PDO::FETCH_ASSOC);
                return [
                    'success' => 1,
                    'status' => 200,
                    'user' => $row
                ];
            else:
                return null;
            endif;
        }
        catch(PDOException $e){
            return null;
        }
    }
}