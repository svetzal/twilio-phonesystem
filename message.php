require( __DIR__ . '/vendor/autoload.php');

header("content-type: text/xml");

$chaser_name = $_GET['chaser']
$recording_url = $_POST['RecordingUrl'];
$recording_duration = $_POST['RecordingDuration'];
$digits = $_POST['Digits'];

$settings = new Settings();

$chaser = $settings->chasers()[$chaser_name];

$emails = $chaser['emails'];

$message = "Click here to listen to your message: " . $recording_url

if (is_array($emails)) {
    $to = join(", ", $emails);
} else {
    $to = $emails;
}

mail($to, "Voicemail for $chaser_name", $message, )