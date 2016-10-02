<?php
/**
 * Created by PhpStorm.
 * User: Rene
 * Date: 29.09.2016
 * Time: 22:58
 */
require_once(dirname(dirname(dirname(__FILE__))) . '/config.php');
require_once($CFG->dirroot . '/blocks/pseudolearner/classes/controller/config_controller.php');

$courseid = required_param('id', PARAM_INT);

if (!$course = $DB->get_record('course', array('id' => $courseid))) {
    print_error('invalidcourseid');
}

$userid = $USER->id;
$context = context_course::instance($courseid);

if (!has_capability('moodle/block:edit',$context,$userid)){
    $url = new moodle_url('/course/view.php',array('id'=>$courseid));
    redirect($url);
}

require_course_login($course);

$PAGE->set_url('/blocks/pseudolearner/config_view.php');
$PAGE->set_title(format_string("test"));
$PAGE->set_heading(format_string("test123"));
$PAGE->set_pagelayout('standard');

echo $OUTPUT->header();

$controller = new block_pseudolearner_config_controller($courseid,$context);

$controller->render();

echo $OUTPUT->footer();