<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.
/**
 * Prints the tabbed bar
 *
 * @package block_pseudolearner
 * @author Rene Roepke
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
defined('MOODLE_INTERNAL') or die ('not allowed');

$tabs = array();
$row = array();
$inactive = array();
$activated = array();

$currenttab = optional_param('show', null, PARAM_TEXT);

// The view -> student mode.
$viewurl = new moodle_url ('/blocks/pseudolearner/view.php', array(
    'id' => $courseid, 'show' => 'view'));
$row [] = new tabobject ('view', $viewurl->out(), "overview");

// The view -> student mode.
$viewurl = new moodle_url ('/blocks/pseudolearner/pseudonym_view.php', array(
    'id' => $courseid, 'show' => 'pseudonym'));
$row [] = new tabobject ('pseudonym', $viewurl->out(), "pseudonym_view");

// The view -> student mode.
$viewurl = new moodle_url ('/blocks/pseudolearner/courses_view.php', array(
    'id' => $courseid, 'show' => 'courses'));
$row [] = new tabobject ('courses', $viewurl->out(), "courses_view");

if (count($row) >= 1) {
    $tabs [] = $row;
    print_tabs($tabs, $currenttab, $inactive, $activated);
}

