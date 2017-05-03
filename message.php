require( __DIR__ . '/vendor/autoload.php');

header("content-type: text/xml");

if (PHP_SAPI === 'cli') {
    $chaser_name = $argv[1];
    $recording_url = $argv[2];
} else {
    $chaser_name = $_GET['chaser'];
    $recording_url = $_POST['RecordingUrl'];
    $recording_duration = $_POST['RecordingDuration'];
    $digits = $_POST['Digits'];
}

$settings = new Settings();

//print_r($settings->chasers());
//exit(0);

$chaser = (object)$settings->chasers()->$chaser_name;

//print_r($chaser);
//exit(0);

$emails = $chaser->emails;

$message = "Click here to listen to your message: " . $recording_url;

if (is_array($emails)) {
    $to = join(", ", $emails);
} else {
    $to = $emails;
}

$headers = ["From: Mojility Voicemail <info@mojility.ca>\n"];

mail($to, "Voicemail for $chaser_name", $message, join("\n", $headers));

?>
<Response></Response>
