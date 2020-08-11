###################
What is CodeIgniter
###################

CodeIgniter is an Application Development Framework - a toolkit - for people
who build web sites using PHP. Its goal is to enable you to develop projects
much faster than you could if you were writing code from scratch, by providing
a rich set of libraries for commonly needed tasks, as well as a simple
interface and logical structure to access these libraries. CodeIgniter lets
you creatively focus on your project by minimizing the amount of code needed
for a given task.

*******************
Release Information
*******************

This repo contains in-development code for future releases. To download the
latest stable release please visit the `CodeIgniter Downloads
<https://codeigniter.com/download>`_ page.

**************************
Changelog and New Features
**************************

You can find a list of all changes for each release in the `user
guide change log <https://github.com/bcit-ci/CodeIgniter/blob/develop/user_guide_src/source/changelog.rst>`_.

*******************
Server Requirements
*******************

PHP version 5.6 or newer is recommended.

It should work on 5.3.7 as well, but we strongly advise you NOT to run
such old versions of PHP, because of potential security and performance
issues, as well as missing features.

************
Installation
************

Please see the `installation section <https://codeigniter.com/user_guide/installation/index.html>`_
of the CodeIgniter User Guide.

*******
License
*******

Please see the `license
agreement <https://github.com/bcit-ci/CodeIgniter/blob/develop/user_guide_src/source/license.rst>`_.

*********
Resources
*********

-  `User Guide <https://codeigniter.com/docs>`_
-  `Language File Translations <https://github.com/bcit-ci/codeigniter3-translations>`_
-  `Community Forums <http://forum.codeigniter.com/>`_
-  `Community Wiki <https://github.com/bcit-ci/CodeIgniter/wiki>`_
-  `Community Slack Channel <https://codeigniterchat.slack.com>`_

Report security issues to our `Security Panel <mailto:security@codeigniter.com>`_
or via our `page on HackerOne <https://hackerone.com/codeigniter>`_, thank you.

***************
Acknowledgement
***************

The CodeIgniter team would like to thank EllisLab, all the
contributors to the CodeIgniter project and you, the CodeIgniter user.












##Jwt in php codeigniter framework
##Jwt in php Codeigniter framework, My internet connection is  Airtel


Follow this step
In controller Test.php

<?php
require APPPATH . '/libraries/ImplementJwt.php';

class Test extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->objOfJwt = new ImplementJwt();
        header('Content-Type: application/json');
    }

    /////////// Generating Token and put user data into  token ///////////

    public function LoginToken()
    {
            $tokenData['uniqueId'] = '55555';
            $tokenData['role'] = 'admin';
            $tokenData['timeStamp'] = Date('Y-m-d h:i:s');
            $jwtToken = $this->objOfJwt->GenerateToken($tokenData);
            echo json_encode(array('Token'=>$jwtToken));
         }

    //////// get data from token ////////////

    public function GetTokenData()
    {
    $received_Token = $this->input->request_headers('Authorization');
        try
            {
            $jwtData = $this->objOfJwt->DecodeToken($received_Token['Token']);
            echo json_encode($jwtData);
            }
            catch (Exception $e)
            {
            http_response_code('401');
            echo json_encode(array( "status" => false, "message" => $e->getMessage()));exit;
            }
    }
}

Step 2: ImplementJwt.php
 <?php
require APPPATH . '/libraries/JWT.php';


class ImplementJwt
{


    //////////The function generate token/////////////
    PRIVATE $key = "subcribe_my_channel"; // url: https://www.youtube.com/watch?v=zD4IGp1lBWs
    public function GenerateToken($data)
    {
        $jwt = JWT::encode($data, $this->key);
        return $jwt;
    }



   //////This function decode the token////////////////////
    public function DecodeToken($token)
    {
        $decoded = JWT::decode($token, $this->key, array('HS256'));
        $decodedData = (array) $decoded;
        return $decodedData;
    }
}
?>
Download  jwt library:

https://github.com/firebase/php-jwt

To check jwt token data:

https://jwt.io/

