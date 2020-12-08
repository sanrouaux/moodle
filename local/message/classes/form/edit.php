<?php
/**
 * @package     local_message
 * @author      Santiago Rouaux
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once("$CFG->libdir/formslib.php");
 
class edit extends moodleform {

    //Add elements to form
    public function definition() {
        global $CFG; 
        $mform = $this->_form;
 
        $mform->addElement('text', 'messagetext', 'Message Text'); 
        $mform->setType('messagetext', PARAM_NOTAGS);                   
        $mform->setDefault('messagetext', 'Please enter your message text here');  
    
        $options = array();
        $options[0] = \core\output\notification::NOTIFY_WARNING;
        $options[1] = \core\output\notification::NOTIFY_SUCCESS;
        $options[2] = \core\output\notification::NOTIFY_INFO;
        $options[3] = \core\output\notification::NOTIFY_ERROR;
        $mform->addElement('select', 'messagetype', 'Message Type', $options);
        $mform->setDefault('messagetype', '2');

        $this->add_action_buttons();

    }
    //Custom validation should be added here
    function validation($data, $files) {
        return array();
    }
}