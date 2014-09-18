<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'data.php';

class druid_event extends CI_Model 
{

var $event_id;
var $event_title;
var $event_start_date;
var $event_start_time;
var $event_end_date;
var $event_end_time;
var $event_location;
var $event_description;
var $file_id;



/**
 * Get event_id.
 *
 * @return event_id.
 */
function _getEvent_id()
{
    return $this->event_id;
}

/**
 * Set event_id.
 *
 * @param event_id the value to set.
 */
function _setEvent_id($event_id = '')
{
    $this->event_id = $event_id;
}

/**
 * Get event_title.
 *
 * @return event_title.
 */
function _getEvent_title()
{
    return $this->event_title;
}

/**
 * Set event_title.
 *
 * @param event_title the value to set.
 */
function _setEvent_title($event_title = '')
{
    $this->event_title = $event_title;
}

/**
 * Get event_start_date.
 *
 * @return event_start_date.
 */
function _getEvent_start_date()
{
    return $this->event_start_date;
}

/**
 * Set event_start_date.
 *
 * @param event_start_date the value to set.
 */
function _setEvent_start_date($event_start_date = '')
{
    $this->event_start_date = $event_start_date;
}

/**
 * Get event_start_time.
 *
 * @return event_start_time.
 */
function _getEvent_start_time()
{
    return $this->event_start_time;
}

/**
 * Set event_start_time.
 *
 * @param event_start_time the value to set.
 */
function _setEvent_start_time($event_start_time = '')
{
    $this->event_start_time = $event_start_time;
}

/**
 * Get event_end_date.
 *
 * @return event_end_date.
 */
function _getEvent_end_date()
{
    return $this->event_end_date;
}

/**
 * Set event_end_date.
 *
 * @param event_end_date the value to set.
 */
function _setEvent_end_date($event_end_date = '')
{
    $this->event_end_date = $event_end_date;
}

/**
 * Get event_end_time.
 *
 * @return event_end_time.
 */
function _getEvent_end_time()
{
    return $this->event_end_time;
}

/**
 * Set event_end_time.
 *
 * @param event_end_time the value to set.
 */
function _setEvent_end_time($event_end_time = '')
{
    $this->event_end_time = $event_end_time;
}

/**
 * Get event_location.
 *
 * @return event_location.
 */
function _getEvent_location()
{
    return $this->event_location;
}

/**
 * Set event_location.
 *
 * @param event_location the value to set.
 */
function _setEvent_location($event_location = '')
{
    $this->event_location = $event_location;
}

/**
 * Get event_description.
 *
 * @return event_description.
 */
function _getEvent_description()
{
    return $this->event_description;
}

/**
 * Set event_description.
 *
 * @param event_description the value to set.
 */
function _setEvent_description($event_description = '')
{
    $this->event_description = $event_description;
}

/**
 * Get file_id.
 *
 * @return file_id.
 */
function _getFile_id()
{
    return $this->file_id;
}

/**
 * Set file_id.
 *
 * @param file_id the value to set.
 */
function _setFile_id($file_id = '')
{
    $this->file_id = $file_id;
}
}
