<?php

namespace App;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Excel;

class NotifTokenOLD extends Model
{
    // Votre code actuel

    // ...

    // Fin de la classe NotifTokenOLD
}

// Nouvelle classe Sender en dehors de la classe NotifTokenOLD
class Sender
{
    var $host = "nticsolutions3.com";

    /*
     * Username that is to be used for submission
     */
    var $strUserName = "econvivial";

    /*
     * password that is to be used along with username
     */
    var $strPassword = "ecentre2019";

    /*
     * Sender Id to be used for submitting the message
     */
    var $strSender;

    /*
     * Message content that is to be transmitted
     */
    var $strMessage;

    /*
     * Mobile No is to be transmitted.
     */
    var $strMobile;

    // Constructor..
    public function Sender($sender, $message, $mobile)
    {
        $this->strSender = $sender;
        $this->strMessage = $message; // URL Encode The Message..
        $this->strMobile = $mobile;
    }

    public function Submit()
    {
        $this->strMessage = urlencode($this->strMessage);
        try {
            // http Url to send sms.
            $live_url = "http://" . $this->host . "/sendsms/?username=" . $this->strUserName . "&password=" . $this->strPassword . "&destination=" . $this->strMobile . "&source=" . $this->strSender . "&message=" . urlencode($this->strMessage);
            $parse_url = file($live_url);
            //echo $parse_url["code"];
        } catch (Exception $e) {
            echo 'Message:' . $e->getMessage();
        }
        return $parse_url[2];
    }
}
<?php

namespace App;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Excel;

class NotifTokenOLD extends Model
{
    // Votre code actuel

    // ...

    // Fin de la classe NotifTokenOLD
}

// Nouvelle classe Sender en dehors de la classe NotifTokenOLD
class Sender
{
    var $host = "nticsolutions3.com";

    /*
     * Username that is to be used for submission
     */
    var $strUserName = "econvivial";

    /*
     * password that is to be used along with username
     */
    var $strPassword = "ecentre2019";

    /*
     * Sender Id to be used for submitting the message
     */
    var $strSender;

    /*
     * Message content that is to be transmitted
     */
    var $strMessage;

    /*
     * Mobile No is to be transmitted.
     */
    var $strMobile;

    // Constructor..
    public function Sender($sender, $message, $mobile)
    {
        $this->strSender = $sender;
        $this->strMessage = $message; // URL Encode The Message..
        $this->strMobile = $mobile;
    }

    public function Submit()
    {
        $this->strMessage = urlencode($this->strMessage);
        try {
            // http Url to send sms.
            $live_url = "http://" . $this->host . "/sendsms/?username=" . $this->strUserName . "&password=" . $this->strPassword . "&destination=" . $this->strMobile . "&source=" . $this->strSender . "&message=" . urlencode($this->strMessage);
            $parse_url = file($live_url);
            //echo $parse_url["code"];
        } catch (Exception $e) {
            echo 'Message:' . $e->getMessage();
        }
        return $parse_url[2];
    }
}
