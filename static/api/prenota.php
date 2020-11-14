<?php
/**
 * Short description for file
 *
 * Long description for file (if any)...
 *
 * PHP version 7
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category   CategoryName
 * @package    PackageName
 * @author     Original Author <author@example.com>
 * @author     Another Author <another@example.com>
 * @copyright  1997-2005 The PHP Group
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    SVN: $Id$
 * @link       http://pear.php.net/package/PackageName
 * @see        NetOther, Net_Sample::Net_Sample()
 * @since      File available since Release 1.2.0
 * @deprecated File deprecated in Release 2.0.0
 */

$response = new stdClass();
$response->status = "";
$response->error = "";

if (!empty($_POST)) {

    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $email = $_POST['email'];
    $geco = $_POST['geco'];
    $token = $_POST['token'];

    if (!isset($nome) || !isset($cognome) || !isset($email) || !isset($geco) || !isset($token)) {
        $response->status ="failed";
        $response->error = "no data";
        echo json_encode($response);
    } else {
        $secret = "6LcG1OIZAAAAAHkTZtzRzYtIDOQhKCCA29IOXIp9";

        $url = "https://www.google.com/recaptcha/api/siteverify?secret="
                .$secret
                ."&response="
                .$token
                ."&remoteip="
                .$_SERVER['REMOTE_ADDR'];

        $g_response = file_get_contents($url);
        $responseJson = json_decode($g_response);

        if ($responseJson->success === true) {
            $to      = "info@indiegekko.it";
            $subject = "Nuova prenotazione";
            $message = 'Prenotato '.$geco." da ".$nome." ".$cognome." (".$email.")";
            $headers = array(
                'From' => 'prenotazioni@indiegekko.it',
                'Reply-To' => $email,
                'X-Mailer' => 'PHP/'.phpversion()
            );

            $ok = mail($to, $subject, $message, $headers);

            if ($ok) {
                $response->status = "success";
                echo json_encode($response);
            } else {
                $response->status = "failed";
                $response->error = "Can't send email";
                echo json_encode($response);
            }

        } else {
            $response->status = "failed";
            $response->error = "invalid token";
            echo json_encode($response);
        }
    }

} else {
    $response->status = "failed";
    $response->error = "no post";
    echo json_encode($response);
}
