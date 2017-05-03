<?php

class TwilioDirectiveBuilder {

    private $directives = array();
    private $voice = "woman";

    private function boolString($bool) {
        return $bool ? 'true' : 'false';
    }

    function gatherWithSpeech($message, $timeout = 2, $action = null) {
        if ($action === null) $action = $this->settings->vars->script_url;
        $d = '<Gather action="' . $action . '" timeout="' . $timeout . '">';
        $d .= '<Say voice="' . $this->voice . '">' . $message . '</Say>';
        $d .= '<Pause length="8"/>';
        $d .= '</Gather>';
        array_push($this->directives, $d);
    }

    function gatherWithAudio($play, $timeout = 2, $action = null) {
        if ($action === null) $action = $this->settings->vars->script_url;
        $d = '<Gather action="' . $action . '" timeout="' . $timeout . '">';
        $d .= '<Play>' . $play . '</Play>';
        $d .= '<Pause length="8"/>';
        $d .= '</Gather>';
        array_push($this->directives, $d);
    }

    function conference($start = false, $end = false, $mute = false) {
        $d = '<Dial>';
        $d .= '<Conference';
        $d .= ' startConferenceOnEnter="' . $this->boolString($start) . '"';
        $d .= ' endConferenceOnExit="' . $this->boolString($end) . '"';
        $d .= ' muted="' . $this->boolString($mute) . '">';
        $d .= 'MojilityRoom';
        $d .= '</Conference>';
        $d .= '</Dial>';
        array_push($this->directives, $d);
    }

    function dial($number, $timeout = 30, $callerId = null) {
        $d = '<Dial';
        $d .= ' timeout="' . $timeout . '"';
        if (isset($callerId)) $d .= ' callerId="' . $callerId . '"';
        $d .= '>';
        if (is_array($number)) {
            foreach($number as $n) {
                $d .= "<Number>" . $n . "</Number>";
            }
        } else {
            $d .= $number;
        }
        $d .= '</Dial>';
        array_push($this->directives, $d);
    }

    function record($id, $maxLength = 120) {
        array_push($this->directives, '<Record action="message.php?chaser=' . $id . '" maxLength="' . $maxLength . '"/>');
    }

    function say($message) {
        array_push($this->directives, '<Say voice="' . $this->voice . '">' . $message . '</Say>');
    }

    function pause($length = 1) {
        array_push($this->directives, '<Pause length="' . $length . '"/>');
    }

    function redirect($location = null) {
        if ($location === null) $location = $this->settings->vars->script_url;
        array_push($this->directives, '<Redirect>' . $location . '</Redirect>');
    }

    function render() {
        $eol = (new Settings())->EOL;
        $xml = '<Response>' . $eol;
        foreach ($this->directives as $d) {
            $xml .= '  ' . $d . $eol;
        };
        $xml .= '</Response>' . $eol;
        return $xml;
    }

}
