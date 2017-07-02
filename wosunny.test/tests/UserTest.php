<?php
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    protected $user;
    public function setUp()
    {
        $this->user = new User;
    }

    /**
    *  @brief 查询测试 
    */
    
     /**
     * @dataProvider GetInfoadditionProvider
     */
    public function testGetInfo($id,$expected)
    {
        try {
            $this->user->GetInfo($id);
        } catch (Exception $e) {
            $message = $e->getMessage();
            $code = $e->getCode();
        }

        if(isset($code))
        {
              $this->assertEquals($expected,$code);
        }else{
            $code = -100;
            $this->assertEquals($expected,$code);
        }
      

    }

    public function GetInfoadditionProvider()
    {
        return [
            'not exist' => [1,2008],
            'string like abc' => ['aaa',2001],
            'normal' => [11,-100]
        ];
    }

}

